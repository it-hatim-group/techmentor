<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentee extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'goals',
        'profession',
        'terms_accepted',
    ];

    protected function casts(): array
    {
        return [
            'terms_accepted' => 'boolean',
        ];
    }
}
