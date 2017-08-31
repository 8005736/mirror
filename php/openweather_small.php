<?php
require_once '../vendor/autoload.php';
require_once 'cache_clear.php';

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

$owm = new OpenWeatherMap('c83a6e1d3e6beba2bf670593d8d46acf');
$forecast = $owm->getWeatherForecast('Chelyabinsk', 'metric', 'ru', '', 1);
$temps = array();
foreach ($forecast as $weather) {
	if (($weather->time->day->format('y-m-d') == date("y-m-d")) && ($weather->time->from->format('H:i') >= date("H:i"))
		|| ($weather->time->day->format('y-m-d') > date("y-m-d"))) {
		$temps[$weather->time->day->format('d.m')][] = array(
			"date" => $weather->time->day->format('d.m'),
			"time" => $weather->time->from->format('H:i'),
			"temp" => round($weather->temperature->getValue()),
			"desc" => $weather->weather->description
		);
	}
}

$fenom = Fenom::factory("../fenom_tpl", "../fenom_cache", "");
$return = $fenom->fetch('openweather_small.tpl', array("temps" => $temps));

$r["result"] = $return;
$r["status"] = "success";
echo json_encode($r);