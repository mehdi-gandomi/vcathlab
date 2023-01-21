<?php namespace Tests\Repositories;

use Modules\User\Models\MaceAssesment;
use Modules\User\Repositories\MaceAssesmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MaceAssesmentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MaceAssesmentRepository
     */
    protected $maceAssesmentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->maceAssesmentRepo = \App::make(MaceAssesmentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->make()->toArray();

        $createdMaceAssesment = $this->maceAssesmentRepo->create($maceAssesment);

        $createdMaceAssesment = $createdMaceAssesment->toArray();
        $this->assertArrayHasKey('id', $createdMaceAssesment);
        $this->assertNotNull($createdMaceAssesment['id'], 'Created MaceAssesment must have id specified');
        $this->assertNotNull(MaceAssesment::find($createdMaceAssesment['id']), 'MaceAssesment with given id must be in DB');
        $this->assertModelData($maceAssesment, $createdMaceAssesment);
    }

    /**
     * @test read
     */
    public function test_read_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->create();

        $dbMaceAssesment = $this->maceAssesmentRepo->find($maceAssesment->id);

        $dbMaceAssesment = $dbMaceAssesment->toArray();
        $this->assertModelData($maceAssesment->toArray(), $dbMaceAssesment);
    }

    /**
     * @test update
     */
    public function test_update_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->create();
        $fakeMaceAssesment = factory(MaceAssesment::class)->make()->toArray();

        $updatedMaceAssesment = $this->maceAssesmentRepo->update($fakeMaceAssesment, $maceAssesment->id);

        $this->assertModelData($fakeMaceAssesment, $updatedMaceAssesment->toArray());
        $dbMaceAssesment = $this->maceAssesmentRepo->find($maceAssesment->id);
        $this->assertModelData($fakeMaceAssesment, $dbMaceAssesment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_mace_assesment()
    {
        $maceAssesment = factory(MaceAssesment::class)->create();

        $resp = $this->maceAssesmentRepo->delete($maceAssesment->id);

        $this->assertTrue($resp);
        $this->assertNull(MaceAssesment::find($maceAssesment->id), 'MaceAssesment should not exist in DB');
    }
}
