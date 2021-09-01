<?php

/**
 * Class Validator
 * @author Ing. Pavol Horvath
 */
class Validator
{
	/**
	 * @var
	 */
	private $value;

	/**
	 * @var string
	 */
	private $name = '';

	/**
	 * @var array
	 */
	private $errors = [];

	/**
	 * @param        $value
	 * @param string $name
	 *
	 * @return $this
	 */
	public function changeVariable ($value, string $name):Validator
	{
		$this->setValue($value);
		$this->setName($name);

		return $this;
	}

	/**
	 * @return array
	 */
	public function getErrors ():array
	{
		return $this->errors;
	}

	/**
	 * run custom validator methode from model
	 * @param string $model
	 * @param string $validator
	 *
	 * @return $this
	 */
	public function custom (string $model, string $validator):Validator
	{
		$mehodeName = "{$validator}Validator";
		$errorMsg = $model::$mehodeName($this->value, $this->name);

		if ($errorMsg) {
			$this->errors[] = $errorMsg;
		}

		return $this;
	}

	/**
	 * @param string $errorMsg
	 *
	 * @return $this
	 */
	public function isInteger (string $errorMsg = ''):Validator
	{
		if (strval(intval($this->value)) != $this->value) {
			$this->errors[] = $errorMsg != "" ? $errorMsg : "{$this->name} musí byť celé číslo.";
		}

		return $this;
	}

	/**
	 * @param string $errorMsg
	 *
	 * @return $this
	 */
	public function notEmpty (string $errorMsg = ''):Validator
	{
		if (empty($this->value)) {
			$this->errors[] = $errorMsg != "" ? $errorMsg : "{$this->name} musí byť vyplnený.";
		}

		return $this;
	}

	/**
	 * @param $value
	 */
	private function setValue ($value)
	{
		$this->value = $value;
	}

	/**
	 * @param $name
	 */
	private function setName ($name)
	{
		$this->name = $name;
	}
}


function Validator ($value, $name)
{
	$validator = new Validator();
	$validator->changeVariable($value, $name);

	return $validator;
}