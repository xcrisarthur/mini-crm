@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="m-3">Employee Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            <p class="card-text"><strong>Company:</strong> {{ $employee->company->name ?? 'N/A' }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $employee->phone }}</p>
        </div>
    </div>

    <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
