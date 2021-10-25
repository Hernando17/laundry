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

    public function editoutlet()
    {
        $this->authorize('admin');

        $data = [
            'id' => Outlet::all(),
        ];

        return view('admin.editoutlet', $data);
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
}
