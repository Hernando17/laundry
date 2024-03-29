<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use App\Models\Member;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Laporan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        $request->session()->flash('success', 'Data Outlet berhasil ditambahkan');

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

        $request->session()->flash('success', 'Data Outlet berhasil diubah');

        return redirect('admin/outlet');
    }

    public function deleteoutlet(Request $request, $id)
    {
        $this->authorize('admin');
        Outlet::where('id', $id)->delete();
        $request->session()->flash('success', 'Data Outlet berhasil dihapus');
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

    public function inputproduk(Request $request)
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

        $request->session()->flash('success', 'Data Produk berhasil ditambahkan');

        return redirect('admin/produk');
    }

    public function deleteproduk($id)
    {
        $this->authorize('admin');
        Produk::where('id', $id)->delete();
        return redirect('admin/produk');
    }

    public function editproduk(Request $request, Produk $id)
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

        $request->session()->flash('success', 'Data Produk berhasil diubah');

        return redirect('admin/produk');
    }

    public function pengguna()
    {
        $data = [
            'pengguna' => User::all(),
        ];

        return view('admin.pengguna', $data);
    }

    public function  deletepengguna(Request $request, $id)
    {
        $this->authorize('admin');
        User::where('id', $id)->delete();
        $request->session()->flash('success', 'Data Pengguna berhasil dihapus');
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

        $request->session()->flash('success', 'Data Pengguna berhasil diubah');
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

        $request->session()->flash('success', 'Password pengguna berhasil diganti');

        return redirect('admin/pengguna');
    }

    public function transaksi()
    {
        $this->authorize('admin');

        $data = [
            'transaksi' => Transaksi::all(),
        ];

        return view('admin.transaksi', $data);
    }

    public function inputtransaksi()
    {
        $this->authorize('admin');

        $data = [
            'outlet' => Outlet::all(),
            'user' => User::all(),
            'member' => Member::all(),
        ];

        $invoice = Carbon::now();
        $blnthn = $invoice->month . $invoice->year;
        $kode = Transaksi::count();

        if ($kode == 0) {
            $urut = 1001;
            $nomor = 'KL' . $blnthn . $urut;
        } else {
            $ambil = Transaksi::all()->last();
            $urut = (int)substr($ambil->kode_invoice, -4) + 1;
            $nomor = 'KL' . $blnthn . $urut;
        }

        return view('admin.inputtransaksi', $data, compact('nomor'));
    }

    public function addtransaksi(Request $request)
    {
        $this->authorize('admin');

        $request->validate([
            'id_outlet' => 'required',
            'kode_invoice' => 'required',
            'id_member' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            'status' => 'required',
            'dibayar' => 'required',
            'id_user' => 'required',
        ]);

        $data = Transaksi::create([
            'id_outlet' => $request->input('id_outlet'),
            'kode_invoice' => $request->input('kode_invoice'),
            'id_member' => $request->input('id_member'),
            'tgl' => $request->input('tgl'),
            'batas_waktu' => $request->input('batas_waktu'),
            'tgl_bayar' => $request->input('tgl_bayar'),
            'biaya_tambahan' => $request->input('biaya_tambahan'),
            'diskon' => $request->input('diskon'),
            'pajak' => $request->input('pajak'),
            'status' => $request->input('status'),
            'dibayar' => $request->input('dibayar'),
            'id_user' => $request->input('id_user'),
        ]);

        $request->session()->flash('success', 'Data Transaksi berhasil ditambah');
        return redirect('admin/transaksi');
    }

    public function deletetransaksi(Request $request, $id)
    {
        $this->authorize('admin');
        Transaksi::where('id', $id)->delete();
        $request->session()->flash('success', 'Data Transaksi berhasil dihapus');
        return redirect('admin/transaksi');
    }

    public function edittransaksi(Transaksi $id)
    {
        $data = [
            'transaksi' => $id,
            'outlet' => Outlet::all(),
            'user' => User::all(),
            'member' => Member::all(),
        ];

        return view('admin.edittransaksi', $data);
    }

    public function edittransaksiact(Request $request, Transaksi $id)
    {
        $this->authorize('admin');

        $request->validate([
            'id_outlet' => 'required',
            'kode_invoice' => 'required',
            'id_member' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            'status' => 'required',
            'dibayar' => 'required',
            'id_user' => 'required',
        ]);

        $data = [
            'id_outlet' => $request->id_outlet,
            'kode_invoice' => $request->kode_invoice,
            'id_member' => $request->id_member,
            'tgl' => $request->tgl,
            'batas_waktu' => $request->batas_waktu,
            'tgl_bayar' => $request->tgl_bayar,
            'biaya_tambahan' => $request->biaya_tambahan,
            'diskon' => $request->diskon,
            'pajak' => $request->pajak,
            'status' => $request->status,
            'dibayar' => $request->dibayar,
            'id_user' => $request->id_user,
        ];

        Transaksi::where('id', $id->id)->update($data);

        $request->session()->flash('success', 'Data Transaksi berhasil diubah');
        return redirect('admin/transaksi');
    }

    public function laporan()
    {
        $this->authorize('admin');

        $data = [
            'laporan' => Laporan::all(),
        ];

        return view('admin.laporan', $data);
    }

    public function inputlaporan()
    {
        $this->authorize('admin');

        $data = [
            'transaksi' => Transaksi::all(),
            'produk' => Produk::all(),
        ];

        return view('admin.inputlaporan', $data);
    }

    public function addlaporan(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'id_paket' => 'required',
            'qty' => 'required',
        ]);

        $data = Laporan::create([
            'id_transaksi' => $request->input('id_transaksi'),
            'id_paket' => $request->input('id_paket'),
            'qty' => $request->input('qty'),
            'keterangan' => $request->input('keterangan'),
        ]);

        $request->session()->flash('success', 'Data Laporan berhasil diubah');
        return redirect('admin/laporan');
    }

    public function deletelaporan(Request $request, $id)
    {
        $this->authorize('admin');
        Laporan::where('id', $id)->delete();
        $request->session()->flash('success', 'Data Laporan berhasil diubah');
        return redirect('admin/laporan');
    }

    public function editlaporan(Laporan $id)
    {
        $this->authorize('admin');

        $data = [
            'transaksi' => Transaksi::all(),
            'produk' => Produk::all(),
            'laporan' => $id,
        ];

        return view('admin.editlaporan', $data);
    }

    public function editlaporanact(Request $request, Laporan $id)
    {
        $this->authorize('admin');

        $request->validate([
            'id_transaksi' => 'required',
            'id_paket' => 'required',
            'qty' => 'required',
            'keterangan' => 'required',
        ]);

        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_paket' => $request->id_paket,
            'qty' => $request->qty,
            'keterangan' => $request->keterangan,
        ];

        Laporan::where('id', $id->id)->update($data);

        $request->session()->flash('success', 'Data Laporan berhasil diubah');
        return redirect('admin/laporan');
    }

    public function printlaporan(Laporan $id)
    {
        return view('admin.printlaporan', ['out' => $id]);
    }
}
