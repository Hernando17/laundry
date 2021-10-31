<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Member;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Laporan;
use Illuminate\Support\Carbon;

class KasirController extends Controller
{
    public function index()
    {
        $this->authorize('kasir');
        return view('kasir.index');
    }

    public function transaksi()
    {
        $this->authorize('kasir');

        $data = [
            'transaksi' => Transaksi::all(),
        ];

        return view('kasir.transaksi', $data);
    }

    public function inputtransaksi()
    {
        $this->authorize('kasir');

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

        return view('kasir.inputtransaksi', $data, compact('nomor'));
    }

    public function addtransaksi(Request $request)
    {
        $this->authorize('kasir');

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

        return redirect('kasir/transaksi');
    }

    public function deletetransaksi($id)
    {
        $this->authorize('kasir');
        Transaksi::where('id', $id)->delete();
        return redirect('kasir/transaksi');
    }

    public function edittransaksi(Transaksi $id)
    {
        $data = [
            'transaksi' => $id,
            'outlet' => Outlet::all(),
            'user' => User::all(),
            'member' => Member::all(),
        ];

        return view('kasir.edittransaksi', $data);
    }

    public function edittransaksiact(Request $request, Transaksi $id)
    {
        $this->authorize('kasir');

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

        return redirect('kasir/transaksi');
    }
}
