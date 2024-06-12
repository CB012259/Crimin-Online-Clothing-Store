<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\http\Response;
use Illuminate\View\View;

class AdminAdd extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $Admins = users::all();
        return view ('users.index')->with('Admins', $Admins);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
