@extends('layouts.base')

@section('title', 'Companies')

@section('content')
<div class="relative overflow-x-auto">
    <div class="py-4 text-left">
        <a role="button"
        href="{{ route('companies.create') }}"
        class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">New Company</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Company
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Available positions
                </th>
                <th scope="col" class="px-6 py-3">
                    Budget
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $company->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $company->address }}
                </td>
                <td class="px-6 py-4">
                    {{ $company->available_positions }}
                </td>
                <td class="px-6 py-4">
                    {{ $company->budget_display }}
                </td>
                <td class="px-6 py-4">
                    <a role="button"
                        href="{{ route('companies.show', ['company' => $company->id]) }}"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
