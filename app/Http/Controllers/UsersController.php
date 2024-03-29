<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_param = [];

        $users = User::when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            $query->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%")
                        ->orWhere('id', 'like', "%{$value}%");
                }
            });
        })->get();

        $query_param = $request->has('search') ? ['search' => $request['search']] : [];

        return view('users.index', compact('users', 'query_param'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.front_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->has('password') && $request->password !== null) {
            // Hash the password before storing it
            $users->password = bcrypt($request->password);
        }
        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.front_details', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.front_update', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->has('password') && $request->password !== null) {
            // Hash the password before storing it
            $users->password = bcrypt($request->password);
        }
        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $users = User::find($id);
            if (!$users) {
                return redirect()->route('product.index')->with('error', 'Product not found.');
            }

            $users->delete();

            return redirect()->route('product.index')->with('success', 'Product has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('product.index')->with('error', 'Error deleting the Product. Please try again.');
        }
    }
}
