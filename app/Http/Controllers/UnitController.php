<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::with('parent')->get();
        return view('unit.index', compact('units'));
    }

    public function create()
    {
        $parents = Unit::whereNull('parent_id')->get();
        return view('unit.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'type'      => 'required|string|max:100',
            'parent_id' => 'nullable|integer|exists:units,id',
        ]);

        Unit::create($request->only('name', 'type', 'parent_id'));

        return redirect()->route('units.index')->with('success', 'Unit berhasil ditambahkan.');
    }

    public function show(Unit $unit)
    {
        $unit->load('parent', 'children', 'users');
        return view('unit.show', compact('unit'));
    }

    public function edit(Unit $unit)
    {
        $parents = Unit::whereNull('parent_id')->where('id', '!=', $unit->id)->get();
        return view('unit.edit', compact('unit', 'parents'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'type'      => 'required|string|max:100',
            'parent_id' => 'nullable|integer|exists:units,id',
        ]);

        $unit->update($request->only('name', 'type', 'parent_id'));

        return redirect()->route('units.index')->with('success', 'Unit berhasil diperbarui.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('units.index')->with('success', 'Unit berhasil dihapus.');
    }
}
