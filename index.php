#!/usr/bin/php
<?php

if ( ! isset($argv[1]))
{
	die('Not enough input arguments');
}

include_once 'functions.php';

echo getAbrakadabra($argv[1]);

