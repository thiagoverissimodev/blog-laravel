<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'link',
        'image',
        'description',
        'status',
        'like',
        'comment',
        'reading_time'
    ];

    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }
}
