<?php 

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\VideoRepositoryInterface;

class VideoRepository extends BaseRepository implements VideoRepositoryInterface
{
    protected $model;

    public function __construct(Video $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}