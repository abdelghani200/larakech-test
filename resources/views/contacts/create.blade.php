<div class="container mx-auto px-4 py-4 bg-white" style="max-width: 600px; max-height: 600px">
    <div class="grid gap-4">
        <h2 class="text-2xl font-bold">Détail du contact</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="duplicate-contact-form" method="POST" action="{{ route('contacts.store') }}">
            @csrf

            <input type="hidden" name="nom" value="{{ old('nom') }}">
            <input type="hidden" name="prenom" value="{{ old('prenom') }}">
            <input type="hidden" name="company[nom]" value="{{ old('company.nom') }}">
            <input type="hidden" name="company[code_postal]" value="{{ old('company.code_postal') }}">
            <input type="hidden" name="company[adresse]" value="{{ old('company.adresse') }}">
            <input type="hidden" name="company[ville]" value="{{ old('company.ville') }}">
            <input type="hidden" name="company[statut]" value="{{ old('company.statut') }}">

            <div class="flex space-x-4 mb-2">
                <div class="flex flex-col w-1/2">
                    <label for="prenom" class="text-gray-700 mb-2">Prénom</label>
                    <input type="text" id="prenom" name="prenom"
                        class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div class="flex flex-col w-1/2">
                    <label for="nom" class="text-gray-700 mb-2">Nom</label>
                    <input type="text" id="nom" name="nom"
                        class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <div class="flex flex-col mb-2">
                <label for="email" class="text-gray-700 mb-2">E-mail</label>
                <input type="email" id="email" name="e_mail"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="flex flex-col mb-2">
                <label for="entreprise" class="text-gray-700 mb-2">Entreprise</label>
                <input type="text" id="entreprise" name="company[nom]"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="flex flex-col mb-2">
                <label for="adresse" class="text-gray-700 mb-2">Adresse</label>
                <input type="text" id="adresse" name="company[adresse]"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="flex space-x-4 mb-2">
                <div class="flex flex-col w-1/2">
                    <label for="code_postal" class="text-gray-700 mb-2">Code postal</label>
                    <input type="text" id="code_postal" name="company[code_postal]"
                        class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex flex-col w-1/2">
                    <label for="ville" class="text-gray-700 mb-2">Ville</label>
                    <input type="text" id="ville" name="company[ville]"
                        class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <div class="flex flex-col mb-2">
                <label for="status" class="text-gray-700 mb-2">Status</label>
                <input type="text" id="status" name="company[statut]"
                    class="border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="bg-green-100 flex justify-end p-2 -mx-16 -mb-4">
                <button type="button"
                    class="border border-gray-300 rounded-md bg-white-500 text-black py-2 px-4 rounded mr-2"
                    onclick="closeCreateModal()">Annuler</button>
                <button type="submit" class="border border-gray-300 rounded-md bg-teal-400 text-white py-2 px-4 rounded"
                    style="margin-right:67px;">Valider</button>
            </div>
        </form>
    </div>
</div>