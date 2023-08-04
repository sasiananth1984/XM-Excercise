<?php
namespace Tests\Unit;;

use App\Http\Controllers\CompanyFormController;
use Tests\TestCase;

/**
 * Class CompanyFormControllerTest.
 *
 * @covers \App\Http\Controllers\CompanyFormController
 */
final class CompanyFormControllerTest extends TestCase
{
    private CompanyFormController $companyFormController;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->companyFormController = new CompanyFormController();
        $this->app->instance(CompanyFormController::class, $this->companyFormController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->companyFormController);
    }

    public function testCreateForm(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/company')
            ->assertStatus(200);
    }

    public function testCompanyForm(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/company')
            ->assertStatus(200);
    }

    public function testLoadJsondata(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/company')
            ->assertStatus(200);
    }
}