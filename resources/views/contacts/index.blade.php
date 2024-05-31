<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <style>
        * {
            font-family: 'Arial', sans-serif
        }

        .form-input {
            height: 24px;
            line-height: 24px;
            font-family: 'Arial', sans-serif;
        }

        label {
            font-size: 14px;
        }

        button {
            font-size: 16px;
        }

        .swal2-title.custom-title {
            display: flex;
        }

        .swal2-title.custom-title span {
            margin-right: 291px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold my-8">Liste des Contacts</h1>
        <div class="flex justify-between mb-4">

            <form action="{{ route('contacts.index') }}" method="GET" class="flex">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Rechercher..."
                    class="border rounded py-2 px-4" style="width:25rem">
            </form>

            <div>
                <button class="border border-gray-300 bg-blue-300 rounded-md text-white py-2 px-4 create-modal-trigger">
                    <i class="fas fa-plus mr-2"></i> Ajouter
                </button>
            </div>

        </div>

        @include('delete')
        @include('confirmDuplicate')


        <script>
            var duplicateContactError = @json($errors->has('duplicate_contact'));
            var duplicateContactMessage = @json($errors->first('duplicate_contact'));
        </script>

        <form id="duplicate-contact-form" action="{{ route('contacts.store') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="nom" value="{{ old('nom') }}">
            <input type="hidden" name="prenom" value="{{ old('prenom') }}">
            <input type="hidden" name="e_mail" value="{{ old('e_mail') }}">
            <input type="hidden" name="company[nom]" value="{{ old('company.nom') }}">
            <input type="hidden" name="company[code_postal]" value="{{ old('company.code_postal') }}">
            <input type="hidden" name="company[adresse]" value="{{ old('company.adresse') }}">
            <input type="hidden" name="company[ville]" value="{{ old('company.ville') }}">
            <input type="hidden" name="company[statut]" value="{{ old('company.statut') }}">
            <input type="hidden" name="confirmation" value="1">
        </form>



        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-green-100 text-left">NOM DU CONTACT</th>
                        <th class="py-2 px-4 bg-green-100 text-left">SOCIETE</th>
                        <th class="py-2 px-4 bg-green-100 text-left">STATUT</th>
                        <th class="py-2 px-4 bg-green-100 text-left"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $contact->nom }} {{ $contact->prenom }}</td>
                            <td class="py-2 px-4">{{ $contact->company->nom }}</td>
                            <td class="py-2 px-4">
                                <span
                                    class="inline-block py-1 px-3 rounded-full
                                                                                                                    @if($contact->company->statut == 'Lead') bg-blue-200 
                                                                                                                    @elseif($contact->company->statut == 'Client') bg-green-200
                                                                                                                    @elseif($contact->company->statut == 'Prospect') bg-red-200 
                                                                                                                    @endif
                                                                                                                    rounded">
                                    {{ $contact->company->statut }}
                                </span>
                            </td>
                            <td class="py-2 px-4 flex space-x-2">
                                <a href="#" class="text-gray-500 show-modal-trigger" data-id="{{ $contact->id }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="text-gray-500 edit-modal-trigger" data-id="{{ $contact->id }}">
                                    <i class="fas fa-pencil-alt ml-1"></i>
                                </a>
                                <button type="button" class="text-red-500" onclick="confirmDelete({{ $contact->id }})">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                                <form id="delete-form-{{ $contact->id }}"
                                    action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $contacts->links('') }}
            </div>
        </div>
    </div>


    <div id="edit-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-1/2">
            <div id="edit-modal-body">

            </div>

        </div>
    </div>


    <div id="show-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-1/2">
            <div id="show-modal-body">

            </div>

        </div>
    </div>


    <div id="create-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-1/2">
            <div id="create-modal-body">

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/index.js') }}"></script>

</body>

</html>