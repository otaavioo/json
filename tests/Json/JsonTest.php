<?php
namespace Json;

use Json\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->class = new Json();
    }

    public function testItCanBeAJsonInstance()
    {
        $this->assertInstanceOf('Json\Json', $this->class, 'It must be an instance of Json\Json');
    }

    public function testMethodHasErrorShouldExist()
    {
        $this->assertTrue(method_exists($this->class, 'hasError'), 'method hasError should exist');
    }

    /**
     * @depends testMethodHasErrorShouldExist
     */
    public function testItCanValidateJson()
    {
        $this->assertTrue($this->class->hasError(null), 'It must be a valid json');
    }

    public function testMethodDecodeShouldExist()
    {
        $this->assertTrue(method_exists($this->class, 'decode'), 'method decode should exist');
    }

    /**
     * @depends testMethodDecodeShouldExist
     * @expectedException InvalidArgumentException
     */
    public function testItMustThrowInvalidArgumentExceptionIfReceivesInvalidJson()
    {
        $this->class->decode('[key => value]');
    }

    /**
     * @depends testMethodDecodeShouldExist
     * @expectedException InvalidArgumentException
     */
    public function testItMustThrowInvalidArgumentExceptionIfReceivesInvalidType2()
    {
        $this->class->decode('2016-08-26', true);
    }

    /**
     * @depends testMethodDecodeShouldExist
     * @expectedException InvalidArgumentException
     */
    public function testItMustThrowInvalidArgumentExceptionIfReceivesInvalidType()
    {
        $this->class->decode(json_encode(['key' => 'value']), null);
    }

    /**
     * @depends testMethodDecodeShouldExist
     */
    public function testItCanReturnADecodedJson()
    {
        $array = ['key' => 'value'];
        $this->assertInternalType('array', $this->class->decode(json_encode($array), true), 'It must be a valid array');
        $this->assertInternalType('object', $this->class->decode(json_encode($array), false), 'It must be a valid object');
    }

    /**
     * @depends testMethodDecodeShouldExist
     */
    public function testItCanDecodedJsonRecursively()
    {
        $array = ['key' => 'value'];
        $jsonEncodeTwice = json_encode(json_encode($array));

        $this->assertInternalType('array', $this->class->decode($jsonEncodeTwice, true), 'It must be a valid array');
    }

    public function testMethodEncodeShouldExist()
    {
        $this->assertTrue(method_exists($this->class, 'encode'), 'method encode should exist');
    }

    /**
     * @depends testMethodEncodeShouldExist
     * @expectedException Exception
     * @expectedExceptionMessage Json encode error: Malformed UTF-8 characters, possibly incorrectly encoded
     */
    public function testItMustThrowInvalidArgumentExceptionIfReceivesInvalidArray()
    {
        $this->class->encode("\xB1\x31");
    }

    /**
     * @depends testMethodEncodeShouldExist
     */
    public function testItCanReturnAnEncodedJsonWithAnArrayPassedByParameter()
    {
        $array = ['key' => 'value'];
        $this->assertSame('{"key":"value"}', $this->class->encode($array));
    }

    /**
     * @depends testMethodEncodeShouldExist
     */
    public function testItCanReturnAnEncodedJsonWithAnObjectPassedByParameter()
    {
        $obj = new \stdClass();
        $obj->key = 'value';
        $this->assertSame('{"key":"value"}', $this->class->encode($obj));
    }
}
