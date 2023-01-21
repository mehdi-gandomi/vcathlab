<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\Admin\Models\CtCase;

class CtCaseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ct_case()
    {
        $ctCase = factory(CtCase::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ct_cases', $ctCase
        );

        $this->assertApiResponse($ctCase);
    }

    /**
     * @test
     */
    public function test_read_ct_case()
    {
        $ctCase = factory(CtCase::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/ct_cases/'.$ctCase->id
        );

        $this->assertApiResponse($ctCase->toArray());
    }

    /**
     * @test
     */
    public function test_update_ct_case()
    {
        $ctCase = factory(CtCase::class)->create();
        $editedCtCase = factory(CtCase::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ct_cases/'.$ctCase->id,
            $editedCtCase
        );

        $this->assertApiResponse($editedCtCase);
    }

    /**
     * @test
     */
    public function test_delete_ct_case()
    {
        $ctCase = factory(CtCase::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ct_cases/'.$ctCase->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ct_cases/'.$ctCase->id
        );

        $this->response->assertStatus(404);
    }
}
