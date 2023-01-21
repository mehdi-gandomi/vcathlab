<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\EchoCalculation;

class EchoCalculationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/echo_calculations', $echoCalculation
        );

        $this->assertApiResponse($echoCalculation);
    }

    /**
     * @test
     */
    public function test_read_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/echo_calculations/'.$echoCalculation->id
        );

        $this->assertApiResponse($echoCalculation->toArray());
    }

    /**
     * @test
     */
    public function test_update_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->create();
        $editedEchoCalculation = factory(EchoCalculation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/echo_calculations/'.$echoCalculation->id,
            $editedEchoCalculation
        );

        $this->assertApiResponse($editedEchoCalculation);
    }

    /**
     * @test
     */
    public function test_delete_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/echo_calculations/'.$echoCalculation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/echo_calculations/'.$echoCalculation->id
        );

        $this->response->assertStatus(404);
    }
}
