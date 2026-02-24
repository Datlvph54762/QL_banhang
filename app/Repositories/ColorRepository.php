<?php

namespace App\Repositories;
use App\Models\Color;

class ColorRepository
{
    public function getAll()
    {
        return Color::all();
    }
}
