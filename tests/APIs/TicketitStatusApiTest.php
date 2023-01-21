<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\Test\Models\TicketitStatus;

class TicketitStatusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ticketit_statuses', $ticketitStatus
        );

        $this->assertApiResponse($ticketitStatus);
    }

    /**
     * @test
     */
    public function test_read_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/ticketit_statuses/'.$ticketitStatus->id
        );

        $this->assertApiResponse($ticketitStatus->toArray());
    }

    /**
     * @test
     */
    public function test_update_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->create();
        $editedTicketitStatus = factory(TicketitStatus::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ticketit_statuses/'.$ticketitStatus->id,
            $editedTicketitStatus
        );

        $this->assertApiResponse($editedTicketitStatus);
    }

    /**
     * @test
     */
    public function test_delete_ticketit_status()
    {
        $ticketitStatus = factory(TicketitStatus::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ticketit_statuses/'.$ticketitStatus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ticketit_statuses/'.$ticketitStatus->id
        );

        $this->response->assertStatus(404);
    }
}
