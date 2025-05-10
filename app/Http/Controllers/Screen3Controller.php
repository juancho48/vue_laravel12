<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Screen3Controller extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('screen-3');
    }

    public function grid() {
        // Return a random 3x3 grid: red/blue
        $colors = ['red', 'blue'];
        $grid = [];
        for ($i = 0; $i < 3; $i++) {
            $row = [];
            for ($j = 0; $j < 3; $j++) {
                $row[] = $colors[array_rand($colors)];
            }
            $grid[] = $row;
        }
        return response()->json($grid);
    }

    public function click(Request $request) {
        $grid = $request->input('grid');
        $row = $request->input('row');
        $col = $request->input('col');

        $targetColor = $grid[$row][$col];
        $newColor = $targetColor === 'blue' ? 'red' : 'blue';

        // Toggle the clicked square
        $grid[$row][$col] = $newColor;

        // Define adjacent positions (up/down/left/right)
        $directions = [
            [-1, 0], [1, 0], [0, -1], [0, 1],
        ];

        foreach ($directions as [$dr, $dc]) {
            $r = $row + $dr;
            $c = $col + $dc;

            if ($r >= 0 && $r < 3 && $c >= 0 && $c < 3) {
                if ($grid[$r][$c] === $targetColor) {
                    $grid[$r][$c] = $newColor;
                }
            }
        }

        return response()->json($grid);
    }

    public function reset() {
        // Return a random 3x3 grid: red/blue
        $colors = ['red', 'blue'];
        $grid = [];
        for ($i = 0; $i < 3; $i++) {
            $row = [];
            for ($j = 0; $j < 3; $j++) {
                $row[] = $colors[array_rand($colors)];
            }
            $grid[] = $row;
        }
        return response()->json($grid);
    }
}