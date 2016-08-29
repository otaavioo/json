<?php
namespace Json;

use Json\Constants\Constants;

class ConstantsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->class = new Constants();
    }

    /**
     * @test
     * @dataProvider constantsProvider
     */
    public function testConstantValue($actual, $expected)
    {
        $reflectionClass = new \ReflectionClass($this->class);

        $this->assertEquals($expected, $reflectionClass->getConstant($actual), 'Test that the default Page Limit of 5 was not changed');
    }

    public function constantsProvider()
    {
        return [
            ['JSON_ERROR_NONE', 'No error has occurred'],
            ['JSON_ERROR_DEPTH', 'The maximum stack depth has been exceeded'],
            ['JSON_ERROR_STATE_MISMATCH', 'Invalid or malformed JSON'],
            ['JSON_ERROR_CTRL_CHAR', 'Control character error, possibly incorrectly encoded'],
            ['JSON_ERROR_SYNTAX', 'Syntax error'],
            ['JSON_ERROR_UTF8', 'Malformed UTF-8 characters, possibly incorrectly encoded'],
        ];
    }
}
