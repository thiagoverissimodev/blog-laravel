<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'url',
        'priority',
        'section_id',
        'status'
    ];

    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
