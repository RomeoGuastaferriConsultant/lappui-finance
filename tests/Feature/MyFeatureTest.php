<?php

namespace Tests\Feature;

class MyFeatureTest extends FeatureTestBase
{
    public function testThis()
    {
        $this->driver->get('http://google.com');
        $this->assertTrue(true);
    }
}

?>