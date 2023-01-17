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
	 * @dataProvider validParenthesisProvider
	 */
	public function testValidParenthesis($str)
	{
			$this->assertTrue(isParenthesisValid($str));

	}

	public function validParenthesisProvider() : array
	{
		return [
			['Hello there'],
			['Hello (there)'],
			['Hello (th[e]re)'],
			['<Hello (th[e]re)>'],
		];
	}

	/**
	 * @dataProvider invalidParenthesisProvider
	 */
	public function testInvalidParenthesis($str)
	{
			$this->assertFalse(isParenthesisValid($str));

	}

	public function invalidParenthesisProvider() : array
	{
		return [
			['Hello (there'],
			['Hello )there('],
			['Hello (th[ere)'],
			['Hello (th[e)re]'],
			['Hello (th[ere)>'],
			['Hello (t[h<)er]e>'],
		];
	}

}
