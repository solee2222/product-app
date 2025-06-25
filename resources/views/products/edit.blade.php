@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 bg-white shadow-md rounded p-6">
    <h1 class="text-2xl font-bold mb-6">{{ __('products.edit') }}</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-800 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">{{ __('products.name') }}</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium text-gray-700">{{ __('products.price') }}</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-gray-700">{{ __('products.description') }}</label>
            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded p-2">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="category_id" class="block font-medium text-gray-700">{{ __('products.category') }}</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                <option value="">{{ __('products.select_category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                {{ __('products.submit') }}
            </button>
            <a href="{{ route('products.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                {{ __('products.cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection