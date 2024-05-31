<?php

namespace App\Repositories\Interfaces;

use App\Models\Contact;

interface ContactRepositoryInterface
{
    public function all($search);
    public function find($id);
    public function findByName($nom, $prenom, $companyName = null);
    public function update(Contact $contact, array $data);
    public function delete(Contact $contact);
}
