<?php

namespace Spip\Utils\Test;

use PHPUnit\Framework\TestCase;
use Spip\Utils\Url;

/**
 * @covers Spip\Utils\Url
 */
class UrlTest extends TestCase {
	public function testCreateFromString() {
		// Given
		$expected = [
			'scheme' => 'http',
			'user' => '',
			'pass' => '',
			'host' => 'host',
			'port' => 8000,
			'path' => '/test',
			'query' => 'query=yes',
			'fragment' => 'fragment'
		];

		// When
		$url = Url::createFromString('http://host:8000/test?query=yes#fragment');

		// Then
		$this->assertEquals($expected, $url->toArray());
	}

	public function testCreateFromArray() {
		// Given
		$expected = 'https://user:p4ssw0rd@machine.spip.net/usr/local/test';

		// When
		$url = Url::createFromArray([
			'scheme' => 'https',
			'host' => 'machine.spip.net',
			'path' => '/usr/local/test',
			'user' => 'user',
			'pass' => 'p4ssw0rd',
		]);

		// Then
		$this->assertEquals($expected, (string) $url);
	}
}
