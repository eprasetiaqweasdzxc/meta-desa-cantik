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

            'nuak' => ' 1 ',
            'nama_art' => ' Brian',
            'nik' => ' 7171031204980001',
            'kak' => ' 1. Tinggal bersama keluarga',
            'jk' => ' 1. Laki-laki ',
            'tl' => ' 12/04/1998',
            'umur' => ' 26',
            'sp' => ' 2. Kawin/Nikah',
            'shdkk' => ' 1. Kepala Keluarga ',
            'jmwbtdp' => '  ',
            'amkk' => ' 4. KTP',
            'ps' => '3. Tidak bersekolah lagi',
            'jjptypsd' => ' 19. D4/SI ',
            'ktypsd' => ' 8.',
            'istyd' => ' 19. D4/SI',
            'abmbssyl' => '1. Ya ',
            'bjb' => ' 78 jam',
            'lpdpu' => ' 14. Penyediaan akomodasi & makan minum',
            'sqpu' => ' 1. Berusaha Sendiri ',
            'amnpwp' => ' 3. Tidak Ada',
            'amusb' => ' 1. Ya ',
            'bjusbym' => ' 1 ',
            'aluduut' => ' 14. Penyedian akomodasi & makan minum',
            'jpydpuu' => ' 1 ',
            'jpytdpuu' => ' 1',
            'kpuu' => ' 1. Surat Izin Tempat Usaha (SITU) ',
            'ouupr' => ' 2. 5<-15 juta(ultra mikro)',
            'pidkuu' => ' 5. Sebagai Sarana Penjualan Produk/Output ',
            'puubkg' => ' 3. Tidak ada catatan',
            'amkgpmmabm' => ' 2. Tidak',
            'amkgpmmabd' => ' 2. Tidak ',
            'amkgbana' => ' 2. Tidak ',
            'amkmmtj' => ' 2. Tidak ',
            'ddpys' => ' 2. Tidak',
            'ddpysam' => ' 2. Tidak ',
            'ammkgbb' => ' 2. Tidak',
            'amkgumds' => ' 2. Tidak ',
            'amkgmb' => ' 4. Tidak Pernah ',
            'jbtkaapsi' => ' ',
            'amkkkm' => ' 1. Tidak Ada ',
            'dstt' => '1. Tidak Memiliki',
            'dsttaisdppp' => ' 2. Tidak ',
            'aidpkur' => ' 2. Tidak',
            'anisdppum' => '2. Tidak ',
            'aisdpip' => ' 2. Tidak',
            'amjk' => ' 1. Tidak',

            'skbttyt' => ' 1. Milik Sendiri ',
            'jpsmn' => ' 1. SHM atas Nama Anggota Keluarga ',
            'llbtt' => ' 30m ',
            'jll' => ' 2. Keramik ',
            'jdt' => ' 1. Tembok ',
            'jat' => ' 3. Seng ',
            'samu' => ' 2. Air isi ulang ',
            'sjjsam' => ' ',
            'spu' => ' 1. Listrik PLN dengan meteran ',
            'dytdri' => ' 1. 450 Watt',
            'bbeuum' => ' 4. Gas elpiji 3 kg ',
            'kdpftbab' => ' 1. Ada, digunakan hanya anggota keluarga sendiri  ',
            'jpsjk' => ' 1. Leher angsa',
            'tpat' => '1. Tangki septik ',

            'akmpb' => ' 2. Tidak',
            'pbssb' => ' 2. Tidak',
            'pkh' => ' 2. Tidak',
            'pbltd' => ' 2. Tidak ',
            'psl' => ' 2. Tidak',
            'pbpd' => ' 2. Tidak',
            'pbsp' => ' 2. Tidak ',
            'pslpg' => '2. Tidak',
            'kmassb' => ' 1. Ya ',
            'tgkal' => ' 2. Tidak',
            'lk' => ' 1. Ya',
            'ac' => ' 1. Ya',
            'pa' => ' 2. Tidak ',
            'tp' => ' 2. Tidak',
            'tld' => ' 2. Tidak ',
            'ep' => ' 2. Tidak',
            'klt' => ' 1. Ya ',
            'sm' => ' 2. Tidak',
            'sepeda' => ' 2. Tidak ',
            'm' => ' 2. Tidak',
            'p' => ' 2. Tidak',
            'kpm' => ' 2. Tidak',
            'smp' => ' 1. Ya',
            'kmatbs' => ' 1. Ya ',
            'lsyt' => ' 1. Ya',
            'rb' => ' 1. Ya ',
            'jtym' => ' 2 Sapi ',
            'jaiuy' => ' 4. Internet Handphone',
            'akimradp' => ' 1. Ya, untuk usaha',


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
