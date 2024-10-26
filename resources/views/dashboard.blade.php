@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                <div class="bg-white shadow-sm sm:rounded-lg flex items-center justify-center">
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-semibold">Total Companies</h2>
                        <p class="text-3xl mt-4">{{ $totalCompanies }}</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg flex items-center justify-center">
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-semibold">Total Employees</h2>
                        <p class="text-3xl mt-4">{{ $totalEmployees }}</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg flex items-center justify-center">
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-semibold">Companies with Employees</h2>
                        <p class="text-3xl mt-4">{{ $companiesWithEmployees }}</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg flex items-center justify-center">
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-semibold">Companies without Employees</h2>
                        <p class="text-3xl mt-4">{{ $companiesWithoutEmployees }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
