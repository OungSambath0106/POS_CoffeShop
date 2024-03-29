<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_param = [];

        $customers = Customer::when($request->has('search'), function($query) use ($request){
            $key = explode(' ', $request['search']);
            $query->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('customername', 'like', "%{$value}%")
                        ->orWhere('id', 'like', "%{$value}%");
                }
            });
        })->get();

        $query_param = $request->has('search') ? ['search' => $request['search']] : [];

        return view('customer.index', compact('customers', 'query_param'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.front_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customers = new Customer();
        $customers->ishidden = $request->ishidden;
        $customers->customername = $request->customername;
        $customers->companyname = $request->companyname;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->address = $request->address;

        $customers->save();
        // return redirect()->route('customer.index');
        return to_route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customers = Customer::findOrFail($id);
        return view('customer.front_details', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::findOrFail($id);
        return view('customer.front_update', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customers = Customer::find($id);
        $customers->ishidden = $customers ? 1 : 0;
        $customers->customername = $request->customername;
        $customers->companyname = $request->companyname;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->address = $request->address;

        $customers->save();
        return redirect()->route('customer.index');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $customers = Customer::find($id);
            if (!$customers) {
                return redirect()->route('customer.index')->with('error', 'Customer not found.');
            }

            $customers->delete();

            return redirect()->route('customer.index')->with('success', 'Customer has been deleted successfully.');
        }catch (\Exception $e) {
            return redirect()->route('customer.index')->with('error', 'Error deleting the Customer. Please try again!');
        }
    }
}
