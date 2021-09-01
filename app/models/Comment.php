<?php

/**
 * Class Comment
 */
class Comment
{
	/**
	 * @var int
	 */
	public $id = 0;

	/**
	 * @var string
	 */
	public $autor;

	/**
	 * @var string
	 */
	public $content;

	/**
	 * @var datetime
	 */
	public $cdate;

	/**
	 * @var int
	 */
	public $parentId;

	/**
	 * @var int
	 */
	public $positive = 0;

	/**
	 * @var int
	 */
	public $negative = 0;

	/**
	 * @var int
	 */
	public $articleId;

	/**
	 * @var array
	 */
	public $childs;

	/**
	 * @var array
	 */
	private $columnsMap = [
		'parent_id' => 'parentId',
		'article_id' => 'articleId',
	];

	/**
	 * @param array $data
	 *
	 * @return $this
	 */
	public function set (array $data):Comment
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
	 * @return $this
	 */
	public function save ():Comment
	{
		$saveData = [
			'autor' => $this->autor,
			'content' => $this->content,
			'parent_id' => $this->parentId,
			'positive' => $this->positive,
			'negative' => $this->negative,
			'article_id' => $this->articleId,
		];

		if ($this->id) {
			Database()
				->update('comments', $saveData)
				->where(['id' => $this->id])
				->execute();

		} else {
			$this->id = Database()
				->insert('comments', $saveData)
				->execute()
				->insertId();
		}

		return $this;
	}

	/**
	 * @return $this
	 */
	public function getChilds ():Comment
	{
		if ($this->id) {
			$this->childs = [];
			$ids = Database()
				->select('comments', ['id'])
				->where(['parent_id' => $this->id])
				->orderBy('cdate')
				->getValues();
			if ($ids) {
				foreach ($ids as $childId) {
					$this->childs[] = self::get($childId);
				}
			}
		}

		return $this;
	}

	/**
	 * @return $this
	 */
	public function addPositive ():Comment
	{
		$this->positive++;
		return $this;
	}

	/**
	 * @return $this
	 */
	public function addNegative ():Comment
	{
		$this->negative++;
		return $this;
	}

	/**
	 *
	 */
	public function delete ()
	{
		if ($this->childs) {
			foreach ($this->childs as $child) {
				$child->delete();
			}
		}

		Database()
			->delete('comments')
			->where(['id' => $this->id])
			->execute();
	}

	/**
	 * @param int $id
	 *
	 * @return Comment
	 */
	public static function get (int $id = 0):Comment
	{
		$comment = new Comment();

		$data = Database()
			->select('comments')
			->where(['id' => $id])
			->getRow();

		if ($data) {
			$comment->set($data)->getChilds();
		}

		return $comment;
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
			->select('comments', ['id'])
			->where(['id' => intval($value)])
			->getValue();

		$errorMsg = '';
		if (!$id) {
			$errorMsg = "Zadaný komentár neexistuje.";
		}

		return $errorMsg;
	}
}