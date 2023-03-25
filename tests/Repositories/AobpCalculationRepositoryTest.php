<?php namespace Tests\Repositories;

use Modules\User\Models\AobpCalculation;
use Modules\User\Repositories\AobpCalculationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AobpCalculationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AobpCalculationRepository
     */
    protected $aobpCalculationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->aobpCalculationRepo = \App::make(AobpCalculationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->make()->toArray();

        $createdAobpCalculation = $this->aobpCalculationRepo->create($aobpCalculation);

        $createdAobpCalculation = $createdAobpCalculation->toArray();
        $this->assertArrayHasKey('id', $createdAobpCalculation);
        $this->assertNotNull($createdAobpCalculation['id'], 'Created AobpCalculation must have id specified');
        $this->assertNotNull(AobpCalculation::find($createdAobpCalculation['id']), 'AobpCalculation with given id must be in DB');
        $this->assertModelData($aobpCalculation, $createdAobpCalculation);
    }

    /**
     * @test read
     */
    public function test_read_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->create();

        $dbAobpCalculation = $this->aobpCalculationRepo->find($aobpCalculation->id);

        $dbAobpCalculation = $dbAobpCalculation->toArray();
        $this->assertModelData($aobpCalculation->toArray(), $dbAobpCalculation);
    }

    /**
     * @test update
     */
    public function test_update_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->create();
        $fakeAobpCalculation = factory(AobpCalculation::class)->make()->toArray();

        $updatedAobpCalculation = $this->aobpCalculationRepo->update($fakeAobpCalculation, $aobpCalculation->id);

        $this->assertModelData($fakeAobpCalculation, $updatedAobpCalculation->toArray());
        $dbAobpCalculation = $this->aobpCalculationRepo->find($aobpCalculation->id);
        $this->assertModelData($fakeAobpCalculation, $dbAobpCalculation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_aobp_calculation()
    {
        $aobpCalculation = factory(AobpCalculation::class)->create();

        $resp = $this->aobpCalculationRepo->delete($aobpCalculation->id);

        $this->assertTrue($resp);
        $this->assertNull(AobpCalculation::find($aobpCalculation->id), 'AobpCalculation should not exist in DB');
    }
}
