<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\MaceAssesment;

class MaceAssesmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/mace_assesments', $maceAssesment
        );

        $this->assertApiResponse($maceAssesment);
    }

    /**
     * @test
     */
    public function test_read_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/mace_assesments/'.$maceAssesment->id
        );

        $this->assertApiResponse($maceAssesment->toArray());
    }

    /**
     * @test
     */
    public function test_update_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->create();
        $editedMaceAssesment = factory(MaceAssesment::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/mace_assesments/'.$maceAssesment->id,
            $editedMaceAssesment
        );

        $this->assertApiResponse($editedMaceAssesment);
    }

    /**
     * @test
     */
    public function test_delete_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/mace_assesments/'.$maceAssesment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/mace_assesments/'.$maceAssesment->id
        );

        $this->response->assertStatus(404);
    }
}
