<?php

/**
 * @param string $input
 *
 * @return bool
 * @throws Exception for empty input
 */

function isParenthesisValid(string $input): bool
{
	if ($input === '')
	{
		throw new Exception('Empty Input');
	}

	$helpingBraces = ['(', ')', '[', ']', '<', '>'];
	$braces = [
		')' => '(',
		']' => '[',
		">" => "<",
	];
	$stack = [];

	$chars = str_split($input);

	foreach ($chars as $char)
	{
		// if (!array_key_exists($char, $braces) || !in_array($char, $braces))
		// {
		// 	continue;
		// }
		// Не понимаю, почему проверка выше не работает. Пришлось закостылять дополнительный массив helpingBraces
		if (!in_array($char, $helpingBraces))
		{
			continue;
		}

		if (in_array($char, $braces))
		{
			$stack[] = $char;
			continue;
		}

		if (end($stack) !== $braces[$char])
		{
			return false;
		}

		array_pop($stack);
	}

	return count($stack) === 0;
}
