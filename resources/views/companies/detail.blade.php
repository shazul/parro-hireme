@extends('layouts.base')

@section('title', 'Company')

@section('content')
<div class="relative overflow-x-auto">
    <div>
        <div class="px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $company->name }}</h3>
        </div>
        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Address</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-3 sm:mt-0">{{ $company->address }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Zip code</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-3 sm:mt-0">{{ $company->zip_code }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Budget</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-3 sm:mt-0">{{ $company->budget_display }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Available positions</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-3 sm:mt-0">{{ $company->available_positions }}</dd>
              </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Open positions</dt>
              <dd class="mt-2 text-sm text-gray-900 sm:col-span-3 sm:mt-0">
                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                  <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <div class="ml-4 flex-shrink-0">
                        @forelse ($openPositions as $position)
                            @if ($loop->first)
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
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
                                            Hire someone
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                            @endif

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $position->role }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $position->years_exp_req }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $position->salary_display }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form method="POST" action="{{ route('positions.hire', $position->id) }}">
                                            @csrf
                                            <label for="client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a client</label>
                                            <select id="client" name="client" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option>Select one</option>
                                                @foreach ($availableClients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                            </select>
                                            <button type="submit"
                                                class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2">Hire</button>
                                        </form>
                                    </td>
                                </tr>

                            @if ($loop->last)
                            </tbody>
                        </table>
                        @endif
                        @empty
                            <div class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">No open positions</div>
                        @endforelse
                    </div>
                  </li>
                </ul>
              </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Current Employees</dt>
                <dd class="mt-2 text-sm text-gray-900 sm:col-span-3 sm:mt-0">
                  <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                      <div class="ml-4 flex-shrink-0">
                          @forelse ($occupiedPositions as $occupiedPosition)
                              @if ($loop->first)
                              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                      <tr>
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
                                              Who
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                              @endif

                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                          {{ $occupiedPosition->role }}
                                      </th>
                                      <td class="px-6 py-4">
                                          {{ $occupiedPosition->years_exp_req }}
                                      </td>
                                      <td class="px-6 py-4">
                                          {{ $occupiedPosition->salary_display }}
                                      </td>
                                      <td class="px-6 py-4">
                                          {{ $occupiedPosition->client->name }}
                                      </td>
                                  </tr>

                              @if ($loop->last)
                              </tbody>
                          </table>
                          @endif
                          @empty
                              <div class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">No occupied positions</div>
                          @endforelse
                      </div>
                    </li>
                  </ul>
                </dd>
              </div>
          </dl>
        </div>
      </div>
</div>
@endsection
