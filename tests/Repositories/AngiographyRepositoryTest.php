<?php namespace Tests\Repositories;

use Modules\User\Models\Angiography;
use Modules\User\Repositories\AngiographyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AngiographyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AngiographyRepository
     */
    protected $angiographyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->angiographyRepo = \App::make(AngiographyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_angiography()
    {
        $angiography = factory(Angiography::class)->make()->toArray();

        $createdAngiography = $this->angiographyRepo->create($angiography);

        $createdAngiography = $createdAngiography->toArray();
        $this->assertArrayHasKey('id', $createdAngiography);
        $this->assertNotNull($createdAngiography['id'], 'Created Angiography must have id specified');
        $this->assertNotNull(Angiography::find($createdAngiography['id']), 'Angiography with given id must be in DB');
        $this->assertModelData($angiography, $createdAngiography);
    }

    /**
     * @test read
     */
    public function test_read_angiography()
    {
        $angiography = factory(Angiography::class)->create();

        $dbAngiography = $this->angiographyRepo->find($angiography->id);

        $dbAngiography = $dbAngiography->toArray();
        $this->assertModelData($angiography->toArray(), $dbAngiography);
    }

    /**
     * @test update
     */
    public function test_update_angiography()
    {
        $angiography = factory(Angiography::class)->create();
        $fakeAngiography = factory(Angiography::class)->make()->toArray();

        $updatedAngiography = $this->angiographyRepo->update($fakeAngiography, $angiography->id);

        $this->assertModelData($fakeAngiography, $updatedAngiography->toArray());
        $dbAngiography = $this->angiographyRepo->find($angiography->id);
        $this->assertModelData($fakeAngiography, $dbAngiography->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_angiography()
    {
        $angiography = factory(Angiography::class)->create();

        $resp = $this->angiographyRepo->delete($angiography->id);

        $this->assertTrue($resp);
        $this->assertNull(Angiography::find($angiography->id), 'Angiography should not exist in DB');
    }
}
