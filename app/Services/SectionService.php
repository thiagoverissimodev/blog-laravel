<?php

namespace App\Services;

use App\Repositories\Contracts\SectionRepositoryInterface;
use App\Services\Contracts\SectionServiceInterface;

class SectionService extends BaseService implements SectionServiceInterface
{
    protected $sectionServiceRepository;

    public function __construct(SectionRepositoryInterface $sectionServiceRepository)
    {
        parent::__construct($sectionServiceRepository);

        $this->sectionServiceRepository = $sectionServiceRepository;
    }
}