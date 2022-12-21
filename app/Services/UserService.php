<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\BaseService;

class UserService extends BaseService implements UserServiceInterface
{
    protected $userServiceRepository;

    public function __construct(UserRepositoryInterface $userServiceRepository)
    {
        parent::__construct($userServiceRepository);
        
        $this->userServiceRepository = $userServiceRepository;
    }
}