<?php

namespace Tests\Feature;

use RemoteWebDriver;
use WebDriverCapabilityType;
use PHPUnit\Framework\TestCase as BaseTestCase;

/** default host: Selenium Hub */
define('WEB_DRIVER_HOST', env('WEB_DRIVER_HOST', 'http://localhost:4444/wd/hub'));
define('WEB_BROWSER',     env('WEB_BROWSER',     'firefox'));

abstract class FeatureTestBase extends BaseTestCase
{
    /** @var RemoteWebDriver $driver */
    protected $driver;

    //
    // setUp & tearDown
    //

    protected function setUp() {
        $this->driver = $this->createWebDriver();
    }

    protected function tearDown() {
        $this->driver->quit();
    }

    //
    // implementation
    //

    private function createWebDriver()
    {
        $capabilities = [
            WebDriverCapabilityType::BROWSER_NAME => WEB_BROWSER,
        ];

        return RemoteWebDriver::create(WEB_DRIVER_HOST, $capabilities);
    }
}
