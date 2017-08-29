<?php 
/** Fenom template 'wunderlist_row.tpl' compiled at 2017-08-29 17:39:07 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><?php  if(!empty($var["name"]) && (is_array($var["name"]) || $var["name"] instanceof \Traversable)) {
  foreach($var["name"] as $var["value"]) { ?>
<li><?php
/* wunderlist_row.tpl:2: {$value} */
 echo $var["value"]; ?></li>
<?php
/* wunderlist_row.tpl:3: {/foreach} */
   } } ?><?php
}, array(
	'options' => 0,
	'provider' => false,
	'name' => 'wunderlist_row.tpl',
	'base_name' => 'wunderlist_row.tpl',
	'time' => 1504013805,
	'depends' => array (
  0 => 
  array (
    'wunderlist_row.tpl' => 1504013805,
  ),
),
	'macros' => array(),

        ));
