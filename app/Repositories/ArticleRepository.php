<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    protected $model;

    public function __construct(Article $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}