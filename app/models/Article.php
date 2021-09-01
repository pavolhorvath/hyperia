<?php

/**
 * Class Article
 */
class Article
{
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $title;

	/**
	 * @var string
	 */
	public $content;

	/**
	 * @var string
	 */
	public $autor;

	/**
	 * @var datetime
	 */
	public $cdate;

	/**
	 * @var array
	 */
	public $comments;

	/**
	 * @param array $data
	 *
	 * @return $this
	 */
	public function set (array $data):Article
	{
		foreach ($data as $property => $value) {
			$this->$property = $value;
		}

		return $this;
	}

	/**
	 * @return $this
	 */
	public function getComments ():Article
	{
		$ids = Database()
			->select('comments', ['id'])
			->where([
				'article_id' => $this->id,
				'parent_id' => 0,
			])
			->orderBy('cdate')
			->getValues();

		$this->comments = [];
		if ($ids) {
			foreach ($ids as $id) {
				$this->comments[] = Comment::get($id);
			}
		}

		return $this;
	}

	/**
	 * @param int $id
	 *
	 * @return Article|null
	 */
	public static function get (int $id)
	{
		$data = Database()
			->select('articles')
			->where(['id' => $id])
			->getRow();

		if (!$data) {
			return null;
		}

		$article = new Article();
		$article->set($data)
			->getComments();

		return $article;
	}

	/**
	 * @param        $value
	 * @param string $name
	 *
	 * @return string
	 */
	public static function existValidator ($value, string $name):string
	{
		$id = Database()
			->select('articles', ['id'])
			->where(['id' => intval($value)])
			->getValue();

		$errorMsg = '';
		if (!$id) {
			$errorMsg = "Zadaný článok neexistuje.";
		}

		return $errorMsg;
	}
}