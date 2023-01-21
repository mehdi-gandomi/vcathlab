<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\Admin\Models\ComplexCaseCategory;

class ComplexCaseCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/complex_case_categories', $complexCaseCategory
        );

        $this->assertApiResponse($complexCaseCategory);
    }

    /**
     * @test
     */
    public function test_read_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/complex_case_categories/'.$complexCaseCategory->id
        );

        $this->assertApiResponse($complexCaseCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->create();
        $editedComplexCaseCategory = factory(ComplexCaseCategory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/complex_case_categories/'.$complexCaseCategory->id,
            $editedComplexCaseCategory
        );

        $this->assertApiResponse($editedComplexCaseCategory);
    }

    /**
     * @test
     */
    public function test_delete_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/complex_case_categories/'.$complexCaseCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/complex_case_categories/'.$complexCaseCategory->id
        );

        $this->response->assertStatus(404);
    }
}
