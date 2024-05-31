<?php

namespace App\Repositories\Interfaces;

use App\Models\Company;

interface CompanyRepositoryInterface
{
    public function findByName($name);
    public function create(array $data);
}
