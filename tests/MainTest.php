<?php

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
	public function testEmptyInput(): void
	{
		$this->expectException(Exception::class);
		isParenthesisValid('');
	}

	public function testWithNoParentheses():void
	{
		$this->assertTrue(isParenthesisValid('Hello there'));
	}

	public function testOneKindOfParentheses():void
	{
		$this->assertTrue(isParenthesisValid('Hello (there)'));
		$this->assertFalse(isParenthesisValid('Hello (there'));
		$this->assertFalse(isParenthesisValid('Hello )there('));
	}

	public function testTwoKindsOfParentheses():void
	{
		$this->assertTrue(isParenthesisValid('Hello (th[e]re)'));
		$this->assertFalse(isParenthesisValid('Hello (th[ere)'));
		$this->assertFalse(isParenthesisValid('Hello (th[e)re]'));
	}

	public function testThreeKindsOfParentheses():void
	{
		$this->assertTrue(isParenthesisValid('<Hello (th[e]re)>'));
		$this->assertFalse(isParenthesisValid('Hello (th[ere)>'));
		$this->assertFalse(isParenthesisValid('Hello (t[h<)er]e>'));
	}
}
