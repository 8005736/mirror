<?php
require_once '../vendor/autoload.php';
use JohnRivs\Wunderlist\Wunderlist;

$files = glob("../fenom_cache/*");
$c = count($files);
if (count($files) > 0) {
    foreach ($files as $file) {
        if (file_exists($file)) {
        	unlink($file);
        }
    }
}

$clientId     = '54c2e61ea089cb89abd4';
$clientSecret = 'aa4e44accc7a1f93d341dd37fa6d0a2eb5114a2644dd95b3cfb8365c12ca';
$accessToken  = '643cca366b89fc53833f2113acd7a6b80903da38d290c21e85f4f6c68167';
$attributes['list_id'] = 244714022;

$wunderlist = new Wunderlist($clientId, $clientSecret, $accessToken);
$tasks = $wunderlist->getTasks($attributes);

foreach ($tasks as $key => $value) {
	$text[] = $value['title'];
}

$fenom = Fenom::factory("../fenom_tpl", "../fenom_cache", "");
$return = $fenom->fetch('wunderlist_row.tpl', array("name" => $text));

$r["result"] = $return;
$r["status"] = "success";

echo json_encode($r);