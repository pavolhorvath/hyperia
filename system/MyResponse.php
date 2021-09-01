<?php

/**
 * Class MyResponse
 * @author Ing. Pavol Horvath
 */
class MyResponse
{
	/**
	 * @var mixed
	 */
	private $response = '';

	/**
	 * @param mixed|null $response
	 *
	 * @return $this
	 */
	public function json ($response = null):MyResponse
	{
		header('Content-Type: application/json');
		if ($response === null && $this->response) {
			$response = $this->response;
		}
		$this->response = json_encode($response);

		return $this;
	}

	/**
	 * @param mixed $msg
	 *
	 * @return $this
	 */
	public function unauthorized ($msg = 'Unauthorized'):MyResponse
	{
		http_response_code(401);
		$this->response = $msg;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function send ()
	{
		return $this->response;
	}

	/**
	 * @return $this
	 */
	public function badRequest (array $msgs):MyResponse
	{
		header('Content-Type: application/json');
		$response = ['errors' => $msgs];
		$this->response = json_encode($response);

		return $this;
	}
}


function Response ()
{
	return new MyResponse();
}