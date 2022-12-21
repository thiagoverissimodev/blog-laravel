<?php 

namespace App\Services;

use App\Repositories\Contracts\VideoRepositoryInterface;
use App\Services\Contracts\VideoServiceInterface;

class VideoService extends BaseService implements VideoServiceInterface
{
    protected $videoServiceRepository;

    public function __construct(VideoRepositoryInterface $videoServiceRepository)
    {
        parent::__construct($videoServiceRepository);

        $this->videoServiceRepository = $videoServiceRepository;
    }
}