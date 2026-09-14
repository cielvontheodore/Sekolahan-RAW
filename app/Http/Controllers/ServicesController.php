<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::latest()->paginate(10);
        return view("servicedir.index", compact("services"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("servicedir.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' =>  'required|string|max:255',
            'description' =>  'required|string|max:255',
        ]);

        Services::create($validate);
        return redirect()->route("admin-services.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        return view("servicedir.edit", compact("services"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $services)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $services->update($validated);
        return redirect()->route("admin-services.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        $services->delete();
        return redirect()->route("admin-services.index");
    }
}
