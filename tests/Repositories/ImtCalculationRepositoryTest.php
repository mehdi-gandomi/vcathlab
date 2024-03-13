<?php namespace Tests\Repositories;

use Modules\User\Models\ImtCalculation;
use Modules\User\Repositories\ImtCalculationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ImtCalculationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ImtCalculationRepository
     */
    protected $imtCalculationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->imtCalculationRepo = \App::make(ImtCalculationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->make()->toArray();

        $createdImtCalculation = $this->imtCalculationRepo->create($imtCalculation);

        $createdImtCalculation = $createdImtCalculation->toArray();
        $this->assertArrayHasKey('id', $createdImtCalculation);
        $this->assertNotNull($createdImtCalculation['id'], 'Created ImtCalculation must have id specified');
        $this->assertNotNull(ImtCalculation::find($createdImtCalculation['id']), 'ImtCalculation with given id must be in DB');
        $this->assertModelData($imtCalculation, $createdImtCalculation);
    }

    /**
     * @test read
     */
    public function test_read_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->create();

        $dbImtCalculation = $this->imtCalculationRepo->find($imtCalculation->id);

        $dbImtCalculation = $dbImtCalculation->toArray();
        $this->assertModelData($imtCalculation->toArray(), $dbImtCalculation);
    }

    /**
     * @test update
     */
    public function test_update_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->create();
        $fakeImtCalculation = factory(ImtCalculation::class)->make()->toArray();

        $updatedImtCalculation = $this->imtCalculationRepo->update($fakeImtCalculation, $imtCalculation->id);

        $this->assertModelData($fakeImtCalculation, $updatedImtCalculation->toArray());
        $dbImtCalculation = $this->imtCalculationRepo->find($imtCalculation->id);
        $this->assertModelData($fakeImtCalculation, $dbImtCalculation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_imt_calculation()
    {
        $imtCalculation = factory(ImtCalculation::class)->create();

        $resp = $this->imtCalculationRepo->delete($imtCalculation->id);

        $this->assertTrue($resp);
        $this->assertNull(ImtCalculation::find($imtCalculation->id), 'ImtCalculation should not exist in DB');
    }
}
