<?php

namespace App\Http\Controllers;

use App\Models\Screen1 as One;
use Inertia\Inertia;
use Illuminate\Http\Request;

class Screen1Controller extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('search') === '') {
            $simples = One::limit(20)->get();
        } else {
            $search = $request->input('search');
            $simples = One::when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('id', 'like', '%' . $search . '%')
                          ->orWhere('title', 'like', '%' . $search . '%')
                          ->orWhere('notes', 'like', '%' . $search . '%');
                });
            })->get();
        }

        return Inertia::render('screen-1', [
            'simples' => $simples->toArray()
        ]);
    }
}
