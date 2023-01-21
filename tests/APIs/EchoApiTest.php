<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\Echo;

class EchoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_echo()
    {
        $echo = factory(Echo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/echoes', $echo
        );

        $this->assertApiResponse($echo);
    }

    /**
     * @test
     */
    public function test_read_echo()
    {
        $echo = factory(Echo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/echoes/'.$echo->id
        );

        $this->assertApiResponse($echo->toArray());
    }

    /**
     * @test
     */
    public function test_update_echo()
    {
        $echo = factory(Echo::class)->create();
        $editedEcho = factory(Echo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/echoes/'.$echo->id,
            $editedEcho
        );

        $this->assertApiResponse($editedEcho);
    }

    /**
     * @test
     */
    public function test_delete_echo()
    {
        $echo = factory(Echo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/echoes/'.$echo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/echoes/'.$echo->id
        );

        $this->response->assertStatus(404);
    }
}
