<div class="container mx-auto px-4 py-4 bg-white" style="max-width: 600px; max-height: 600px">
    <div class="grid">
        <h2 class="text-2xl font-bold">Détail du contact</h2>

        @if ($errors->any())
            <div class="alert alert-danger text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex space-x-4 mb-2">
            <div class="flex flex-col w-1/2">
                <label for="prenom" class="text-gray-700 mb-2">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{ $contact->prenom }}"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    readonly>
            </div>

            <div class="flex flex-col w-1/2">
                <label for="nom" class="text-gray-700 mb-2">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ $contact->nom }}"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    readonly>
            </div>
        </div>

        <div class="flex flex-col mb-2">
            <label for="email" class="text-gray-700 mb-2">E-mail</label>
            <input type="email" id="email" name="email" value="{{ $contact->e_mail }}"
                class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                readonly>
        </div>

        <div class="flex flex-col mb-2">
            <label for="telephone_fixe" class="text-gray-700 mb-2">Entreprise</label>
            <input type="text" id="telephone_fixe" name="telephone_fixe" value="{{ $contact->telephone_fixe }}"
                class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                readonly>
        </div>

        <div class="flex flex-col mb-2">
            <label for="company_adresse" class="text-gray-700 mb-2">Adresse</label>
            <input type="text" id="company_adresse" name="company_adresse" value="{{ $contact->company->adresse }}"
                class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                readonly>
        </div>

        <div class="flex space-x-4 mb-2">
            <div class="flex flex-col w-1/2">
                <label for="company_code_postal" class="text-gray-700 mb-2">Code Postal</label>
                <input type="text" id="company_code_postal" name="company_code_postal"
                    value="{{ $contact->company->code_postal }}"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    readonly>
            </div>

            <div class="flex flex-col w-1/2">
                <label for="company_ville" class="text-gray-700 mb-2">Ville</label>
                <input type="text" id="company_ville" name="company_ville" value="{{ $contact->company->ville }}"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    readonly>
            </div>
        </div>

        <div class="flex flex-col mb-2 w-1/2">
            <label for="company_statut" class="text-gray-700 mb-2">Statut</label>
            <input type="text" id="company_statut" name="company_statut" value="{{ $contact->company->statut }}"
                class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                readonly>
        </div>

        <div class="bg-green-100 flex justify-end p-2 -mx-16 -mb-4">
            <button type="button"
                class="border border-gray-300 rounded-md bg-white-500 text-black py-2 px-4 rounded mr-2"
                onclick="closeModal()">Annuler</button>
        </div>
    </div>
</div>