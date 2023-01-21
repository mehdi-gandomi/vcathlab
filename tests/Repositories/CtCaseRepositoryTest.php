<?php namespace Tests\Repositories;

use Modules\Admin\Models\CtCase;
use Modules\Admin\Repositories\CtCaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CtCaseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CtCaseRepository
     */
    protected $ctCaseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ctCaseRepo = \App::make(CtCaseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ct_case()
    {
        $ctCase = factory(CtCase::class)->make()->toArray();

        $createdCtCase = $this->ctCaseRepo->create($ctCase);

        $createdCtCase = $createdCtCase->toArray();
        $this->assertArrayHasKey('id', $createdCtCase);
        $this->assertNotNull($createdCtCase['id'], 'Created CtCase must have id specified');
        $this->assertNotNull(CtCase::find($createdCtCase['id']), 'CtCase with given id must be in DB');
        $this->assertModelData($ctCase, $createdCtCase);
    }

    /**
     * @test read
     */
    public function test_read_ct_case()
    {
        $ctCase = factory(CtCase::class)->create();

        $dbCtCase = $this->ctCaseRepo->find($ctCase->id);

        $dbCtCase = $dbCtCase->toArray();
        $this->assertModelData($ctCase->toArray(), $dbCtCase);
    }

    /**
     * @test update
     */
    public function test_update_ct_case()
    {
        $ctCase = factory(CtCase::class)->create();
        $fakeCtCase = factory(CtCase::class)->make()->toArray();

        $updatedCtCase = $this->ctCaseRepo->update($fakeCtCase, $ctCase->id);

        $this->assertModelData($fakeCtCase, $updatedCtCase->toArray());
        $dbCtCase = $this->ctCaseRepo->find($ctCase->id);
        $this->assertModelData($fakeCtCase, $dbCtCase->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ct_case()
    {
        $ctCase = factory(CtCase::class)->create();

        $resp = $this->ctCaseRepo->delete($ctCase->id);

        $this->assertTrue($resp);
        $this->assertNull(CtCase::find($ctCase->id), 'CtCase should not exist in DB');
    }
}
