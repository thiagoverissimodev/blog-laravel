<?php 

namespace App\Repositories;

use App\Models\Image;
use App\Repositories\Contracts\ImageRepositoryInterface;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    protected $model;

    public function __construct(Image $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}