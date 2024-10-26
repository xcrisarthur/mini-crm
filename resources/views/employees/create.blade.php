@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="m-3">Add New Employee</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="company_id">Company:</label>
            <select name="company_id" class="form-control">
                <option value="">Select a company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group mb-3">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
