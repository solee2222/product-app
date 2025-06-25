@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 p-8 bg-white rounded-2xl shadow-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b pb-2">
        {{ __('categories.list') }}
    </h1>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6 text-right">
        <a href="{{ route('categories.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-lg transition duration-300">
            + {{ __('categories.create') }}
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-100 text-left text-gray-600 uppercase text-sm tracking-wider">
                <tr>
                    <th class="px-6 py-4">{{ __('categories.name') }}</th>
                    <th class="px-6 py-4">{{ __('categories.description') }}</th>
                    <th class="px-6 py-4">{{ __('categories.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-700">
                @foreach($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium">{{ $category->name }}</td>
                        <td class="px-6 py-4">{{ $category->description }}</td>
                        <td class="px-6 py-4 flex space-x-4">
                            <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                                {{ __('categories.edit') }}
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('{{ __('categories.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                    {{ __('categories.delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
