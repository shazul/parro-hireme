@extends('layouts.base')

@section('title', 'New Client')

@section('content')
    <div class="py-4">
        <form method="POST" action="{{ route('clients.store') }}">
            @csrf
            <div class="mb-6">
                <label for="client_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="client_name" name="client_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('client_name')}}">
            </div>
            <div class="mb-6">
                <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth date</label>
                <input type="text" id="birth_date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('birth_date') }}" placeholder="yyyy-mm-dd">
            </div>
            <div class="mb-6">
                <label for="education_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Education level</label>
                <select id="education_level" name="education_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="High school" {{ old('education_level') == 'High school' ? "selected" : "" }}>High school</option>
                    <option value="Bachelor" {{ old('education_level') == 'Bachelor' ? "selected" : "" }}>Bachelor</option>
                    <option value="Master's Degree" {{ old('education_level') == 'Master\'s Degree' ? "selected" : "" }}>Master's Degree</option>
                </select>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
