<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'expertise',
        'experience',
        'terms_accepted',
    ];

    protected function casts(): array
    {
        return [
            'terms_accepted' => 'boolean',
        ];
    }
}
