@extends('layouts.base')

@section('title', 'New Position')

@section('content')
    <div class="py-4">
        <form method="POST" action="{{ route('positions.store') }}">
            @csrf
            <div class="mb-6">
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a company</label>
                <select id="company" name="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option>Select one</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company') == $company->id ? "selected" : "" }}>{{ $company->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <input type="text" id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('role')}}">
            </div>
            <div class="mb-6">
                <label for="years_exp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Years of experience required</label>
                <input type="number" id="years_exp" name="years_exp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('years_exp') }}" >
            </div>
            <div class="mb-6">
                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary</label>
                <input type="number" id="salary" name="salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('salary') }}" >
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
