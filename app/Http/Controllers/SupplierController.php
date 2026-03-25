<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->query('search');

        $suppliers = Supplier::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%")
                             ->orWhere('phone', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('suppliers.index', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required',
            'address' => 'nullable',
        ], [
            'email.unique' => 'REGISTRY CONFLICT: This email address is already registered in the system.',
            'name.required' => 'DATA MISSING: Supplier Identity name is mandatory.',
            'email.required' => 'DATA MISSING: Official contact email is required.',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'New Partner Enrolled Successfully!');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'required',
            'address' => 'nullable',
        ], [
            'email.unique' => 'UPDATE ERROR: This email is already assigned to another partner.',
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Partner Records Updated!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier Record Archived!');
    }

    public function print()
    {

        $suppliers = \App\Models\Supplier::paginate(10); 

        return view('suppliers.print', compact('suppliers'));
    }
}