<?php 

namespace App\Repositories;

use App\Models\Content;
use App\Repositories\Contracts\ContentRepositoryInterface;
use App\Repositories\BaseRepository;

class ContentRepository extends BaseRepository implements ContentRepositoryInterface
{
    protected $model;

    public function __construct(Content $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}