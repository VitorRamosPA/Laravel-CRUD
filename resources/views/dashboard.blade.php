<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                Cadastro
                            </div>
                            <div class="m-10">
                                <form method="POST" action="{{ url('store-form') }}">
                                    @csrf

                                    <div class="mt-8">
                                        <x-text-input id="nome" class="block mt-1 w-full " type="text" name="nome"
                                                      :value="old('nome')" required autofocus autocomplete="nome" placeholder="Seu Nome"/>
                                        <x-input-error :messages="$errors->get('nome')" class="mt-2"/>
                                    </div>

                                    <div class="mt-8">
                                        <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')"
                                                      required autofocus autocomplete="cpf" placeholder="CPF 999.999.999-99 (com pontuação)"/>
                                        <x-input-error :messages="$errors->get('cpf')" class="mt-2"/>
                                    </div>

                                    <div class="mt-8">
                                        <x-text-input id="rg" class="block mt-1 w-full" type="text" name="rg" :value="old('rg')"
                                                      required autocomplete="rg" placeholder="RG 9.999.999 (com pontuação)"/>
                                        <x-input-error :messages="$errors->get('rg')" class="mt-2"/>
                                    </div>

                                    <div class="mt-8">
                                        <x-input-label for="nascimento" :value="__('Nascimento')"/>
                                        <x-text-input id="nascimento" class="block mt-1 w-full" type="date" name="nascimento"
                                                      :value="old('nascimento')" required autofocus autocomplete="nascimento"/>
                                        <x-input-error :messages="$errors->get('nascimento')" class="mt-2"/>
                                    </div>

                                    <div class="mt-16">
                                        <x-input-label for="sexo" :value="__('Sexo')"/>
                                        <select id="sexo" class="block mt-1 w-full" type="" name="sexo"
                                                :value="old('sexo')" required autofocus autocomplete="sexo">
                                            <option value="">--</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('sexo')" class="mt-2"/>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">

                                        <x-primary-button class="ml-4">
                                            {{ __('Register') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
