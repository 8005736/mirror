<?php 
/** Fenom template 'openweather_row.tpl' compiled at 2017-08-30 14:08:44 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><?php  if(!empty($var["temps"]) && (is_array($var["temps"]) || $var["temps"] instanceof \Traversable)) {
  foreach($var["temps"] as $var["key"] => $var["value"]) { ?>
	<strong><?php
/* openweather_row.tpl:2: {$key} */
 echo $var["key"]; ?></strong>
	<br/>
	<?php  if(!empty($var["value"]) && (is_array($var["value"]) || $var["value"] instanceof \Traversable)) {
  foreach($var["value"] as $var["k"] => $var["v"]) { ?>
		<?php
/* openweather_row.tpl:5: {$v.time} */
 echo $var["v"]["time"]; ?> :: <?php
/* openweather_row.tpl:5: {$v.temp} */
 echo $var["v"]["temp"]; ?> :: <?php
/* openweather_row.tpl:5: {$v.desc} */
 echo $var["v"]["desc"]; ?><br/>
	<?php
/* openweather_row.tpl:6: {/foreach} */
   } } ?>
	<hr>
<?php
/* openweather_row.tpl:8: {/foreach} */
   } } ?><?php
}, array(
	'options' => 0,
	'provider' => false,
	'name' => 'openweather_row.tpl',
	'base_name' => 'openweather_row.tpl',
	'time' => 1504090252,
	'depends' => array (
  0 => 
  array (
    'openweather_row.tpl' => 1504090252,
  ),
),
	'macros' => array(),

        ));
