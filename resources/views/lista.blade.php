<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Pessoas cadastradas") }}
                </div>
                <table class="p-6 text-gray-900 dark:text-gray-100">
                    <thead>
                    <th> nome</th>
                    <th> CPF</th>
                    <th> RG</th>
                    <th> Nascimento</th>
                    <th> Sexo</th>
                    </thead>
                    <tbody>
                    @foreach($userRegisters as $userR)
                        <tr>
                            <td>{{ $userR->nome }}</td>
                            <td>{{ $userR->cpf }}</td>
                            <td>{{ $userR->rg }}</td>
                            <td>{{ $userR->nascimento }}</td>
                            <td>{{ $userR->sexo }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
