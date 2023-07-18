<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::all();
        return view('points.index', compact('points'));
    }

    public function create()
    {
        return view('points.create');
    }

    public function store(Request $request)
    {
        $point = Point::create($request->all());
        return redirect()->route('points.index');
    }

    public function show(Point $point)
    {
        return view('points.show', compact('point'));
    }

    public function edit(Point $point)
    {
        return view('points.edit', compact('point'));
    }

    public function update(Request $request, Point $point)
    {
        $point->update($request->all());
        return redirect()->route('points.index');
    }

    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->route('points.index');
    }
}