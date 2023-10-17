<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // Menampilkan Data dari DB Customers
    public function index()
    {
        $customers = DB::table('customers')
            ->select('nama', 'umur', 'alamat', 'jk')
            // ->where('nama', 'Jono')
            // ->orderByDesc('id')
            ->get();
        return $customers;
    }

    // Menambah Data DB Customers
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'jk' => $request->jk
        ];

        DB::table('customers')->insert($data);

        return response()
            ->json(['pesan' => 'Data berhasil Ditambah!'], 201);
    }

    // Mengubah Data DB Customers
    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
            'umur' => $request->umur
        ];

        DB::table('customers')
            ->where('id', $id)
            ->update($data);

        return response()
            ->json(['pesan' => 'Data berhasil Diupdate!'], 200);
    }

    // Menghapus Data DB Customers
    public function delete($id)
    {
        DB::table('customers')
            ->where('id', $id)
            ->delete();

        return response()
            ->json(['pesan' => 'Data Berhasil Dihapus!'], 200);
    }
}
