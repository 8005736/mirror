<?php
require_once '../vendor/autoload.php';
require_once 'cache_clear.php';

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

$owm = new OpenWeatherMap('c83a6e1d3e6beba2bf670593d8d46acf');
$weather = $owm->getWeather('Chelyabinsk', 'metric', 'ru');

$fenom = Fenom::factory("../fenom_tpl", "../fenom_cache", "");
$temp = $weather->temperature->now;
$temp = str_replace(" ", "", $temp);
$temp = str_replace("C", "", $temp);
$return = $fenom->fetch('openweather_big.tpl',
	array(
		"temp" => $temp,
		"description" => $weather->weather->description
		)
	);

$r["result"] = $return;
$r["status"] = "success";
echo json_encode($r);