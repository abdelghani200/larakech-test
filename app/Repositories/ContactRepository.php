<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    public function all($search = null, $perPage = 8)
    {
        $query = Contact::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'LIKE', "%{$search}%")
                    ->orWhere('prenom', 'LIKE', "%{$search}%")
                    ->orWhereHas('company', function ($q) use ($search) {
                        $q->where('nom', 'LIKE', "%{$search}%");
                    });
            });
        }

        return $query->paginate($perPage);
    }



    public function find($id)
    {
        return Contact::find($id);
    }

    public function findByName($nom, $prenom, $companyName = null)
    {
        $query = Contact::where('nom', $nom)
            ->where('prenom', $prenom);

        if ($companyName) {
            $query->whereHas('company', function ($q) use ($companyName) {
                $q->where('nom', $companyName);
            });
        }

        return $query->first();
    }


    public function create(array $data)
    {
        return Contact::create($data);
    }

    public function update(Contact $contact, array $data)
    {
        $contact->update($data);
        return $contact;
    }

    public function delete(Contact $contact)
    {
        $contact->delete();
    }
}
