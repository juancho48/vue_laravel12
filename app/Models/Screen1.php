<?php

namespace App\Models;

use Database\Factories\Screen1Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Screen1 extends Model
{
    use HasFactory;

    protected $table = 'screen1';
    
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return Screen1Factory::new();
    }
}
