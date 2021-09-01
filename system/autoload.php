<?php

/**
 * load system files
 */
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/MyResponse.php';
require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/Validator.php';

/**
 * load custom files
 */
$appFolders = [
	'controllers',
	'helpers',
	'models',
];
foreach ($appFolders as $appFolder) {
	$dirPath = __DIR__ . '/../app/' . $appFolder;
	if (is_dir($dirPath)) {
		foreach (scandir($dirPath) as $fileName) {
			$filePath = $dirPath . '/' . $fileName;
			if (is_file($filePath)) {
				require_once $filePath;
			}
		}
	}
}