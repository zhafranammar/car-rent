<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

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

        $car = $query->paginate(10);
        return view('car.index', compact('car'));
    }

    // Create
    public function create()
    {
        return view('car.create');
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

        Car::create($data);

        return redirect()->route('car.index')->with('success', 'Car added successfully!');
    }

    // Edit
    public function edit(Car $car)
    {
        return view('car.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'police_number' => 'required|string',
            'color' => 'required|string',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => ['required', Rule::in(["available", "rent", "service"])],
        ]);

        $car->update($data);

        return redirect()->route('car.index')->with('success', 'Car updated successfully!');
    }

    // Show
    public function show(Car $car)
    {
        return view('car.show', compact('car'));
    }

    //Delete
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('car.index')->with('success', 'Car deleted successfully!');
    }
}
