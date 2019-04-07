<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

// vendor/bin/phpunit

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
