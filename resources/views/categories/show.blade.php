@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('categories.show') }}: {{ $category->name }}</h1>
    <div class="mb-3">
        <strong>{{ __('categories.name') }}:</strong> {{ $category->name }}
    </div>
    <div class="mb-3">
        <strong>{{ __('categories.description') }}:</strong> {{ $category->description }}</div>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
        {{ __('categories.back') }}
    </a>
</div>
@endsection
