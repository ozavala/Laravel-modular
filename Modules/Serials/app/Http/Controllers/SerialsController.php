<?php

namespace Modules\Serials\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Serials\Models\Serial;

class SerialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serials = Serial::all();
        return view('serials::index', compact('serials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('serials::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'serial' => 'string',
            'notes' => 'string'
            ]);
        
        Serial::create([
            'name' => $request->input('name'),
            'serial' => $request->input('serial'),
            'notes' => $request->input('notes'),
            ]);

        flash('Serial added')->success();
        return redirect()->route('app.serials.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('serials::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $serial = Serial::findOrFail($id);   
        return view('serials::edit', compact('serial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
            ]);

        Serial::findOrFail($id)->update([
            'name' => $request->input('name'),
            'serial' => $request->input('serial'),
            'notes' => $request->input('notes'),
            ]);

        flash('Serial updated')->success();
        
        return redirect(route('app.serials.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Serial::findOrFail($id)->delete();
        return redirect(route('app.serials.index'));
    }
}
