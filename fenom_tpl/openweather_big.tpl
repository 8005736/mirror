{$temp}
{switch $description}
	{case 'туман'}
		<i class="wi wi-fog"></i>
	{case 'ясно'}
	    <i class="wi wi-day-sunny"></i>
	{case 'пасмурно'}
		<i class="wi wi-night-cloudy"></i>
	{case 'облачно'}
		<i class="wi wi-cloudy"></i>
	{case default}
	    {$description}
{/switch}