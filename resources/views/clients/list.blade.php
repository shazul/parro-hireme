@extends('layouts.base')

@section('title', 'Clients')

@section('content')
<div class="relative overflow-x-auto">
    <div class="py-4 text-left">
        <a role="button"
        href="{{ route('clients.create') }}"
        class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">New Client</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Birth Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Education Level
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $client->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $client->birth_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $client->education_level }}
                </td>
                <td class="px-6 py-4">
                    {{ $client->position?->role ?? 'Unemployed' }}
                </td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2 text-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
