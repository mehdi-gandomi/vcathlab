<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\ComputationCenter;

class ComputationCenterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/computation_centers', $computationCenter
        );

        $this->assertApiResponse($computationCenter);
    }

    /**
     * @test
     */
    public function test_read_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/computation_centers/'.$computationCenter->id
        );

        $this->assertApiResponse($computationCenter->toArray());
    }

    /**
     * @test
     */
    public function test_update_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->create();
        $editedComputationCenter = factory(ComputationCenter::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/computation_centers/'.$computationCenter->id,
            $editedComputationCenter
        );

        $this->assertApiResponse($editedComputationCenter);
    }

    /**
     * @test
     */
    public function test_delete_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/computation_centers/'.$computationCenter->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/computation_centers/'.$computationCenter->id
        );

        $this->response->assertStatus(404);
    }
}
