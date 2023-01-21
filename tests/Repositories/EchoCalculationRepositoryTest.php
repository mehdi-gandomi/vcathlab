<?php namespace Tests\Repositories;

use Modules\User\Models\EchoCalculation;
use Modules\User\Repositories\EchoCalculationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EchoCalculationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EchoCalculationRepository
     */
    protected $echoCalculationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->echoCalculationRepo = \App::make(EchoCalculationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->make()->toArray();

        $createdEchoCalculation = $this->echoCalculationRepo->create($echoCalculation);

        $createdEchoCalculation = $createdEchoCalculation->toArray();
        $this->assertArrayHasKey('id', $createdEchoCalculation);
        $this->assertNotNull($createdEchoCalculation['id'], 'Created EchoCalculation must have id specified');
        $this->assertNotNull(EchoCalculation::find($createdEchoCalculation['id']), 'EchoCalculation with given id must be in DB');
        $this->assertModelData($echoCalculation, $createdEchoCalculation);
    }

    /**
     * @test read
     */
    public function test_read_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->create();

        $dbEchoCalculation = $this->echoCalculationRepo->find($echoCalculation->id);

        $dbEchoCalculation = $dbEchoCalculation->toArray();
        $this->assertModelData($echoCalculation->toArray(), $dbEchoCalculation);
    }

    /**
     * @test update
     */
    public function test_update_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->create();
        $fakeEchoCalculation = factory(EchoCalculation::class)->make()->toArray();

        $updatedEchoCalculation = $this->echoCalculationRepo->update($fakeEchoCalculation, $echoCalculation->id);

        $this->assertModelData($fakeEchoCalculation, $updatedEchoCalculation->toArray());
        $dbEchoCalculation = $this->echoCalculationRepo->find($echoCalculation->id);
        $this->assertModelData($fakeEchoCalculation, $dbEchoCalculation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_echo_calculation()
    {
        $echoCalculation = factory(EchoCalculation::class)->create();

        $resp = $this->echoCalculationRepo->delete($echoCalculation->id);

        $this->assertTrue($resp);
        $this->assertNull(EchoCalculation::find($echoCalculation->id), 'EchoCalculation should not exist in DB');
    }
}
