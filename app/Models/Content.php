<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'date_publication',
        'name',
        'slug',
        'section_id',
        'priority',
        'site_fold',
        'type',
        'title_cover',
        'complement',
        'image_cover',
        'image_content',
        'author',
        'link',
        'description',
        'embed',
        'status'
    ];

    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
