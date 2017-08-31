<?php 
/** Fenom template 'wunderlist_row.tpl' compiled at 2017-08-31 09:56:44 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><ul>
<?php  if(!empty($var["name"]) && (is_array($var["name"]) || $var["name"] instanceof \Traversable)) {
  foreach($var["name"] as $var["value"]) { ?>
	<li><?php
/* wunderlist_row.tpl:3: {$value} */
 echo $var["value"]; ?></li>
<?php
/* wunderlist_row.tpl:4: {/foreach} */
   } } ?>
</ul><?php
}, array(
	'options' => 0,
	'provider' => false,
	'name' => 'wunderlist_row.tpl',
	'base_name' => 'wunderlist_row.tpl',
	'time' => 1504117582,
	'depends' => array (
  0 => 
  array (
    'wunderlist_row.tpl' => 1504117582,
  ),
),
	'macros' => array(),

        ));
