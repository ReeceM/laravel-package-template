<?php

namespace [__OWNER__]\[__PACKAGE__]\Tests;

use [__OWNER__]\[__PACKAGE__]\ServiceProvider;
use Orchestra\Testbench\TestCase as TestBenchTestCase;

class TestCase extends TestBenchTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // other things
    }

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }
}

