<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function index()
    {
        $standards = Standard::withCount('indicators')->get();
        return view('standard.index', compact('standards'));
    }

    public function create()
    {
        return view('standard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'        => 'required|string|max:50|unique:standards,code',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Standard::create($request->only('code', 'name', 'description'));

        return redirect()->route('standards.index')->with('success', 'Standar berhasil ditambahkan.');
    }

    public function show(Standard $standard)
    {
        $standard->load('indicators');
        return view('standard.show', compact('standard'));
    }

    public function edit(Standard $standard)
    {
        return view('standard.edit', compact('standard'));
    }

    public function update(Request $request, Standard $standard)
    {
        $request->validate([
            'code'        => 'required|string|max:50|unique:standards,code,' . $standard->id,
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $standard->update($request->only('code', 'name', 'description'));

        return redirect()->route('standards.index')->with('success', 'Standar berhasil diperbarui.');
    }

    public function destroy(Standard $standard)
    {
        $standard->delete();
        return redirect()->route('standards.index')->with('success', 'Standar berhasil dihapus.');
    }
}
