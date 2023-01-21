<?php namespace Tests\Repositories;

use Modules\User\Models\BodyComposition;
use Modules\User\Repositories\BodyCompositionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BodyCompositionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BodyCompositionRepository
     */
    protected $bodyCompositionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bodyCompositionRepo = \App::make(BodyCompositionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->make()->toArray();

        $createdBodyComposition = $this->bodyCompositionRepo->create($bodyComposition);

        $createdBodyComposition = $createdBodyComposition->toArray();
        $this->assertArrayHasKey('id', $createdBodyComposition);
        $this->assertNotNull($createdBodyComposition['id'], 'Created BodyComposition must have id specified');
        $this->assertNotNull(BodyComposition::find($createdBodyComposition['id']), 'BodyComposition with given id must be in DB');
        $this->assertModelData($bodyComposition, $createdBodyComposition);
    }

    /**
     * @test read
     */
    public function test_read_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->create();

        $dbBodyComposition = $this->bodyCompositionRepo->find($bodyComposition->id);

        $dbBodyComposition = $dbBodyComposition->toArray();
        $this->assertModelData($bodyComposition->toArray(), $dbBodyComposition);
    }

    /**
     * @test update
     */
    public function test_update_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->create();
        $fakeBodyComposition = factory(BodyComposition::class)->make()->toArray();

        $updatedBodyComposition = $this->bodyCompositionRepo->update($fakeBodyComposition, $bodyComposition->id);

        $this->assertModelData($fakeBodyComposition, $updatedBodyComposition->toArray());
        $dbBodyComposition = $this->bodyCompositionRepo->find($bodyComposition->id);
        $this->assertModelData($fakeBodyComposition, $dbBodyComposition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_body_composition()
    {
        $bodyComposition = factory(BodyComposition::class)->create();

        $resp = $this->bodyCompositionRepo->delete($bodyComposition->id);

        $this->assertTrue($resp);
        $this->assertNull(BodyComposition::find($bodyComposition->id), 'BodyComposition should not exist in DB');
    }
}
