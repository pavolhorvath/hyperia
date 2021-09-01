<?php


$get = ['reset' => 'App@reset'];


$post = [
	'article' => 'App@getArticle',
	'addcomment' => 'App@addComment',
	'updatecomment' => 'App@updateComment',
	'addpositive' => 'App@addPositiveReaction',
	'addnegative' => 'App@addNegativeReaction',
	'deletecomment' => 'App@deleteComment',
	'login' => 'App@login',
];