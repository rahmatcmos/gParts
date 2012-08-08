<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('set_satuan')) {
	function set_satuan($val)
	{
		switch($val)
		{
			case 1:
			$val="pcs";break;
			case 2:
			$val="unit";break;
			case 3:
			$val="set";break;
			case 4:
			$val="meter";break;
			case 5:
			$val="pack";break;
			case 6:
			$val="hari";break;
			case 7:
			$val="minggu";break;
			case 8:
			$val="bulan";break;
			case 9:
			$val="tahun";break;
			case 10:
			$val="lot";break;
		}
		return $val;
	}
}

if (! function_exists('set_satuan_mini')) {
	function set_satuan_mini($val)
	{
		switch($val)
		{
			case 1:
			$val="pcs";break;
			case 2:
			$val="unit";break;
			case 3:
			$val="set";break;
			case 4:
			$val="mtr";break;
			case 5:
			$val="pack";break;
			case 6:
			$val="D";break;
			case 7:
			$val="W";break;
			case 8:
			$val="M";break;
			case 9:
			$val="Y";break;
			case 10:
			$val="lot";break;
		}
		return $val;
	}
}

if (! function_exists('bulan')) {
	function bulan($val)
	{
		switch($val)
		{
			case 1:
			$val="januari";break;
			case 2:
			$val="februari";break;
			case 3:
			$val="maret";break;
			case 4:
			$val="april";break;
			case 5:
			$val="mei";break;
			case 6:
			$val="juni";break;
			case 7:
			$val="juli";break;
			case 8:
			$val="agustus";break;
			case 9:
			$val="september";break;
			case 10:
			$val="oktober";break;
			case 11:
			$val="november";break;
			case 12:
			$val="desember";break;

		}
		return $val;
	}	
}

if (! function_exists('tlo_convert')) {
	function tlo_convert($val){
		switch($val)
		{
			case 1:$val="lokal";break;
			case 2:$val="import";break;
			default:$val="lokal";break;

		}
		return $val;
	}
}

if (! function_exists('set_lokasiorder')) {
	function set_lokasiorder($val){
		switch($val)
		{
			case 0:$val="import";break;
			case 1:$val="lokal";break;
			default:$val="lokal";break;

		}
		return $val;
	}
}
