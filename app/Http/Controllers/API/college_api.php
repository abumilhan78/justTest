<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use Validator;

class college_api extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = College::latest()->get();
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
            'city_id' => 'required',
            'college_name' => 'required'
        ],
        [
            'city_id.required' => 'Mohon Masukan Kota',
            'college_name.required' => 'Mohon Masukan Nama Kampus'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'silakan isi form yang kosong'
            ], 400);
        }else {
            $coll = College::create([
                'city_id' => $request->city_id,
                'college_name' => $request->college_name,
            ]);

            if ($coll) {
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
        $coll = College::whereId($id)->first();

        if ($coll) {
            return response()->json([
                'success' => true,
                'data' => $coll,
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
            'city_id' => 'required',
            'college_name' => 'required'
        ],[
            'city_id.required' => 'Mohon Masukan Kota',
            'college_name.required' => 'Mohon Masukan Nama Kampus'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'silakan isi form yang kosong'
            ], 400);
        }else {
            $coll = College::whereId($id)->update([
                'city_id' => $request->city_id,
                'college_name' => $request->college_name
            ]);

            if ($coll) {
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
        $coll = College::whereId($id)->first();

        $coll->delete();
        return response()->json([
            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
