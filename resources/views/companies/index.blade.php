@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>Company List</h1>
        
        @if(Auth::check() && Auth::user()->role->name === 'admin')
            <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Employees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50">
                        @else
                            No Logo
                        @endif
                    </td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->employees_count }}</td>
                    <td>
                        <a href="{{ route('companies.show', $company) }}" class="btn btn-info btn-sm">View</a>

                        @if(Auth::check() && Auth::user()->role->name === 'admin')
                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}
</div>
@endsection
