<?php

global $Wcms;

function replace_placeholders($args) {
	global $Wcms;

	if($Wcms->loggedIn) return $args;

	$placeholders = [
		"day" => strftime("%e"),
		"day-engsuf" => Date("jS"),
		"month" => strftime("%B"),
		"year" => strftime("%Y"),
		"domain" => $_SERVER['SERVER_NAME']
	];

	foreach($placeholders as $placeholder => $value) {
		$args[0] = str_replace("[$placeholder]", $value, $args[0]);
	}

	return $args;
}

$Wcms->addListener('page', 'replace_placeholders');
$Wcms->addListener('footer', 'replace_placeholders');
$Wcms->addListener('block', 'replace_placeholders');
$Wcms->addListener('blocks', 'replace_placeholders');


?>
