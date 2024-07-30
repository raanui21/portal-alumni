<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UntirtaKarir extends Model
{
    use HasFactory;

    // Menunjukkan tabel yang digunakan oleh model ini
    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'category',
        'description',
        'image_url',
        'image_path',
        'about_role',
        'offers',
        'contact',
    ];
}