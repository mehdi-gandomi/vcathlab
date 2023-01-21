<?php namespace Tests\Repositories;

use Modules\Test\Models\Ability;
use Modules\Test\Repositories\AbilityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AbilityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AbilityRepository
     */
    protected $abilityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->abilityRepo = \App::make(AbilityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ability()
    {
        $ability = factory(Ability::class)->make()->toArray();

        $createdAbility = $this->abilityRepo->create($ability);

        $createdAbility = $createdAbility->toArray();
        $this->assertArrayHasKey('id', $createdAbility);
        $this->assertNotNull($createdAbility['id'], 'Created Ability must have id specified');
        $this->assertNotNull(Ability::find($createdAbility['id']), 'Ability with given id must be in DB');
        $this->assertModelData($ability, $createdAbility);
    }

    /**
     * @test read
     */
    public function test_read_ability()
    {
        $ability = factory(Ability::class)->create();

        $dbAbility = $this->abilityRepo->find($ability->id);

        $dbAbility = $dbAbility->toArray();
        $this->assertModelData($ability->toArray(), $dbAbility);
    }

    /**
     * @test update
     */
    public function test_update_ability()
    {
        $ability = factory(Ability::class)->create();
        $fakeAbility = factory(Ability::class)->make()->toArray();

        $updatedAbility = $this->abilityRepo->update($fakeAbility, $ability->id);

        $this->assertModelData($fakeAbility, $updatedAbility->toArray());
        $dbAbility = $this->abilityRepo->find($ability->id);
        $this->assertModelData($fakeAbility, $dbAbility->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ability()
    {
        $ability = factory(Ability::class)->create();

        $resp = $this->abilityRepo->delete($ability->id);

        $this->assertTrue($resp);
        $this->assertNull(Ability::find($ability->id), 'Ability should not exist in DB');
    }
}
