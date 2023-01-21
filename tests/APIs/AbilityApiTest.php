<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\Test\Models\Ability;

class AbilityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ability()
    {
        $ability = factory(Ability::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/abilities', $ability
        );

        $this->assertApiResponse($ability);
    }

    /**
     * @test
     */
    public function test_read_ability()
    {
        $ability = factory(Ability::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/abilities/'.$ability->id
        );

        $this->assertApiResponse($ability->toArray());
    }

    /**
     * @test
     */
    public function test_update_ability()
    {
        $ability = factory(Ability::class)->create();
        $editedAbility = factory(Ability::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/abilities/'.$ability->id,
            $editedAbility
        );

        $this->assertApiResponse($editedAbility);
    }

    /**
     * @test
     */
    public function test_delete_ability()
    {
        $ability = factory(Ability::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/abilities/'.$ability->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/abilities/'.$ability->id
        );

        $this->response->assertStatus(404);
    }
}
