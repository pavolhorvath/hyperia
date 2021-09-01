<?php

/**
 * Class User
 */
class User
{
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $login;

	/**
	 * @var string
	 */
	public $password;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	public $token;

	/**
	 * @var datetime
	 */
	public $tokenValidity;

	/**
	 * @var array
	 */
	private $columnsMap = [
		'token_validity' => 'tokenValidity',
	];

	/**
	 * @param $data
	 *
	 * @return $this
	 */
	public function set ($data):User
	{
		foreach ($data as $property => $value) {
			if (isset($this->columnsMap[$property])) {
				$property = $this->columnsMap[$property];
			}
			$this->$property = $value;
		}

		return $this;
	}

	/**
	 * @param bool $new
	 *
	 * @return $this
	 */
	public function revalidateToken (bool $new = false):User
	{
		$newValidity = date('Y-m-d H:i:s', time()+600);
		$this->tokenValidity = $newValidity;
		$saveData = [
			'token_validity' => $newValidity,
		];

		if ($new) {
			$newToken = self::generateToken();
			$this->token = $newToken;
			$saveData['token'] = $newToken;
		}

		Database()
			->update('users', $saveData)
			->where(['id' => $this->id])
			->execute();

		return $this;
	}

	/**
	 * @return string
	 */
	public function getToken ()
	{
		return $this->token;
	}

	/**
	 * @param string $token
	 *
	 * @return bool
	 */
	public function checkToken (string $token):bool
	{
		if (!$this->token || !$this->tokenValidity) {
			return false;
		}

		if ($token != $this->token || date('Y-m-d H:i:s') > $this->tokenValidity) {
			return false;
		}

		$this->revalidateToken();
		return true;
	}

	/**
	 * @param string $by
	 * @param        $value
	 *
	 * @return User|null
	 */
	public static function get (string $by, $value)
	{
		$data = Database()
			->select('users')
			->where([$by => $value])
			->getRow();

		if (!$data) {
			return null;
		}

		$user = new User();
		$user->set($data);

		return $user;
	}

	/**
	 * @param string $login
	 * @param string $password
	 *
	 * @return mixed|string
	 */
	public static function login (string $login, string $password)
	{


		$user = self::get('login', $login);
		if (!$user) {
			return Response()->badRequest(['Nesprávne prihlasovacie meno.'])->send();
		}

		$password = md5($password);
		if ($password != $user->password) {
			return Response()->badRequest(['Nesprávne prihlasovacie heslo.'])->send();
		}

		$token = $user->revalidateToken(true)->getToken();

		return Response()->json(['token' => $token])->send();
	}

	/**
	 * @return bool
	 */
	public static function isLogin ():bool
	{
		if (!$login = $_REQUEST['login'] ?? null) {
			return false;
		}

		if (!$token = $_REQUEST['Login-Token'] ?? null) {
			return false;
		}

		if (!$user = User::get('login', $login)) {
			return false;
		}

		return $user->checkToken($token);
	}

	/**
	 * @return string
	 */
	public static function generateToken ():string
	{
		$allowed = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$length = 32;
		$token = substr( str_shuffle(str_repeat($allowed, $length)), 1, $length );

		return $token;
	}
}