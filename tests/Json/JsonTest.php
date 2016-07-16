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
    public function itCanValidateJson()
    {
        $this->assertTrue($this->class->isJson(json_encode(['key' => 'value'])), 'It must be a valid json');
        $this->assertFalse($this->class->isJson('[key => value]'), 'It must be a wrong json');
    }

    /**
     * @test
     */
    public function methodDecodeShouldExist()
    {
        $this->assertTrue(method_exists($this->class, 'decode'), 'method decode should exist');
    }

    /**
     * @test
     * @depends methodDecodeShouldExist
     * @expectedException InvalidArgumentException
     */
    public function itMustThrowInvalidArgumentExceptionIfReceivesInvalidJson()
    {
        $this->assertFalse($this->class->decode('[key => value]'), 'It must be a valid json');
    }

    /**
     * @test
     * @depends methodDecodeShouldExist
     * @expectedException InvalidArgumentException
     */
    public function itMustThrowInvalidArgumentExceptionIfReceivesInvalidType()
    {
        $this->assertFalse($this->class->decode(json_encode(['key' => 'value']), null), 'It must be a valid type');
    }

    /**
     * @test
     * @depends methodDecodeShouldExist
     */
    public function itCanReturnADecodedJson()
    {
        $array = ['key' => 'value'];
        $this->assertInternalType('array', $this->class->decode(json_encode($array), true), 'It must be a valid array');
        $this->assertInternalType('object', $this->class->decode(json_encode($array), false), 'It must be a valid object');
    }

    /**
     * @test
     */
    public function methodEncodeShouldExist()
    {
        $this->assertTrue(method_exists($this->class, 'encode'), 'method encode should exist');
    }
}
