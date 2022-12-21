<?php 

namespace App\Services;

use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Services\Contracts\ArticleServiceInterface;

class ArticleService extends BaseService implements ArticleServiceInterface
{
    protected $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        parent::__construct($articleRepository);

        $this->articleRepository = $articleRepository;
    }
}