<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'date_event',
        'gallery_id',
        'description',
        'image',
        'status'
    ];


    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
