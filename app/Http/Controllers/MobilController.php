<?php

namespace App\Http\Controllers;

use App\Mobil;
use Auth;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    // public function mobil() {
    //     $data = "Data All Mobil";
    //     return response()->json($data, 200);
    // }

    // public function mobilAuth() {
    //     $data = "Welcome " . Auth::user()->username;
    //     return response()->json($data, 200);
    // }

    public function index(){
        $data = Mobil::all();
        return response($data);
    }
    public function show($id){
        $data = Mobil::where('id',$id)->get();
        return response ($data);
    }
    public function store(Request $request){
        try {
            $data = new Mobil();
            $data->nama_mobil = $request->input('nama_mobil');
            $data->merk = $request->input('merk');
            $data->bahan_bakar = $request->input('bahan_bakar');
            $data->plat_nomer = $request->input('plat_nomer');
            $data->warna = $request->input('warna');
            $data->save();
            return response()->json([
                'status' => '1',
                'message' => 'Tambah Data Mobil Berhasil Gaes'
            ]);
        } catch(\Exceptions $e){
            return response()->json([
                'status' => '0',
                'message'=> 'Tambah Data Mobil Gagal Bosque'
            ]);
        }
    }

    public function update(Request $request, $id){
        try{
            $data = Mobil::where('id',$id)->first();
            $data->nama_mobil = $request->input('nama_mobil');
            $data->merk = $request->input('merk');
            $data->bahan_bakar = $request->input('bahan_bakar');
            $data->plat_nomer = $request->input('plat_nomer');
            $data->warna = $request->input('warna');
            $data->save();

            return response()->json([
                'status' => '1',
                'message' => 'Ubah Data Mobil Berhasil Bosque'
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => 'Ubah Data Mobil Gagal Gaes'
            ]);
        }
    }

    public function destroy($id){
        try{
            $data = Mobil::where('id',$id)->first();
            $data->delete();

            return response()->json([
                'status' => '1',
                'message'=> 'Hapus Data Mobil Berhasil Bosque ASSIQUEEE'
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => 'Hapus Data Mobil Gagal Gaes!! Coba Teliti ya......'
           ]);
        }
    }
}
