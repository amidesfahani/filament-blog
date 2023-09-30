<?php

use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;

/**
 * Shorter auth()->user()
 * But used mainly due to interface Authenticatable and not User on original method,
 * that causes undefined method warning on IDE
 *
 * @return \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null
 */
function user()
{
	return auth()->user();
}


function display_date(Carbon $date, $format = 'Y-m-d'): string
{
	/**
	 * you can check for app->locale
	 */
	$date = Jalalian::fromCarbon($date);
	if ($format == 'human') {
		return $date->ago();
	}

	return $date->format($format);
}
