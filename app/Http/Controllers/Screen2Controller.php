<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Screen2Controller extends Controller
{
    public function index(Request $request)
    {

        return Inertia::render('screen-2');
    }

    public function search(Request $request)
    {
        if (!$request->has('query')) {
            return $response['results'] = [];
        }

        try {
            $query = $request->input('query');
            $response['results'] = [];

            $response = Http::withHeaders([
                'Authorization' => 'Client-ID ' . env('UNSPLASH_ACCESS_KEY'),
            ])->acceptJson()->timeout(10)->retry(3, 100)->withOptions([
            ])->get('https://api.unsplash.com/search/photos', [
                'query' => $query,
                'per_page' => 10
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch data from Unsplash.'], 500);
        }

        return response()->json($response->json());
    }
}
