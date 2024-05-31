<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function findByName($name)
    {
        return Company::where('nom', $name)->first();
    }

    public function create(array $data)
    {
        return Company::create($data);
    }
}
