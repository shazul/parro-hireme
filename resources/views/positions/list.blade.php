@extends('layouts.base')

@section('title', 'Positions')

@section('content')
<div class="relative overflow-x-auto">
    <div class="py-4 text-left">
        <a role="button"
        href="{{ route('positions.create') }}"
        class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">New Position</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Company
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Years of Exp required
                </th>
                <th scope="col" class="px-6 py-3">
                    Salary
                </th>
                <th scope="col" class="px-6 py-3">
                    Employee
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $position->company->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $position->role }}
                </td>
                <td class="px-6 py-4">
                    {{ $position->years_exp_req }}
                </td>
                <td class="px-6 py-4">
                    {{ $position->salary }}
                </td>
                <td class="px-6 py-4">
                    {{ $position->client->name ?? 'Available'}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
