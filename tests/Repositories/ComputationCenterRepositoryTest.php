<?php namespace Tests\Repositories;

use Modules\User\Models\ComputationCenter;
use Modules\User\Repositories\ComputationCenterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComputationCenterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComputationCenterRepository
     */
    protected $computationCenterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->computationCenterRepo = \App::make(ComputationCenterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->make()->toArray();

        $createdComputationCenter = $this->computationCenterRepo->create($computationCenter);

        $createdComputationCenter = $createdComputationCenter->toArray();
        $this->assertArrayHasKey('id', $createdComputationCenter);
        $this->assertNotNull($createdComputationCenter['id'], 'Created ComputationCenter must have id specified');
        $this->assertNotNull(ComputationCenter::find($createdComputationCenter['id']), 'ComputationCenter with given id must be in DB');
        $this->assertModelData($computationCenter, $createdComputationCenter);
    }

    /**
     * @test read
     */
    public function test_read_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->create();

        $dbComputationCenter = $this->computationCenterRepo->find($computationCenter->id);

        $dbComputationCenter = $dbComputationCenter->toArray();
        $this->assertModelData($computationCenter->toArray(), $dbComputationCenter);
    }

    /**
     * @test update
     */
    public function test_update_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->create();
        $fakeComputationCenter = factory(ComputationCenter::class)->make()->toArray();

        $updatedComputationCenter = $this->computationCenterRepo->update($fakeComputationCenter, $computationCenter->id);

        $this->assertModelData($fakeComputationCenter, $updatedComputationCenter->toArray());
        $dbComputationCenter = $this->computationCenterRepo->find($computationCenter->id);
        $this->assertModelData($fakeComputationCenter, $dbComputationCenter->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_computation_center()
    {
        $computationCenter = factory(ComputationCenter::class)->create();

        $resp = $this->computationCenterRepo->delete($computationCenter->id);

        $this->assertTrue($resp);
        $this->assertNull(ComputationCenter::find($computationCenter->id), 'ComputationCenter should not exist in DB');
    }
}
