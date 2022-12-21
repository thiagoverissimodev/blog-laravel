<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Repositories\Contracts\GalleryRepositoryInterface;
use App\Repositories\BaseRepository;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    protected $model;

    public function __construct(Gallery $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}