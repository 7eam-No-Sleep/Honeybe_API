<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenAIController extends Controller
{
    public function parseCSV(Request $request)
    {
        // Get CSV data from request
        $csvData = $request->input('csvData');

        // Prepare request to OpenAI API
        $client = new Client([
            'base_uri' => 'https://api.openai.com',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer YOUR_OPENAI_API_KEY', // Replace with your OpenAI API key
            ],
        ]);

        // Send request to OpenAI API
        try {
            $response = $client->post('/v1/completions', [
                'json' => [
                    'model' => 'your_openai_model_id', // Replace with your OpenAI model ID
                    'prompt' => $csvData,
                    'max_tokens' => 150,
                ],
            ]);

            // Decode response JSON
            $responseData = json_decode($response->getBody(), true);

            // Return parsed data
            return response()->json($responseData);
        } catch (\Exception $e) {
            // Handle API request errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
