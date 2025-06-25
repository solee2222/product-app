@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-12 bg-white shadow-xl rounded-2xl p-8">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 border-b pb-2">
        {{ __('products.create') }}
    </h1>

    @if($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-800 p-4 rounded-lg shadow-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-semibold mb-1">{{ __('products.name') }}</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required>
        </div>

        <div class="mb-6">
            <label for="price" class="block text-gray-700 font-semibold mb-1">{{ __('products.price') }}</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-semibold mb-1">{{ __('products.description') }}</label>
            <textarea name="description" id="description"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-8">
            <label for="category_id" class="block text-gray-700 font-semibold mb-1">{{ __('products.category') }}</label>
            <select name="category_id" id="category_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required>
                <option value="">{{ __('products.select_category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('products.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-5 py-2 rounded-lg transition duration-300">
                {{ __('products.cancel') }}
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg transition duration-300">
                {{ __('products.submit') }}
            </button>
        </div>
    </form>
</div>
@endsection
