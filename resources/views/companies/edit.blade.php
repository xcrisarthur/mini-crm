@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="m-3">Edit Company</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}">
        </div>

        <div class="form-group mb-3">
            <label for="logo">Logo (min 100x100px):</label>
            <input type="file" name="logo" class="form-control">
            @if($company->logo)
                <p>Current Logo:</p>
                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="100">
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="website">Website:</label>
            <input type="url" name="website" class="form-control" value="{{ old('website', $company->website) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
