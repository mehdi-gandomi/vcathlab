<?php namespace Tests\Repositories;

use Modules\Test\Models\TicketitStatus;
use Modules\Test\Repositories\TicketitStatusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TicketitStatusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TicketitStatusRepository
     */
    protected $ticketitStatusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ticketitStatusRepo = \App::make(TicketitStatusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->make()->toArray();

        $createdTicketitStatus = $this->ticketitStatusRepo->create($ticketitStatus);

        $createdTicketitStatus = $createdTicketitStatus->toArray();
        $this->assertArrayHasKey('id', $createdTicketitStatus);
        $this->assertNotNull($createdTicketitStatus['id'], 'Created TicketitStatus must have id specified');
        $this->assertNotNull(TicketitStatus::find($createdTicketitStatus['id']), 'TicketitStatus with given id must be in DB');
        $this->assertModelData($ticketitStatus, $createdTicketitStatus);
    }

    /**
     * @test read
     */
    public function test_read_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->create();

        $dbTicketitStatus = $this->ticketitStatusRepo->find($ticketitStatus->id);

        $dbTicketitStatus = $dbTicketitStatus->toArray();
        $this->assertModelData($ticketitStatus->toArray(), $dbTicketitStatus);
    }

    /**
     * @test update
     */
    public function test_update_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->create();
        $fakeTicketitStatus = factory(TicketitStatus::class)->make()->toArray();

        $updatedTicketitStatus = $this->ticketitStatusRepo->update($fakeTicketitStatus, $ticketitStatus->id);

        $this->assertModelData($fakeTicketitStatus, $updatedTicketitStatus->toArray());
        $dbTicketitStatus = $this->ticketitStatusRepo->find($ticketitStatus->id);
        $this->assertModelData($fakeTicketitStatus, $dbTicketitStatus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->create();

        $resp = $this->ticketitStatusRepo->delete($ticketitStatus->id);

        $this->assertTrue($resp);
        $this->assertNull(TicketitStatus::find($ticketitStatus->id), 'TicketitStatus should not exist in DB');
    }
}
