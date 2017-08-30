{foreach $temps as $key => $value}
	<strong>{$key}</strong>
	<br/>
	{foreach $value as $k => $v}
		{$v.time} :: {$v.temp} :: {$v.desc}<br/>
	{/foreach}
	<hr>
{/foreach}