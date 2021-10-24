<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
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
        return view('admin.inputoutlet');
    }

    public function addoutlet(Request $request)
    {
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

    public function deleteoutlet($id)
    {
        DB::table('outlets')->where('id', $id)->delete();
        return redirect('admin/outlet');
    }
}
