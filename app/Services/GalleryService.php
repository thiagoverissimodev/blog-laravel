<?php

namespace App\Services;

use App\Repositories\Contracts\GalleryRepositoryInterface;
use App\Services\Contracts\GalleryServiceInterface;

class GalleryService extends BaseService implements GalleryServiceInterface
{
    protected $galleryServiceRepository;

    public function __construct(GalleryRepositoryInterface $galleryServiceRepository)
    {
        parent::__construct($galleryServiceRepository);

        $this->galleryServiceRepository = $galleryServiceRepository;
    }
}