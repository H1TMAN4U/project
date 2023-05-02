@extends('access.master')
@section('content')
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Attribute
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Old Value
                    </th>
                    <th scope="col" class="px-6 py-3">
                        New Value
                    </th>
                </tr>
            </thead>
              <tbody>
                @foreach ($attribute_changes as $attribute => $values)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ ucfirst(str_replace('_', ' ', $attribute)) }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $values['old'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $values['new'] }}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
