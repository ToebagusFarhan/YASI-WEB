<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllInfomations()
    {
        $data = Informations::orderBy('city_name', 'asc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data provider beserta kualitasnya',
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function getInfomation($id)
    {
        $data = Informations::find($id);

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Detail user',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data user tidak ditemukan!',
                'data' => ''
            ], 404);
        }
    }

    public function store(Request $request)
    {
        // $input = $request->all();

        $validateData = $request->validate([
            'user_id' => 'nullable',
            'provider_name' => 'nullable|string',
            'city_name' => 'nullable|string',
            'address' => 'nullable|string',
            'date' => 'nullable|date',
            'time' => 'nullable|time',
            'signal_stability' => 'nullable|string',
            'user_rating' => 'nullable|integer',
            'comments' => 'nullable|string',
        ]);

        $validateData['created_at'] = Carbon::now()->timezone('Asia/Jakarta');
        $validateData['updated_at'] = Carbon::now()->timezone('Asia/Jakarta');

        $data = Informations::create($validateData);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 200);
    }

    // public function updateInformation(Request $request, $id)
    // {

    //     $validateData = $request->validate([
    //         "produk" => "required",
    //         "harga" => "required|numeric",

    //     ]);

    //     $product = Informations::find($id);

    //     if ($product) {
    //         $product->update($validateData);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data produk berhasil diupdate',
    //             'data' => $product
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data produk tidak ditemukan!',
    //             'data' => ''
    //         ], 404);
    //     }
    // }

    public function destroy($id)
    {
        $data = Informations::find($id);

        if ($data) {
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
                'data' => ''
            ], 404);
        }
    }

}
