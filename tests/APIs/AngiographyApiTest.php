<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\Angiography;

class AngiographyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_angiography()
    {
        $angiography = factory(Angiography::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/angiographies', $angiography
        );

        $this->assertApiResponse($angiography);
    }

    /**
     * @test
     */
    public function test_read_angiography()
    {
        $angiography = factory(Angiography::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/angiographies/'.$angiography->id
        );

        $this->assertApiResponse($angiography->toArray());
    }

    /**
     * @test
     */
    public function test_update_angiography()
    {
        $angiography = factory(Angiography::class)->create();
        $editedAngiography = factory(Angiography::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/angiographies/'.$angiography->id,
            $editedAngiography
        );

        $this->assertApiResponse($editedAngiography);
    }

    /**
     * @test
     */
    public function test_delete_angiography()
    {
        $angiography = factory(Angiography::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/angiographies/'.$angiography->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/angiographies/'.$angiography->id
        );

        $this->response->assertStatus(404);
    }
}
