<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareSetting extends Model
{
    use HasFactory;

    protected $table = 'software_settings';

    protected $fillable = [
        'company_name',
        'software_title',
        'about_us',
        'logo',
        'favicon',
        'favicon_title',
        'copyright_text',
    ];
}
