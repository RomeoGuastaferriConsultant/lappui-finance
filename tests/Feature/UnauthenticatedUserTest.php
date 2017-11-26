<?php

namespace Tests\Feature;

use WebDriverBy;
use WebDriverExpectedCondition;

class UnauthenticatedUserTest extends FeatureTestBase
{
    public function testAccueil()
    {
        // navigate to home page
        $this->driver->get(APP_URL);

        // wait for login page to display
        $this->driver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(
                // login button visible and clickable
                WebDriverBy::id("id-btn-login")));

        // verify that we have indeed landed on login page
        $element = $this->driver->findElement(WebDriverBy::id("id-frm-login"));
        $this->assertNotNull($element);
    }
}

?>