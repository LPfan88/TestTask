<?php

function getAbrakadabra($string)
{
	$vowels = ['a', 'e', 'i', 'o', 'u', 'y'];
	$string = str_ireplace($vowels, '', $string);

	return strrev($string);
}
