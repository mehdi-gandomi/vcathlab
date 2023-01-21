<?php namespace Tests\Repositories;

use Modules\Admin\Models\ComplexCaseCategory;
use Modules\Admin\Repositories\ComplexCaseCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComplexCaseCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComplexCaseCategoryRepository
     */
    protected $complexCaseCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->complexCaseCategoryRepo = \App::make(ComplexCaseCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->make()->toArray();

        $createdComplexCaseCategory = $this->complexCaseCategoryRepo->create($complexCaseCategory);

        $createdComplexCaseCategory = $createdComplexCaseCategory->toArray();
        $this->assertArrayHasKey('id', $createdComplexCaseCategory);
        $this->assertNotNull($createdComplexCaseCategory['id'], 'Created ComplexCaseCategory must have id specified');
        $this->assertNotNull(ComplexCaseCategory::find($createdComplexCaseCategory['id']), 'ComplexCaseCategory with given id must be in DB');
        $this->assertModelData($complexCaseCategory, $createdComplexCaseCategory);
    }

    /**
     * @test read
     */
    public function test_read_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->create();

        $dbComplexCaseCategory = $this->complexCaseCategoryRepo->find($complexCaseCategory->id);

        $dbComplexCaseCategory = $dbComplexCaseCategory->toArray();
        $this->assertModelData($complexCaseCategory->toArray(), $dbComplexCaseCategory);
    }

    /**
     * @test update
     */
    public function test_update_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->create();
        $fakeComplexCaseCategory = factory(ComplexCaseCategory::class)->make()->toArray();

        $updatedComplexCaseCategory = $this->complexCaseCategoryRepo->update($fakeComplexCaseCategory, $complexCaseCategory->id);

        $this->assertModelData($fakeComplexCaseCategory, $updatedComplexCaseCategory->toArray());
        $dbComplexCaseCategory = $this->complexCaseCategoryRepo->find($complexCaseCategory->id);
        $this->assertModelData($fakeComplexCaseCategory, $dbComplexCaseCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_complex_case_category()
    {
        $complexCaseCategory = factory(ComplexCaseCategory::class)->create();

        $resp = $this->complexCaseCategoryRepo->delete($complexCaseCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(ComplexCaseCategory::find($complexCaseCategory->id), 'ComplexCaseCategory should not exist in DB');
    }
}
