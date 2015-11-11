<?php

class Test extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider matcherProvider
	 */
	public function testAbrakadabra($string, $expected)
	{
		include_once 'functions.php';
		$this->assertEquals($expected, getAbrakadabra($string));
	}

	public function matcherProvider()
	{
		return [
			['Hello world!', '!dlrw llH'],
		    ['HelOl wOrLd!', '!dLrw llH']
		];
	}
}
