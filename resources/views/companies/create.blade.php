@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="m-3">Add New Company</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group mb-3">
            <label for="logo">Logo (min 100x100px):</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="website">Website:</label>
            <input type="url" name="website" class="form-control" value="{{ old('website') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
