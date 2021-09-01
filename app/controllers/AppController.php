<?php

/**
 * Class AppController
 */
class AppController
{
	/**
	 * @param int $id
	 *
	 * @return mixed|string
	 */
	public function getArticle ($id)
	{
		$validationErrors = Validator($id, 'ID článku')
			->isInteger()
			->custom('Article', 'exist')
			->getErrors();

		if ($validationErrors) {
			return Response()->badRequest($validationErrors)->send();
		}

		$article = Article::get($id);
		return Response()->json($article)->send();
	}

	/**
	 * @param string $autor
	 * @param string $content
	 * @param int    $parentId
	 * @param null   $articleId
	 *
	 * @return mixed|string
	 */
	public function addComment ($autor, $content, $parentId = 0, $articleId = null)
	{
		$validationErrors = Validator($autor, 'Autor')
			->notEmpty()
			->changeVariable($content, 'Komentár')
			->notEmpty()
			->changeVariable($parentId, 'ID rodiča')
			->isInteger()
			->changeVariable($articleId, 'Článok')
			->custom('Article', 'exist')
			->getErrors();

		if ($validationErrors) {
			return Response()->badRequest($validationErrors)->send();
		}

		$comment = Comment::get()
			->set([
				'autor' => $autor,
				'content' => $content,
				'parentId' => $parentId,
				'articleId' => $articleId,
				'cdate' => date('Y-m-d H:i:s'),
				'childs' => [],
			])
			->save();

		return Response()->json($comment)->send();
	}

	/**
	 * @param int    $id
	 * @param string $autor
	 * @param string $content
	 * @param int    $parentId
	 * @param int    $positive
	 * @param int    $negative
	 * @param null   $articleId
	 *
	 * @return mixed|string
	 */
	public function updateComment ($id, $autor, $content, $parentId = 0, $positive = 0, $negative = 0, $articleId = null)
	{
		if (!User::isLogin()) {
			return Response()->unauthorized()->json()->send();
		}

		$validationErrors = Validator($id, 'ID')
			->isInteger()
			->custom('Comment', 'exist')
			->changeVariable($autor, 'Autor')
			->notEmpty()
			->changeVariable($content, 'Komentár')
			->notEmpty()
			->changeVariable($parentId, 'ID rodiča')
			->isInteger()
			->changeVariable($positive, 'Počet pozitívnych hodnotení')
			->isInteger()
			->changeVariable($negative, 'Počet negatívnych hodnotení')
			->isInteger()
			->changeVariable($articleId, 'Článok')
			->custom('Article', 'exist')
			->getErrors();

		if ($validationErrors) {
			return Response()->badRequest($validationErrors)->send();
		}

		$comment = Comment::get($id)
			->set([
				'autor' => $autor,
				'content' => $content,
				'parentId' => $parentId,
				'positive' => $positive,
				'negative' => $negative,
				'articleId' => $articleId,
			])
			->save();

		return Response()->json($comment)->send();
	}

	/**
	 * @param int $commentId
	 *
	 * @return mixed|string
	 */
	public function addPositiveReaction ($commentId)
	{
		$validationErrors = Validator($commentId, 'ID komentára')
			->isInteger()
			->custom('Comment', 'exist')
			->getErrors();

		if ($validationErrors) {
			return Response()->badRequest($validationErrors)->send();
		}

		$comment = Comment::get($commentId)
			->addPositive()
			->save();

		return Response()->json($comment)->send();
	}

	/**
	 * @param int $commentId
	 *
	 * @return mixed|string
	 */
	public function addNegativeReaction ($commentId)
	{
		$validationErrors = Validator($commentId, 'ID komentára')
			->isInteger()
			->custom('Comment', 'exist')
			->getErrors();

		if ($validationErrors) {
			return Response()->badRequest($validationErrors)->send();
		}

		$comment = Comment::get($commentId)
			->addNegative()
			->save();

		return Response()->json($comment)->send();
	}

	/**
	 * @param int $id
	 *
	 * @return mixed|string
	 */
	public function deleteComment ($id)
	{
		if (!User::isLogin()) {
			return Response()->unauthorized()->json()->send();
		}

		$validationErrors = Validator($id, 'ID komentára')
			->isInteger()
			->custom('Comment', 'exist')
			->getErrors();

		if ($validationErrors) {
			return Response()->badRequest($validationErrors)->send();
		}

		Comment::get($id)->delete();

		return Response()->json(['success' => true])->send();
	}

	/**
	 * @param string $login
	 * @param string $password
	 *
	 * @return mixed|string
	 */
	public function login ($login, $password)
	{
		$validationErrors = Validator($login, 'Prihlasovacie meno')
			->notEmpty('Prihlasovacie meno musí byť vyplnené.')
			->changeVariable($password, 'Prihlasovacie heslo')
			->notEmpty('Prihlasovacie heslo musí byť vyplnené.')
			->getErrors();

		if ($validationErrors) {
			return Response()->badRequest($validationErrors)->send();
		}

		return User::login($login, $password);
	}

	/**
	 * reset database and data
	 */
	public function reset ()
	{
		Database()->setQuery(file_get_contents(__DIR__.'/../../reset.sql'))->execute();
	}
}