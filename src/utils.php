<?php

namespace Spip\Utils;

/**
 * @return array<string, int|string>
 */
function parse_url(string $url): array {
	return Url::createFromString($url)->toArray();
}

/**
 * @param array<string, int|string> $parsed
 */
function glue_url(array $parsed): string {
	return (string) Url::createFromArray($parsed);
}
