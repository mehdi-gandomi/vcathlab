<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\AobpCalculation;

class AobpCalculationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/aobp_calculations', $aobpCalculation
        );

        $this->assertApiResponse($aobpCalculation);
    }

    /**
     * @test
     */
    public function test_read_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/aobp_calculations/'.$aobpCalculation->id
        );

        $this->assertApiResponse($aobpCalculation->toArray());
    }

    /**
     * @test
     */
    public function test_update_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->create();
        $editedAobpCalculation = factory(AobpCalculation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/aobp_calculations/'.$aobpCalculation->id,
            $editedAobpCalculation
        );

        $this->assertApiResponse($editedAobpCalculation);
    }

    /**
     * @test
     */
    public function test_delete_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/aobp_calculations/'.$aobpCalculation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/aobp_calculations/'.$aobpCalculation->id
        );

        $this->response->assertStatus(404);
    }
}
