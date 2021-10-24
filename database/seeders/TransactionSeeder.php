<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'id_outlet' => '1',
            'kode_invoice' => 'KL001',
            'id_member' => '1',
            'tgl' => '2021-10-23 10:46:22',
            'batas_waktu' => '2021-10-23 10:46:22',
            'tgl_bayar' => '2021-10-23 10:46:22',
            'biaya_tambahan' => '10000',
            'diskon' => '10',
            'pajak' => '2',
            'status' => 'baru',
            'dibayar' => 'dibayar',
            'id_user' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
