<?php
namespace SSCM\SadminBundle\Util;

final class Utility
{
	public static function camelCase($str, $exclude=array())
	{
    	$str = preg_replace('/[^a-z0-9' . implode("", $exclude) . ']+/i', ' ', $str);
	    // uppercase the first character of each word
	    $str = ucwords(trim($str));
	    return lcfirst(str_replace(" ", "", $str));
	}
}