<?php

namespace Tests\Unit;

use App\Http\Controllers\YhFinanceController;
use Tests\TestCase;

/**
 * Class YhFinanceControllerTest.
 *
 * @covers \App\Http\Controllers\YhFinanceController
 */
final class YhFinanceControllerTest extends TestCase
{
    private YhFinanceController $yhFinanceController;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->yhFinanceController = new YhFinanceController();
        $this->app->instance(YhFinanceController::class, $this->yhFinanceController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->yhFinanceController);
    }
}
