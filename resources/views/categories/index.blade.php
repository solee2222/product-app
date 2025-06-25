@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('categories.index_title') }}</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        {{ __('categories.create') }}
    </a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('categories.name') }}</th>
                <th>{{ __('categories.description') }}</th>
                <th>{{ __('categories.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info">
                        {{ __('categories.show') }}
                    </a>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-secondary">
                        {{ __('categories.edit') }}
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            {{ __('categories.delete') }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection