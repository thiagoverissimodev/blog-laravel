<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parent',
        'name',
        'slug',
        'priority',
        'image_cover',
        'image_content',
        'description',
        'menu',
        'status',
        'type',
        'url'
    ];

    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }

    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
