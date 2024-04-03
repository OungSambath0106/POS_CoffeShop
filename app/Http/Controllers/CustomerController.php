<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function hidding_cus(Request $request)
    {
        $query_param = [];

        $customers = Customer::when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            $query->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('customername', 'like', "%{$value}%")
                        ->orWhere('id', 'like', "%{$value}%");
                }
            });
        })->get();

        $query_param = $request->has('search') ? ['search' => $request['search']] : [];

        return view('customer.front_hidden', compact('customers', 'query_param'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_param = [];

        $customers = Customer::when($request->has('search'), function ($query) use ($request) {
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
        // Validate the incoming request data
        $request->validate([
            'customername' => 'required',
            'companyname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // If validation passes, create a new Customer instance and save it
        $customers = new Customer();
        $customers->ishidden = $customers == 'on' ? 1 : 0;
        // Check if the 'ishidden' checkbox is checked in the request
        $customers->ishidden = $request->has('ishidden');
        $customers->customername = $request->customername;
        $customers->companyname = $request->companyname;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->address = $request->address;

        $customers->save();

        // Redirect to the index page
        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
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
        $request->validate([
            'customername' => 'required',
            'companyname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $customers = Customer::find($id);
        $customers->ishidden = $customers == 'on' ? 1 : 0;
        // Check if the 'ishidden' checkbox is checked in the request
        $customers->ishidden = $request->has('ishidden');
        $customers->customername = $request->customername;
        $customers->companyname = $request->companyname;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->address = $request->address;


        $customers->save();

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
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
        } catch (\Exception $e) {
            return redirect()->route('customer.index')->with('error', 'Error deleting the Customer. Please try again!');
        }
    }
}
