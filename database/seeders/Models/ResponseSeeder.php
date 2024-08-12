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
            'kn' => '12 ',
            'nn' => ' 12',
            'almt' => ' Manado ',
            'nkk' => ' Brian ',
            'nubtt' => '13 ',
            'nukhb' => ' 2',
            'sk' => ' Bahagia ',
            'jak' => ' 2',
            'ilw' => ' Dase12',
            'kkk' => '1. KK Sesuai',
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
            'r10' => '  ',
            'r411' => ' 4. KTP',
            'r412' => '3. Tidak bersekolah lagi',
            'r413' => ' 19. D4/SI ',
            'r413' => ' 8.',
            'r415' => ' 19. D4/SI',
            'r416' => '1. Ya ',
            'r4161' => ' 78 jam',
            'r417' => ' 14. Penyediaan akomodasi & makan minum',
            'r418' => ' 1. Berusaha Sendiri ',
            'r419' => ' 3. Tidak Ada',
            'r420' => ' 1. Ya ',
            'r4201' => ' 1 ',
            'r421' => ' 14. Penyedian akomodasi & makan minum',
            'r422' => ' 1 ',
            'r423' => ' 1',
            'r424' => ' 1. Surat Izin Tempat Usaha (SITU) ',
            'r425' => ' 2. 5<-15 juta(ultra mikro)',
            'r426' => ' 5. Sebagai Sarana Penjualan Produk/Output ',
            'r427' => ' 3. Tidak ada catatan',
            'r428' => ' 2. Tidak',
            'r4281' => ' 2. Tidak ',
            'r4282' => ' 2. Tidak ',
            'r4283' => ' 2. Tidak ',
            'r4284' => ' 2. Tidak',
            'r4285' => ' 2. Tidak ',
            'r4286' => ' 2. Tidak',
            'r4287' => ' 2. Tidak ',
            'r4288' => ' 4. Tidak ',
            'r4289' => ' 3. Jarang ',
            'r429' => ' ',
            'r430' => '1. Tidak Ada',
            'r431' => ' 2. Tidak Memiliki ',
            'r4311' => ' 2. Tidak',
            'r4312' => '2. Tidak ',
            'r4313' => ' 2. Tidak',
            'r4314' => ' 2. Tidak',
            'r4315' => ' 1. Tidak Memiliki',

            'r301' => ' 1. Milik Sendiri ',
            'r3011' => ' 1. SHM atas Nama Anggota Keluarga ',
            'r302' => ' 30m ',
            'r303' => ' 2. Keramik ',
            'r304' => ' 1. Tembok ',
            'r305' => ' 3. Seng ',
            'r306' => ' 2. Air isi ulang ',
            'r3061' => ' ',
            'r307' => ' 1. Listrik PLN dengan meteran ',
            'r3071' => ' 1. 450 Watt',
            'r308' => ' 4. Gas elpiji 3 kg ',
            'r309' => ' 1. Ada, digunakan hanya anggota keluarga sendiri  ',
            'r3091' => ' 1. Leher angsa',
            'r3010' => '1. Tangki septik ',

            'r501' => ' 2. Tidak',
            'r5011' => ' 2. Tidak',
            'r5012' => ' 2. Tidak',
            'r5013' => ' 2. Tidak ',
            'r5014' => ' 2. Tidak',
            'r5015' => ' 2. Tidak',
            'r5016' => ' 2. Tidak ',
            'r5017' => '2. Tidak',
            'r502' => ' 1. Ya ',
            'r5021' => ' 2. Tidak',
            'r5022' => ' 1. Ya',
            'r5023' => ' 1. Ya',
            'r5024' => ' 2. Tidak ',
            'r5025' => ' 2. Tidak',
            'r5026' => ' 2. Tidak ',
            'r5027' => ' 2. Tidak',
            'r5028' => ' 1. Ya ',
            'r5029' => ' 2. Tidak',
            'r50210' => ' 2. Tidak ',
            'r50211' => ' 2. Tidak',
            'r50212' => ' 2. Tidak',
            'r50213' => ' 2. Tidak',
            'r50214' => ' 1. Ya',
            'r503' => ' 1. Ya ',
            'r5031' => ' 1. Ya',
            'r5032' => ' 1. Ya ',
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
