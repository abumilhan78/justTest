<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Validator;

class city_api extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = City::latest()->get();
        $res = [
            'success' => true,
            'data' => $dt,
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'city_name' => 'required'
        ],
        [
            'city_name.required' => 'Mohon Masukan Nama Kota'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'silakan isi form yang kosong'
            ], 400);
        }else {
            $city = City::create([
                'city_name' => $request->city_name,
            ]);

            if ($city) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil disimpan'
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data gagal disimpan'
                ],400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::whereId($id)->first();

        if ($city) {
            return response()->json([
                'success' => true,
                'data' => $city,
                'message' => 'Data ditemukan!'
            ],200);
        }else {
            return response()->json([
                'success' => false,
                'data' => '',
                'message' => 'Data tidak ditemukan!'
            ],400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'city_name' => 'required'
        ],[
            'city_name.required' => 'Mohon Masukan Nama Kota'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'silakan isi form yang kosong'
            ], 400);
        }else {
            $city = City::whereId($id)->update([
                'city_name' => $request->city_name
            ]);

            if ($city) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diubah!'
                ],200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Data gagal diubah!'
                ],400);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::whereId($id)->first();

        $city->delete();
        return response()->json([
            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
