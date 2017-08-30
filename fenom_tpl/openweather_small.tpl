{foreach $temps as $key => $value}
	<strong>{$key}</strong>
	<br/>
	{foreach $value as $k => $v}
		{$v.time} :: {$v.temp} ::
		{switch $v.desc}
			{case 'ясно'}
			    <i class="wi wi-day-sunny"></i>
			{case 'пасмурно'}
				<i class="wi wi-night-cloudy"></i>
			{case 'облачно'}
				<i class="wi wi-cloudy"></i>
			{case default}
			    {$v.desc}
		{/switch}
		<br/>
	{/foreach}
	<hr>
{/foreach}