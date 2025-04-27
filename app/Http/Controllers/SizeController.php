<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.size.index',['sizes'=>Size::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Size::saveSize($request);
        return back()->with('success','Size Has Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit',['size'=>$size]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        Size::updateSize($request, $size->id);
        return back()->with('success','Your Size is Succsessfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        Size::deleteSize($size->id);
        return back()->with('delete','Your Size is deleted');
    }
}
