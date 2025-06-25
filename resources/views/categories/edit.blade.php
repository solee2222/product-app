@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">{{ __('categories.edit') }}</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-800 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">{{ __('categories.name') }}</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="mb-6">
            <label for="description" class="block font-medium text-gray-700">{{ __('categories.description') }}</label>
            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded p-2">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                {{ __('categories.submit') }}
            </button>
            <a href="{{ route('categories.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                {{ __('categories.cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection