<?php namespace Tests\Repositories;

use Modules\User\Models\Echo;
use Modules\User\Repositories\EchoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EchoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EchoRepository
     */
    protected $echoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->echoRepo = \App::make(EchoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_echo()
    {
        $echo = factory(Echo::class)->make()->toArray();

        $createdEcho = $this->echoRepo->create($echo);

        $createdEcho = $createdEcho->toArray();
        $this->assertArrayHasKey('id', $createdEcho);
        $this->assertNotNull($createdEcho['id'], 'Created Echo must have id specified');
        $this->assertNotNull(Echo::find($createdEcho['id']), 'Echo with given id must be in DB');
        $this->assertModelData($echo, $createdEcho);
    }

    /**
     * @test read
     */
    public function test_read_echo()
    {
        $echo = factory(Echo::class)->create();

        $dbEcho = $this->echoRepo->find($echo->id);

        $dbEcho = $dbEcho->toArray();
        $this->assertModelData($echo->toArray(), $dbEcho);
    }

    /**
     * @test update
     */
    public function test_update_echo()
    {
        $echo = factory(Echo::class)->create();
        $fakeEcho = factory(Echo::class)->make()->toArray();

        $updatedEcho = $this->echoRepo->update($fakeEcho, $echo->id);

        $this->assertModelData($fakeEcho, $updatedEcho->toArray());
        $dbEcho = $this->echoRepo->find($echo->id);
        $this->assertModelData($fakeEcho, $dbEcho->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_echo()
    {
        $echo = factory(Echo::class)->create();

        $resp = $this->echoRepo->delete($echo->id);

        $this->assertTrue($resp);
        $this->assertNull(Echo::find($echo->id), 'Echo should not exist in DB');
    }
}
