<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Http\Requests\CreateContactRequest;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $contacts = $this->contactService->getAllContacts($search);

        return view('contacts.index', compact('contacts', 'search'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(CreateContactRequest $request)
    {
        $result = $this->contactService->createContact($request);

        if (isset($result['error'])) {
            return redirect()->back()->withInput()->withErrors(['duplicate_contact' => $result['error']]);
        }

        return redirect()->route('contacts.index')->with('success', $result['success']);
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
        $result = $this->contactService->updateContact($request, $contact);

        return redirect()->route('contacts.index')->with('success', $result['success']);
    }

    public function destroy(Contact $contact)
    {
        $result = $this->contactService->deleteContact($contact);

        return redirect()->route('contacts.index')->with('success', $result['success']);
    }
}
