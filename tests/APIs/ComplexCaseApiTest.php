<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\Admin\Models\ComplexCase;

class ComplexCaseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/complex_cases', $complexCase
        );

        $this->assertApiResponse($complexCase);
    }

    /**
     * @test
     */
    public function test_read_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/complex_cases/'.$complexCase->id
        );

        $this->assertApiResponse($complexCase->toArray());
    }

    /**
     * @test
     */
    public function test_update_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->create();
        $editedComplexCase = factory(ComplexCase::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/complex_cases/'.$complexCase->id,
            $editedComplexCase
        );

        $this->assertApiResponse($editedComplexCase);
    }

    /**
     * @test
     */
    public function test_delete_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/complex_cases/'.$complexCase->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/complex_cases/'.$complexCase->id
        );

        $this->response->assertStatus(404);
    }
}
