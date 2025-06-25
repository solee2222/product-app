@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-10 p-8 bg-white rounded-2xl shadow-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b pb-2">
        {{ __('products.list') }}
    </h1>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6 text-right">
        <a href="{{ route('products.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-lg transition duration-300">
            + {{ __('products.create') }}
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-100 text-left text-gray-600 uppercase text-sm tracking-wider">
                <tr>
                    <th class="px-6 py-4">{{ __('products.name') }}</th>
                    <th class="px-6 py-4">{{ __('products.price') }}</th>
                    <th class="px-6 py-4">{{ __('products.description') }}</th>
                    <th class="px-6 py-4">{{ __('products.category') }}</th>
                    <th class="px-6 py-4">{{ __('products.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-700">
                @foreach($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                        <td class="px-6 py-4">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4">{{ $product->description }}</td>
                        <td class="px-6 py-4">{{ $product->category->name }}</td>
                        <td class="px-6 py-4 flex space-x-4">
                            <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                                {{ __('products.edit') }}
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('{{ __('products.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                    {{ __('products.delete') }}
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
