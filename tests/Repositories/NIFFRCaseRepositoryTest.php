<?php namespace Tests\Repositories;

use Modules\User\Models\NIFFRCase;
use Modules\User\Repositories\NIFFRCaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NIFFRCaseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NIFFRCaseRepository
     */
    protected $nIFFRCaseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nIFFRCaseRepo = \App::make(NIFFRCaseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->make()->toArray();

        $createdNIFFRCase = $this->nIFFRCaseRepo->create($nIFFRCase);

        $createdNIFFRCase = $createdNIFFRCase->toArray();
        $this->assertArrayHasKey('id', $createdNIFFRCase);
        $this->assertNotNull($createdNIFFRCase['id'], 'Created NIFFRCase must have id specified');
        $this->assertNotNull(NIFFRCase::find($createdNIFFRCase['id']), 'NIFFRCase with given id must be in DB');
        $this->assertModelData($nIFFRCase, $createdNIFFRCase);
    }

    /**
     * @test read
     */
    public function test_read_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->create();

        $dbNIFFRCase = $this->nIFFRCaseRepo->find($nIFFRCase->id);

        $dbNIFFRCase = $dbNIFFRCase->toArray();
        $this->assertModelData($nIFFRCase->toArray(), $dbNIFFRCase);
    }

    /**
     * @test update
     */
    public function test_update_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->create();
        $fakeNIFFRCase = factory(NIFFRCase::class)->make()->toArray();

        $updatedNIFFRCase = $this->nIFFRCaseRepo->update($fakeNIFFRCase, $nIFFRCase->id);

        $this->assertModelData($fakeNIFFRCase, $updatedNIFFRCase->toArray());
        $dbNIFFRCase = $this->nIFFRCaseRepo->find($nIFFRCase->id);
        $this->assertModelData($fakeNIFFRCase, $dbNIFFRCase->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->create();

        $resp = $this->nIFFRCaseRepo->delete($nIFFRCase->id);

        $this->assertTrue($resp);
        $this->assertNull(NIFFRCase::find($nIFFRCase->id), 'NIFFRCase should not exist in DB');
    }
}
