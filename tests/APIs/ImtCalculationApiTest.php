<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\ImtCalculation;

class ImtCalculationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/imt_calculations', $imtCalculation
        );

        $this->assertApiResponse($imtCalculation);
    }

    /**
     * @test
     */
    public function test_read_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/imt_calculations/'.$imtCalculation->id
        );

        $this->assertApiResponse($imtCalculation->toArray());
    }

    /**
     * @test
     */
    public function test_update_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->create();
        $editedImtCalculation = factory(ImtCalculation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/imt_calculations/'.$imtCalculation->id,
            $editedImtCalculation
        );

        $this->assertApiResponse($editedImtCalculation);
    }

    /**
     * @test
     */
    public function test_delete_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/imt_calculations/'.$imtCalculation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/imt_calculations/'.$imtCalculation->id
        );

        $this->response->assertStatus(404);
    }
}
