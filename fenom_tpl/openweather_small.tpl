{foreach $temps as $key => $value}
	<div uk-grid>
	    <div class="uk-width-1-4">
	    	<strong>{$key}</strong>
	    </div>
	    <div class="uk-width-3-4">
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
	    </div>
	</div>
{/foreach}