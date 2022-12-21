<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'gallery_id',
        'description',
        'image',
        'embed',
        'status'
    ];

    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }
}
