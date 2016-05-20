<?php
namespace Json;

use Json\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->class = new Json();
    }
    /**
     * @test
     */
    public function itCanBeAJsonInstance()
    {
        $this->assertInstanceOf('Json\Json', $this->class, 'It must be an instance of Json\Json');
    }

    /**
     * @test
     */
    public function methodIsJsonShouldExist()
    {
        $this->assertTrue(method_exists($this->class, 'isJson'), 'method isJson should exist');
    }

    /**
     * @test
     * @depends methodIsJsonShouldExist
     */
    public function itMustValidateARightJson()
    {
        $this->assertTrue($this->class->isJson(json_encode(['key' => 'value'])), 'It must be a valid json');
    }

    /**
     * @test
     * @depends methodIsJsonShouldExist
     */
    public function itMustValidateAWrongJson()
    {
        $this->assertFalse($this->class->isJson('[key => value]'), 'It must be a wrong json');
    }
}
