<?php

namespace App\Repositories;

use App\Models\Section;
use App\Repositories\Contracts\SectionRepositoryInterface;
use App\Repositories\BaseRepository;

class SectionRepository extends BaseRepository implements SectionRepositoryInterface
{
    protected $model;

    public function __construct(Section $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}