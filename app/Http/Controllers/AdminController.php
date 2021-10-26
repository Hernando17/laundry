<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function outlet()
    {
        $this->authorize('admin');
        $data = [
            'outlet' => Outlet::all(),
        ];
        return view('admin.outlet', $data);
    }

    public function inputoutlet()
    {
        $this->authorize('admin');
        return view('admin.inputoutlet');
    }

    public function addoutlet(Request $request)
    {
        $this->authorize('admin');
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
            ]
        );

        $data = Outlet::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
        ]);

        return redirect('admin/outlet');
    }

    public function editoutlet(Outlet $id)
    {
        $this->authorize('admin');

        return view('admin.editoutlet', ['out' => $id]);
    }

    public function editoutletact(Request $request, Outlet $id)
    {
        $this->authorize('admin');

        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
            ]
        );

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];

        Outlet::where('id', $id->id)->update($data);

        return redirect('admin/outlet');
    }

    public function deleteoutlet($id)
    {
        $this->authorize('admin');
        Outlet::where('id', $id)->delete();
        return redirect('admin/outlet');
    }

    public function produk()
    {
        $this->authorize('admin');
        $data = [
            'produk' => Produk::all(),
        ];

        return view('admin.produk', $data);
    }

    public function inputproduk()
    {
        $this->authorize('admin');
        $data = [
            'outlet' => Outlet::all(),
        ];

        return view('admin.inputproduk', $data);
    }

    public function addproduk(Request $request)
    {
        $this->authorize('admin');
        $request->validate(
            [
                'id_outlet' => 'required',
                'jenis' => 'required',
                'nama_paket' => 'required',
                'harga' => 'required',
            ]
        );

        $data = Produk::create([
            'id_outlet' => $request->input('id_outlet'),
            'jenis' => $request->input('jenis'),
            'nama_paket' => $request->input('nama_paket'),
            'harga' => $request->input('harga'),
        ]);

        return redirect('admin/produk');
    }

    public function deleteproduk($id)
    {
        $this->authorize('admin');
        Produk::where('id', $id)->delete();
        return redirect('admin/produk');
    }

    public function editproduk(Produk $id)
    {
        $data = [
            'outlet' => Outlet::all(),
            'produk' => $id,
        ];

        return view('admin.editproduk', $data);
    }

    public function editprodukact(Request $request, Produk $id)
    {
        $this->authorize('admin');

        $request->validate(
            [
                'id_outlet' => 'required',
                'jenis' => 'required',
                'nama_paket' => 'required',
                'harga' => 'required',
            ]
        );

        $data = [
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
        ];

        Produk::where('id', $id->id)->update($data);

        return redirect('admin/produk');
    }

    public function pengguna()
    {
        $data = [
            'pengguna' => User::all(),
        ];

        return view('admin.pengguna', $data);
    }

    public function  deletepengguna($id)
    {
        $this->authorize('admin');
        User::where('id', $id)->delete();
        return redirect('admin/pengguna');
    }

    public function editpengguna(User $id)
    {
        $this->authorize('admin');

        $data = [
            'outlet' => Outlet::all(),
            'pengguna' => $id,
        ];

        return view('admin.editpengguna', $data);
    }

    public function editpenggunaact(Request $request, User $id)
    {
        $this->authorize('admin');

        $request->validate(
            [
                'username' => 'required',
                'nama' => 'required',
                'id_outlet' => 'required',
                'role' => 'required',
            ]
        );

        $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'id_outlet' => $request->id_outlet,
            'role' => $request->role,
        ];

        User::where('id', $id->id)->update($data);

        return redirect('admin/pengguna');
    }

    public function gantipasswordpengguna(Request $request, User $id)
    {
        $this->authorize('admin');

        $request->validate(
            [
                'password' => 'required',
            ]
        );

        $data = [
            'password' => $request->password,
        ];

        $data['password'] = Hash::make($data['password']);

        User::where('id', $id->id)->update($data);

        return redirect('admin/pengguna');
    }
}
