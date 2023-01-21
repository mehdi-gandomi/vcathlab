<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\BodyComposition;

class BodyCompositionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/body_compositions', $bodyComposition
        );

        $this->assertApiResponse($bodyComposition);
    }

    /**
     * @test
     */
    public function test_read_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/body_compositions/'.$bodyComposition->id
        );

        $this->assertApiResponse($bodyComposition->toArray());
    }

    /**
     * @test
     */
    public function test_update_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->create();
        $editedBodyComposition = factory(BodyComposition::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/body_compositions/'.$bodyComposition->id,
            $editedBodyComposition
        );

        $this->assertApiResponse($editedBodyComposition);
    }

    /**
     * @test
     */
    public function test_delete_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/body_compositions/'.$bodyComposition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/body_compositions/'.$bodyComposition->id
        );

        $this->response->assertStatus(404);
    }
}
