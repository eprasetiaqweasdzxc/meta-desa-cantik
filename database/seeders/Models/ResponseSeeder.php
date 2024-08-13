<?php

namespace Database\Seeders\Models;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Command :
         * artisan seed:generate --model-mode --models=Response
         *
         */

        // rt
        $newData0 = \App\Models\Response::create([
            'id' => 69,
            'region_id' => 30,
            'r105' => '12 ',
            'r106' => ' 12',
            'r107' => ' Manado ',
            'r109' => ' Brian ',
            'r110' => '13 ',
            'r111' => ' 2',
            'r112' => ' Bahagia ',
            'r113' => ' 2',
            'r114' => ' Dase12',
            'r115' => '1. KK Sesuai',
            'pcl' => 'SHERYL JESSICA TATONTOS',
            'pml' => 'ANASTASYA WOWOMPANSING',

            'r402' => ' 1 ',
            'nama_art' => ' Brian',
            'r403' => ' 7171031204980001',
            'r404' => ' 1. Tinggal bersama keluarga',
            'r405' => ' 1. Laki-laki ',
            'r406' => ' 12/04/1998',
            'r407' => ' 26',
            'r408' => ' 2. Kawin/Nikah',
            'r409' => ' 1. Kepala Keluarga ',
            'r410' => '  ',
            'r411' => ' 4. KTP',
            'r412' => '3. Tidak bersekolah lagi',
            'r413' => ' 19. D4/SI ',
            'r413' => ' 8.',
            'r415' => ' 19. D4/SI',
            'r416A' => '1. Ya ',
            'r416B' => ' 78 jam',
            'r417' => ' 14. Penyediaan akomodasi & makan minum',
            'r418' => ' 1. Berusaha Sendiri ',
            'r419' => ' 3. Tidak Ada',
            'r420A' => ' 1. Ya ',
            'r420B' => ' 1 ',
            'r421' => ' 14. Penyedian akomodasi & makan minum',
            'r422' => ' 1 ',
            'r423' => ' 1',
            'r424' => ' 1. Surat Izin Tempat Usaha (SITU) ',
            'r425' => ' 2. 5<-15 juta(ultra mikro)',
            'r426' => ' 5. Sebagai Sarana Penjualan Produk/Output ',
            'r427' => ' 3. Tidak ada catatan',
            'r428A' => ' 2. Tidak',
            'r428B' => ' 2. Tidak ',
            'r428C' => ' 2. Tidak ',
            'r428D' => ' 2. Tidak ',
            'r428E' => ' 2. Tidak',
            'r428F' => ' 2. Tidak ',
            'r428G' => ' 2. Tidak',
            'r428H' => ' 2. Tidak ',
            'r428I' => ' 4. Tidak ',
            'r428J' => ' 3. Jarang ',
            'r429' => ' ',
            'r430' => '1. Tidak Ada',
            'r431A' => ' 2. Tidak Memiliki ',
            'r431B' => ' 2. Tidak',
            'r431C' => '2. Tidak ',
            'r431D' => ' 2. Tidak',
            'r431E' => ' 2. Tidak',
            'r431F' => ' 1. Tidak Memiliki',

            'r301A' => ' 1. Milik Sendiri ',
            'r301B' => ' 1. SHM atas Nama Anggota Keluarga ',
            'r302' => ' 30m ',
            'r303' => ' 2. Keramik ',
            'r304' => ' 1. Tembok ',
            'r305' => ' 3. Seng ',
            'r306A' => ' 2. Air isi ulang ',
            'r306B' => ' ',
            'r307A' => ' 1. Listrik PLN dengan meteran ',
            'r307B' => ' 1. 450 Watt',
            'r308' => ' 4. Gas elpiji 3 kg ',
            'r309A' => ' 1. Ada, digunakan hanya anggota keluarga sendiri  ',
            'r309B' => ' 1. Leher angsa',
            'r310' => '1. Tangki septik ',

            'r501' => ' 2. Tidak',
            'r501A' => ' 2. Tidak',
            'r501B' => ' 2. Tidak',
            'r501C' => ' 2. Tidak ',
            'r501D' => ' 2. Tidak',
            'r501E' => ' 2. Tidak',
            'r501F' => ' 2. Tidak ',
            'r501G' => '2. Tidak',
            'r502' => ' 1. Ya ',
            'r502A' => ' 2. Tidak',
            'r502B' => ' 1. Ya',
            'r502C' => ' 1. Ya',
            'r502D' => ' 2. Tidak ',
            'r502E' => ' 2. Tidak',
            'r502F' => ' 2. Tidak ',
            'r502G' => ' 2. Tidak',
            'r502H' => ' 1. Ya ',
            'r502I' => ' 2. Tidak',
            'r502J' => ' 2. Tidak ',
            'r502K' => ' 2. Tidak',
            'r502L' => ' 2. Tidak',
            'r502M' => ' 2. Tidak',
            'r502N' => ' 1. Ya',
            'r503' => ' 1. Ya ',
            'r503A' => ' 1. Ya',
            'r503B' => ' 1. Ya ',
            'r504' => ' 2 Sapi ',
            'r505' => ' 4. Internet Handphone',
            'r506' => ' 1. Ya, untuk usaha',


            'docState' => 'C',
            'submit_status' => 2,
            'updated_at' => '2024-07-17',
            'created_at' => '2024-07-17',
        ]);
        // art
        $newData1 = \App\Models\ResponseArt::create([
            'id' => 1,
            'response_id' => 69,

        ]);
    }
}
