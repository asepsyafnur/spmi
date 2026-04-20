<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::orderByDesc('year')->orderByDesc('semester')->get();
        return view('period.index', compact('periods'));
    }

    public function create()
    {
        return view('period.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'year'       => 'required|digits:4|integer|min:2000|max:2100',
            'semester'   => 'nullable|in:Ganjil,Genap',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'is_active'  => 'required|boolean',
        ]);

        if ($request->is_active) {
            Period::where('is_active', true)->update(['is_active' => false]);
        }

        Period::create($request->only('name', 'year', 'semester', 'start_date', 'end_date', 'is_active'));

        return redirect()->route('periods.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    public function show(Period $period)
    {
        return view('period.show', compact('period'));
    }

    public function edit(Period $period)
    {
        return view('period.edit', compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'year'       => 'required|digits:4|integer|min:2000|max:2100',
            'semester'   => 'nullable|in:Ganjil,Genap',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'is_active'  => 'required|boolean',
        ]);

        if ($request->is_active) {
            Period::where('is_active', true)->where('id', '!=', $period->id)->update(['is_active' => false]);
        }

        $period->update($request->only('name', 'year', 'semester', 'start_date', 'end_date', 'is_active'));

        return redirect()->route('periods.index')->with('success', 'Periode berhasil diperbarui.');
    }

    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('periods.index')->with('success', 'Periode berhasil dihapus.');
    }
}
