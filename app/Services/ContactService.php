<?php

namespace App\Services;

use App\Http\Requests\CreateContactRequest;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Repositories\Interfaces\CompanyRepositoryInterface;

class ContactService
{
    protected $contactRepository;
    protected $companyRepository;

    public function __construct(ContactRepositoryInterface $contactRepository, CompanyRepositoryInterface $companyRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->companyRepository = $companyRepository;
    }

    public function getAllContacts($search)
    {
        return $this->contactRepository->all($search);
    }

    public function createContact(CreateContactRequest $request)
    {
        $existingContact = $this->contactRepository->findByName(
            $request->input('nom'),
            $request->input('prenom'),
            $request->input('company.nom')
        );

        if ($existingContact && !$request->has('confirmation')) {
            return ['error' => 'Ce contact existe déjà.'];
        }

        $existingCompany = $this->companyRepository->findByName($request->input('company.nom'));

        if ($existingCompany && !$request->has('confirmation')) {
            return ['error' => 'Cette entreprise existe déjà.'];
        }

        $company = $this->companyRepository->create($request->input('company'));

        $contact = $this->contactRepository->create(array_merge($request->validated(), ['company_id' => $company->id]));

        return ['success' => 'Contact créé avec succès.'];
    }


    public function updateContact($request, $contact)
    {
        $this->contactRepository->update($contact, $request->except('company'));

        if ($contact->company) {
            $contact->company->update($request->input('company'));
        }

        return ['success' => 'Contact et entreprise mis à jour avec succès.'];
    }

    public function deleteContact($contact)
    {
        $this->contactRepository->delete($contact);
        return ['success' => 'Contact supprimé avec succès.'];
    }
}
