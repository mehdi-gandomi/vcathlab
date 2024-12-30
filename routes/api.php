<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/chatgpt",function(){
    $apiKey = env('OPENAI_API_KEY');
    $apiUrl = 'https://api.openai.com/v1/chat/completions';

    try {
        // Make the API request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post($apiUrl, [
            'model' => 'gpt-4', // Specify the model
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => "hello"],
            ],
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            $reply = $response->json('choices.0.message.content');

            return response()->json([
                'success' => true,
                'reply' => $reply,
            ]);
        }

        // Handle API error response
        return response()->json([
            'success' => false,
            'error' => $response->json(),
        ], $response->status());
    } catch (\Exception $e) {
        // Handle unexpected errors
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
});
