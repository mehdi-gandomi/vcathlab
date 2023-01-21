<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\User\Models\NIFFRCase;

class NIFFRCaseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/n_i_f_f_r_cases', $nIFFRCase
        );

        $this->assertApiResponse($nIFFRCase);
    }

    /**
     * @test
     */
    public function test_read_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/n_i_f_f_r_cases/'.$nIFFRCase->id
        );

        $this->assertApiResponse($nIFFRCase->toArray());
    }

    /**
     * @test
     */
    public function test_update_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->create();
        $editedNIFFRCase = factory(NIFFRCase::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/n_i_f_f_r_cases/'.$nIFFRCase->id,
            $editedNIFFRCase
        );

        $this->assertApiResponse($editedNIFFRCase);
    }

    /**
     * @test
     */
    public function test_delete_n_i_f_f_r_case()
    {
        $nIFFRCase = factory(NIFFRCase::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/n_i_f_f_r_cases/'.$nIFFRCase->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/n_i_f_f_r_cases/'.$nIFFRCase->id
        );

        $this->response->assertStatus(404);
    }
}
