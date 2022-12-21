<?php 

namespace App\Services;

use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Services\Contracts\ImageServiceInterface;

class ImageService extends BaseService implements ImageServiceInterface
{
    protected $imageServiceRepository;

    public function __construct(ImageRepositoryInterface $imageServiceRepository)
    {
        parent::__construct($imageServiceRepository);

        $this->imageServiceRepository = $imageServiceRepository;
    }
}