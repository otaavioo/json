<?php
namespace Json;

use Json\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itCanBeAJsonInstance()
    {
        $this->assertInstanceOf('Json\Json', new Json(), 'It must be an instance of Json\Json');
    }
}
