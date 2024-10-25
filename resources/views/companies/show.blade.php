@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Company Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>
            <p class="card-text"><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            <p class="card-text">
                <strong>Logo:</strong><br>
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="100">
                @else
                    No Logo
                @endif
            </p>
        </div>
    </div>

    <h2 class="mt-4">Employees</h2>
    @if($company->employees->isEmpty())
        <p>No employees found for this company.</p>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($company->employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
