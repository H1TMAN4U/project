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


                @foreach ($changeData as $change)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td>{{ $change['id'] }}</td>
                        <td>{{ $change['old_name'] }}</td>
                        <td>{{ $change['new_name'] }}</td>
                        <td>{{ $change['user_name'] }}</td>
                        <td>{{ $change['updated_at'] }}</td>
                    </tr>
                @endforeach





            </tbody>
        </table>
    </div>
@endsection
