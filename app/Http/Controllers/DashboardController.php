<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCompanies = Company::count(); 
        $totalEmployees = Employee::count();
        $companiesWithEmployees = Company::has('employees')->count();
        $companiesWithoutEmployees = Company::doesntHave('employees')->count();

        return view('dashboard', compact(
            'totalCompanies',
            'totalEmployees',
            'companiesWithEmployees',
            'companiesWithoutEmployees'
        ));
    }
}