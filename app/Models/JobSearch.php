<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSearch extends Model
{
    use HasFactory;

    protected $table = "job_searches";

    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image_path'
    ];
}
