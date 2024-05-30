<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contacts = Contact::with('company')
            ->where('nom', 'like', "%{$search}%")
            ->orWhere('prenom', 'like', "%{$search}%")
            ->orWhere('e_mail', 'like', "%{$search}%")
            ->paginate(8);

        return view('contacts.index', compact('contacts', 'search'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(CreateContactRequest $request)
    {
        try {
            $existingContact = Contact::where('nom', $request->input('nom'))
                ->where('prenom', $request->input('prenom'))
                ->first();

            

            if ($existingContact) {
                return redirect()->back()->withInput()->withErrors(['duplicate_contact' => 'Ce contact existe déjà.']);
            }

            $existingCompany = Company::where('nom', $request->input('company.nom'))->first();

            if ($existingCompany) {
                throw new \Exception('Cette entreprise existe déjà.');
            }

            $company = Company::create($request->input('company'));

            $contact = Contact::create($request->validated());
            $contact->company()->associate($company);
            $contact->save();

            return redirect()->route('contacts.index')->with('success', 'Contact créé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Contact $contact)
    {
        $contact->load('company');
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        try {
            $contactData = $request->except('company');
            $companyData = $request->input('company');

            $contact->update($contactData);

            if ($contact->company) {
                $contact->company->update($companyData);
            }

            return redirect()->route('contacts.index')->with('success', 'Contact et entreprise mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
