<?php namespace Tests\Repositories;

use Modules\Admin\Models\ComplexCase;
use Modules\Admin\Repositories\ComplexCaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComplexCaseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComplexCaseRepository
     */
    protected $complexCaseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->complexCaseRepo = \App::make(ComplexCaseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->make()->toArray();

        $createdComplexCase = $this->complexCaseRepo->create($complexCase);

        $createdComplexCase = $createdComplexCase->toArray();
        $this->assertArrayHasKey('id', $createdComplexCase);
        $this->assertNotNull($createdComplexCase['id'], 'Created ComplexCase must have id specified');
        $this->assertNotNull(ComplexCase::find($createdComplexCase['id']), 'ComplexCase with given id must be in DB');
        $this->assertModelData($complexCase, $createdComplexCase);
    }

    /**
     * @test read
     */
    public function test_read_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->create();

        $dbComplexCase = $this->complexCaseRepo->find($complexCase->id);

        $dbComplexCase = $dbComplexCase->toArray();
        $this->assertModelData($complexCase->toArray(), $dbComplexCase);
    }

    /**
     * @test update
     */
    public function test_update_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->create();
        $fakeComplexCase = factory(ComplexCase::class)->make()->toArray();

        $updatedComplexCase = $this->complexCaseRepo->update($fakeComplexCase, $complexCase->id);

        $this->assertModelData($fakeComplexCase, $updatedComplexCase->toArray());
        $dbComplexCase = $this->complexCaseRepo->find($complexCase->id);
        $this->assertModelData($fakeComplexCase, $dbComplexCase->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_complex_case()
    {
        $complexCase = factory(ComplexCase::class)->create();

        $resp = $this->complexCaseRepo->delete($complexCase->id);

        $this->assertTrue($resp);
        $this->assertNull(ComplexCase::find($complexCase->id), 'ComplexCase should not exist in DB');
    }
}
