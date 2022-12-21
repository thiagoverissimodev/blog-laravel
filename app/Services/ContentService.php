<?php 

namespace App\Services;

use App\Repositories\Contracts\ContentRepositoryInterface;
use App\Services\Contracts\ContentServiceInterface;

class ContentService extends BaseService implements ContentServiceInterface
{
    protected $contentRepository;

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        parent::__construct($contentRepository);

        $this->ContentRepository = $contentRepository;
    }
}