<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Chrome\ChromeOptions;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        // return RemoteWebDriver::create(
        //     'http://localhost:9515', DesiredCapabilities::chrome()
        // );
        // $options = (new ChromeOptions)->addArguments(['headless']);
        //
        // return RemoteWebDriver::create(
        //     'http://chrome:4444', DesiredCapabilities::chrome()->setCapability(
        //         ChromeOptions::CAPABILITY, $options
        //     )
        // );
        return RemoteWebDriver::create(
            'http://chrome:4444/wd/hub', DesiredCapabilities::chrome()
        );
    }
}
