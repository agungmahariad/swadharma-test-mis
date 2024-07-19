<?php

namespace Tests\Feature;

use App\Models\{LOBModel, LOBSecondModel};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testSendDataToRepository()
    {
        // create data LOB KUR & PEN
        LOBModel::factory()->count(5)->create(['lob' => 'KUR']);
        LOBModel::factory()->count(5)->create(['lob' => 'PEN']);

        // mock API response
        Http::fake([
            'http://localhost:8000/api/send-data-to-repository' => Http::response(['status' => 'success'], 200),
        ]);

        // call endpoint for send data
        $response = $this->get('/api/send-data-to-repository');

        // check respons
        $response->assertStatus(200)->assertJson(['message' => 'Berhasil menambah data']);

        // check if log has recorded
        $this->assertDatabaseHas('record_data_activity', [
            'amount_data' => 10,
            'send_status' => true,
        ], 'mysql2');
    }

    public function testSendDataToRepositoryWithAlreadySendedAll()
    {
        // mock API response with failure for half of the requests
        Http::fake([
            'http://localhost:8000/api/send-data-to-repository' => Http::response(['status' => 'success'], 200),
        ]);

        // call endpoint to send data
        $response = $this->get('/api/send-data-to-repository');

        // check respons
        $response->assertStatus(200)->assertJson(['message' => 'Tidak ada data yang bisa dikirim']);

        // check if log has recorded
        $this->assertDatabaseMissing('record_data_activity', [
            'send_status' => false,
        ], 'mysql2');
    }
}
