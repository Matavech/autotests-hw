<?php

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
	public function testEmptyInput(): void
	{
		$this->expectException(Exception::class);
		isParenthesisValid('');
	}

	/**
	 * @dataprovider validParenthesisProvider
	 */
	public function testValidParenthesis()
	{
		foreach ($this->validParenthesisProvider() as $str)
		{
			$this->assertTrue(isParenthesisValid($str));
		}
	}

	public function validParenthesisProvider()
	{
		return [
			'Hello there',
			'Hello (there)',
			'Hello (th[e]re)',
			'<Hello (th[e]re)>',
		];
	}

	/**
	 * @dataprovider invalidParenthesisProvider
	 */
	public function testInvalidParenthesis()
	{
		foreach ($this->invalidParenthesisProvider() as $str)
		{
			$this->assertFalse(isParenthesisValid($str));
		}

	}

	public function invalidParenthesisProvider()
	{
		return [
			'Hello (there',
			'Hello )there(',
			'Hello (th[ere)',
			'Hello (th[e)re]',
			'Hello (th[ere)>',
			'Hello (t[h<)er]e>',
		];
	}

}
