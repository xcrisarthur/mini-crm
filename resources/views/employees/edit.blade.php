@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="m-3">Edit Employee</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="company_id">Company:</label>
            <select name="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
        </div>

        <div class="form-group mb-3">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
