<?php

namespace Tests\Feature;

use RemoteWebDriver;
use WebDriverCapabilityType;
use PHPUnit\Framework\TestCase as BaseTestCase;

/** default host: Selenium Hub */
define('WEB_DRIVER_HOST', env('WEB_DRIVER_HOST', 'http://localhost:4444/wd/hub'));
define('BROWSER',         env('BROWSER',  'chrome'));
define('PLATFORM',        env('PLATFORM', 'linux'));
define('APP_URL',         env('APP_URL',  'http://173.176.184.76:8000/accueil'));

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
            WebDriverCapabilityType::BROWSER_NAME => BROWSER,
            WebDriverCapabilityType::PLATFORM => PLATFORM,
        ];

        return RemoteWebDriver::create(WEB_DRIVER_HOST, $capabilities);
    }
}
