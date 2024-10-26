<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('employees')->paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        if (Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized.');
        }
        return view('companies.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'name' => 'required|string|unique:companies',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
        ]);

        $logoPath = $request->file('logo') ? $request->file('logo')->store('logos', 'public') : null;

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
            'website' => $request->website
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    public function show(Company $company)
    {
        $company->load('employees');
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        if (Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized.');
        }

        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        if (Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'name' => 'required|string|unique:companies,name,' . $company->id,
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
        ]);

        if ($request->file('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = $company->logo;
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
            'website' => $request->website
        ]);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    public function destroy(Company $company)
    {
        if (Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized.');
        }
        
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
