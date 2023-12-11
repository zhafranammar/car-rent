<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Search logic
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('police_number', 'like', $searchTerm)->orWhere('color', 'like', $searchTerm)->orWhere('price', 'like', $searchTerm)->orWhere('year', 'like', $searchTerm);
        }

        // Sort logic
        if ($request->has('sort')) {
            $direction = $request->has('direction') ? $request->direction : 'desc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest(); // Default sorting
        }

        $user = $query->paginate(10);
        return view('user.index', compact('user'));
    }

    // Create
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'police_number' => 'required|string',
            'color' => 'required|string',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => ['required', Rule::in(["available", "rent", "service"])],
        ]);

        User::create($data);

        return redirect()->route('user.index')->with('success', 'User added successfully!');
    }

    // Edit
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'police_number' => 'required|string',
            'color' => 'required|string',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => ['required', Rule::in(["available", "rent", "service"])],
        ]);

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    // Show
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    //Delete
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
