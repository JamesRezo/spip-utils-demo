<?php

namespace Spip\Utils;

use function parse_url as native_parse_url;

class Url {
	/** @var array<string, int|string> */
	private $parsed = [
		'scheme' => '',
		'host' => '',
		'port' => 0,
		'user' => '',
		'pass' => '',
		'path' => '',
		'query' => '',
		'fragment' => '',
	];

	/**
	 * @param array<string, int|string> $parsed
	 */
	private function __construct(array $parsed) {
		$this->parsed = array_merge($this->parsed, $parsed);
	}

	public static function createFromString(string $url): self {
		$parsed = native_parse_url($url) ?: [];

		return new self($parsed);
	}

	/**
	 * @param array<string, int|string> $parsed
	 */
	public static function createFromArray(array $parsed): self {
		return new self($parsed);
	}

	public function __toString() {
		$url = '';

		if (isset($this->parsed['scheme'])) {
			$url = $this->parsed['scheme'] . '://';
		}

		if (!empty($this->parsed['user'])) {
			$url .= $this->parsed['user'] . (isset($this->parsed['pass']) ? (':' . $this->parsed['pass']) : '') . '@';
		}

		if (isset($this->parsed['host'])) {
			$url .= $this->parsed['host'];
		}

		if (isset($this->parsed['port']) && $this->parsed['port'] > 0) {
			$url .= ':' . $this->parsed['port'];
		}

		if (isset($this->parsed['path'])) {
			$url .= '/' . ltrim(strval($this->parsed['path']), '/');
		}

		if (!empty($this->parsed['query'])) {
			$url .= '?' . $this->parsed['query'];
		}

		if (!empty($this->parsed['fragment'])) {
			$url .= '#' . $this->parsed['fragment'];
		}

		return $url;
	}

	/**
	 * @return array<string, int|string>
	 */
	public function toArray(): array {
		return $this->parsed;
	}
}
