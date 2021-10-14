<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\City;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::all();
        return view('college.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('college.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'college_name' => 'required'
        ]);
        College::create($request->all());
        return redirect()->route('college.index')->with(['message'=>'Data Berhasil DiTambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        $cities = City::all();
        return view('college.edit', compact('cities', 'college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, College $college)
    {
        College::where('id', $college->id)
            ->update([
                'city_id' => $request->city_id,
                'college_name' => $request->college_name
            ]);
        return redirect()->route('college.index')->with(['message'=>'Data Berhasil DiUbah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        College::destroy($college->id);
        return redirect()->route('college.index')->with(['message'=>'Data Berhasil DiHapus']);
    }
}
