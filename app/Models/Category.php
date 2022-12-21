<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'type_media',
        'description',
        'image',
        'status'
    ];

    public function type_media()
    {
        return array(1 => 'Image', 2 => 'Video', 3 => 'Documento');
    }

    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }
}
