<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Cadastro") }}
                </div>
                <form method="POST" action="{{ url('store-form') }}">
                    @csrf

                    <!-- Nome -->
                    <div>
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
                        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>

                    <!-- CPF -->
                    <div>
                        <x-input-label for="cpf" :value="__('CPF')" />
                        <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
                        <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="rg" :value="__('RG')" />
                        <x-text-input id="rg" class="block mt-1 w-full" type="text" name="rg" :value="old('rg')" required autocomplete="rg" />
                        <x-input-error :messages="$errors->get('rg')" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="nascimento" :value="__('Nascimento')" />
                        <x-text-input id="nascimento" class="block mt-1 w-full" type="date" name="nascimento" :value="old('nascimento')" required autofocus autocomplete="nascimento" />
                        <x-input-error :messages="$errors->get('nascimento')" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="sexo" :value="__('Sexo')" />
                        <x-text-input id="sexo" class="block mt-1 w-full" type="text" name="sexo" :value="old('sexo')" required autofocus autocomplete="sexo" />
                        <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
