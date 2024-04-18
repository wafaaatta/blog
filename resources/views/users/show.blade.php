<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT POST') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-header">Détails de l'utilisateur</div>

                    <div class="card-body">
                        <p><strong>Nom :</strong> {{ $user->name }}</p>
                        <p><strong>Email :</strong> {{ $user->email }}</p>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                        
                        <!-- Ajoutez d'autres champs si nécessaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
