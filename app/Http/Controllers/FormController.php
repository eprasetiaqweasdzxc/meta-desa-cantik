<?php

namespace App\Http\Controllers;

// use App\Models\Response;
// use App\Models\AgustusResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Region;
use App\Models\ResponseArt;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(?string $region_id = null)
    {

        $pml = auth()->user()->name;
        $kabupaten = Region::all()->where('kabupaten', auth()->user()->kabupaten)->unique('kabupaten')->map(fn($kabupaten) => [
            'id' => $kabupaten->kabupaten,
            'nama' => '[' . $kabupaten->kabupaten . '] ' . $kabupaten->nama_kabupaten
        ]);
        $data = DB::table(getResponseTable())
            ->select('region_id', 'nurt', 'docState', 'submit_status', 'updated_at', DB::raw('count(*) as jumlah_art'))
            ->groupByRaw('region_id, nurt, docState, submit_status, updated_at')
            ->where('region_id', '=', $region_id)
            ->where('pml', '=', $pml)
            ->get();
        $region = null;
        if ($region_id != null) {
            $region = Region::where('id', $region_id)->first();
        }
        return Inertia::render('Form/Index', [
            "kabupatens" => $kabupaten,
            "data" => $data,
            "region" => $region
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $region_id)
    {
        // dd ($request->all());
        $pml = auth()->user()->name;
        $idbs = $region_id;
        // $pcl = User::all()->where('kabupaten', $region_id)->where('status', '2')->map(fn($pcl) =>[
        //     "label" => $pcl->name,
        //     "value" => $pcl->name,
        // ]);
        $kab = DB::scalar(
            "select kabupaten from regions where id =" . $region_id
        );
        if ($kab != auth()->user()->kabupaten) {
            return inertia_location('/');
        }
        $res = DB::table(getResponseTable())
            ->select('nurt as label', 'nurt as value')
            ->where('region_id', '=', $region_id)
            ->get()->toArray();
        $res = json_decode(json_encode($res), true);
        $nurt = [
            [
                'label' => "1",
                'value' => "1"
            ],
            [
                'label' => "2",
                'value' => "2"
            ],
            [
                'label' => "3",
                'value' => "3"
            ],
            [
                'label' => "4",
                'value' => "4"
            ],
            [
                'label' => "5",
                'value' => "5"
            ],
            [
                'label' => "6",
                'value' => "6"
            ],
            [
                'label' => "7",
                'value' => "7"
            ],
            [
                'label' => "8",
                'value' => "8"
            ],
            [
                'label' => "9",
                'value' => "9"
            ],
            [
                'label' => "10",
                'value' => "10"
            ]
        ];
        //  $nurt_done = array_diff($nurt, $res);
        foreach ($nurt as $key => $n) {
            foreach ($res as $r) {
                if ($n['value'] == $r['value']) {
                    unset($nurt[$key]);
                }
            }
        }

        $nurt = array_values($nurt);


        $pcl = DB::table('users')
            ->select('name as label', 'name as value')
            ->where('kabupaten', '=', $kab)
            ->where('status', '=', '2')
            ->get();
        $prefill = Region::all()->where('id', $idbs)->map(fn($prefill) => [
            [
                "dataKey" => "prov",
                "answer" => '[' . $prefill->provinsi . '] ' . $prefill->nama_provinsi
            ],
            [
                "dataKey" => "kab",
                "answer" => '[' . $prefill->kabupaten . '] ' . $prefill->nama_kabupaten
            ],
            [
                "dataKey" => "kec",
                "answer" => '[' . $prefill->kecamatan . '] ' . $prefill->nama_kecamatan
            ],
            [
                "dataKey" => "desa",
                "answer" => '[' . $prefill->desa . '] ' . $prefill->nama_desa
            ],
            [
                "dataKey" => "nbs",
                "answer" => $prefill->nbs
            ],
            [
                "dataKey" => "nks",
                "answer" => $prefill->nks
            ],
            [
                "dataKey" => "pml",
                "answer" => $pml
            ],
        ]);


        return Inertia::render(getViewPath(), [
            "prefill" => $prefill,
            "region_id" => $region_id,
            'pcl' => $pcl,
            'nurt' => $nurt
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $region_id, $id = null)
    {
        try {
            $ResponseModel = getResponseModel();
            $req = $request->all();
            $answers = $req['answers'];
            // return response::json($req)
            $response = new $ResponseModel;
            $response->region_id = $region_id;
            $response->hasil_kunjungan = array_column($answers, 'answer', 'dataKey')['hasil_kunjungan'][0]['value'] ?? null;
            $jumlah_art = array_column($answers, 'answer', 'dataKey')['jml_art'] ?? null;

            if ($response->hasil_kunjungan != '1') {
                $jumlah_art = 0;
            }
            $response->nurt = array_column($answers, 'answer', 'dataKey')['nurt'][0]['value'] ?? null;
            $response->pcl = array_column($answers, 'answer', 'dataKey')['pcl'][0]['value'] ?? null;
            $response->pml = array_column($answers, 'answer', 'dataKey')['pml'] ?? null;
            $response->kn = array_column($answers, 'answer', 'dataKey')['kn'] ?? null;
            $response->nn = array_column($answers, 'answer', 'dataKey')['nn'] ?? null;
            $response->almt = array_column($answers, 'answer', 'dataKey')['almt'] ?? null;
            $response->nkk = array_column($answers, 'answer', 'dataKey')['nkk'] ?? null;
            $response->nubtt = array_column($answers, 'answer', 'dataKey')['nubtt'] ?? null;
            $response->nukhb = array_column($answers, 'answer', 'dataKey')['nukhv'] ?? null;
            $response->sk = array_column($answers, 'answer', 'dataKey')['sk'] ?? null;
            $response->jak = array_column($answers, 'answer', 'dataKey')['jak'] ?? null;
            $response->ilw = array_column($answers, 'answer', 'dataKey')['ilw'] ?? null;
            $response->nkk = array_column($answers, 'answer', 'dataKey')['nkk'] ?? null;
            $response->kkk = array_column($answers, 'answer', 'dataKey')['kkk'][0]['value'] ?? null;

            $response->nama_art = array_column($answers, 'answer', 'dataKey')['nama_art'] ?? null;
            $response->nuak = array_column($answers, 'answer', 'dataKey')['nuak'] ?? null;
            $response->nik = array_column($answers, 'answer', 'dataKey')['nik'] ?? null;
            $response->kak = array_column($answers, 'answer', 'dataKey')['kak'][0]['value'] ?? null;
            $response->jk = array_column($answers, 'answer', 'dataKey')['jk'][0]['value'] ?? null;
            $response->tl = array_column($answers, 'answer', 'dataKey')['tl'] ?? null;
            $response->umur = array_column($answers, 'answer', 'dataKey')['umur'] ?? null;
            $response->sp = array_column($answers, 'answer', 'dataKey')['sp'][0]['value'] ?? null;
            $response->shdkk = array_column($answers, 'answer', 'dataKey')['shdkk'][0]['value'] ?? null;
            $response->jmwbtdp = array_column($answers, 'answer', 'dataKey')['jmwbtdp'][0]['value'] ?? null;
            $response->amkk = array_column($answers, 'answer', 'dataKey')['amkk'][0]['value'] ?? null;
            $response->ps = array_column($answers, 'answer', 'dataKey')['ps'][0]['value'] ?? null;
            $response->jjptypsd = array_column($answers, 'answer', 'dataKey')['jjptypsd'][0]['value'] ?? null;
            $response->ktypsd = array_column($answers, 'answer', 'dataKey')['ktypsd'][0]['value'] ?? null;
            $response->istyd = array_column($answers, 'answer', 'dataKey')['istyd'][0]['value'] ?? null;
            $response->abmbssyl = array_column($answers, 'answer', 'dataKey')['abmbssyl'][0]['value'] ?? null;
            $response->bjb = array_column($answers, 'answer', 'dataKey')['bjb'] ?? null;
            $response->lpdpu = array_column($answers, 'answer', 'dataKey')['lpdpu'][0]['value'] ?? null;
            $response->sqpu = array_column($answers, 'answer', 'dataKey')['sqpu'][0]['value'] ?? null;
            $response->amnpwp = array_column($answers, 'answer', 'dataKey')['amnpwp'][0]['value'] ?? null;
            $response->amusb = array_column($answers, 'answer', 'dataKey')['amusb'][0]['value'] ?? null;
            $response->bjusbym = array_column($answers, 'answer', 'dataKey')['bjusbym'] ?? null;
            $response->aluduut = array_column($answers, 'answer', 'dataKey')['aluduut'][0]['value'] ?? null;
            $response->jpydpuu = array_column($answers, 'answer', 'dataKey')['jpydpuu'] ?? null;
            $response->jpytdpuu = array_column($answers, 'answer', 'dataKey')['jpytdpuu'] ?? null;
            $response->kpuu = array_column($answers, 'answer', 'dataKey')['kpuu'][0]['value'] ?? null;
            $response->ouupr = array_column($answers, 'answer', 'dataKey')['ouupr'][0]['value'] ?? null;
            $response->pidkuu = array_column($answers, 'answer', 'dataKey')['pidkuu'][0]['value'] ?? null;
            $response->puubkg = array_column($answers, 'answer', 'dataKey')['puubkg'][0]['value'] ?? null;
            $response->amkgpmmabm = array_column($answers, 'answer', 'dataKey')['amkgpmmabm'][0]['value'] ?? null;
            $response->amkgpmmabd = array_column($answers, 'answer', 'dataKey')['amkgpmmabd'][0]['value'] ?? null;
            $response->amkgbana = array_column($answers, 'answer', 'dataKey')['amkgbana'][0]['value'] ?? null;
            $response->amkmmtj = array_column($answers, 'answer', 'dataKey')['amkmmtj'][0]['value'] ?? null;
            $response->ddpys = array_column($answers, 'answer', 'dataKey')['ddpys'][0]['value'] ?? null;
            $response->ddpysam = array_column($answers, 'answer', 'dataKey')['ddpysam'][0]['value'] ?? null;
            $response->ammkgbb = array_column($answers, 'answer', 'dataKey')['ammkgbb'][0]['value'] ?? null;
            $response->amkgumds = array_column($answers, 'answer', 'dataKey')['amkgumds'][0]['value'] ?? null;
            $response->amkgmb = array_column($answers, 'answer', 'dataKey')['amkgmb'][0]['value'] ?? null;
            $response->jbtkaapsi = array_column($answers, 'answer', 'dataKey')['jbtkaapsi'][0]['value'] ?? null;
            $response->amkkkm = array_column($answers, 'answer', 'dataKey')['amkkkm'][0]['value'] ?? null;
            $response->dstt = array_column($answers, 'answer', 'dataKey')['dstt'][0]['value'] ?? null;
            $response->dsttaisdppp = array_column($answers, 'answer', 'dataKey')['dsttaisdppp'][0]['value'] ?? null;
            $response->aidpkur = array_column($answers, 'answer', 'dataKey')['aisdpkur'][0]['value'] ?? null;
            $response->anisdppum = array_column($answers, 'answer', 'dataKey')['anisdppum'][0]['value'] ?? null;
            $response->aisdpip = array_column($answers, 'answer', 'dataKey')['aisdpip'][0]['value'] ?? null;
            $response->amjk = array_column($answers, 'answer', 'dataKey')['amjk'][0]['value'] ?? null;

            $response->skbttyt = array_column($answers, 'answer', 'dataKey')['skbttyt'][0]['value'] ?? null;
            $response->jpsmn = array_column($answers, 'answer', 'dataKey')['jpsmn'][0]['value'] ?? null;
            $response->llbtt = array_column($answers, 'answer', 'dataKey')['llbtt'] ?? null;
            $response->jll = array_column($answers, 'answer', 'dataKey')['jll'][0]['value'] ?? null;
            $response->jdt = array_column($answers, 'answer', 'dataKey')['jdt'][0]['value'] ?? null;
            $response->jat = array_column($answers, 'answer', 'dataKey')['jat'][0]['value'] ?? null;
            $response->samu = array_column($answers, 'answer', 'dataKey')['samu'][0]['value'] ?? null;
            $response->sjjsam = array_column($answers, 'answer', 'dataKey')['sjjsam'][0]['value'] ?? null;
            $response->spu = array_column($answers, 'answer', 'dataKey')['spu'][0]['value'] ?? null;
            $response->dytdri = array_column($answers, 'answer', 'dataKey')['dytdri'][0]['value'] ?? null;
            $response->bbeuum = array_column($answers, 'answer', 'dataKey')['bbeuum'][0]['value'] ?? null;
            $response->kdpftbab = array_column($answers, 'answer', 'dataKey')['kdpftbab'][0]['value'] ?? null;
            $response->jpsjk = array_column($answers, 'answer', 'dataKey')['jpsjk'][0]['value'] ?? null;
            $response->tpat = array_column($answers, 'answer', 'dataKey')['tpat'][0]['value'] ?? null;

            $response->akmpb = array_column($answers, 'answer', 'dataKey')['akmpb'][0]['value'] ?? null;
            $response->pbssb = array_column($answers, 'answer', 'dataKey')['pbssb'][0]['value'] ?? null;
            $response->pkh = array_column($answers, 'answer', 'dataKey')['pkh'][0]['value'] ?? null;
            $response->pbltd = array_column($answers, 'answer', 'dataKey')['pbltd'][0]['value'] ?? null;
            $response->psl = array_column($answers, 'answer', 'dataKey')['psl'][0]['value'] ?? null;
            $response->pbpd = array_column($answers, 'answer', 'dataKey')['pbpd'][0]['value'] ?? null;
            $response->pbsp = array_column($answers, 'answer', 'dataKey')['pbsp'][0]['value'] ?? null;
            $response->pslpg = array_column($answers, 'answer', 'dataKey')['pslpg'][0]['value'] ?? null;
            $response->kmassb = array_column($answers, 'answer', 'dataKey')['kmassb'][0]['value'] ?? null;
            $response->tgkal = array_column($answers, 'answer', 'dataKey')['tgkal'][0]['value'] ?? null;
            $response->lk = array_column($answers, 'answer', 'dataKey')['lk'][0]['value'] ?? null;
            $response->ac = array_column($answers, 'answer', 'dataKey')['ac'][0]['value'] ?? null;
            $response->pa = array_column($answers, 'answer', 'dataKey')['pa'][0]['value'] ?? null;
            $response->tp = array_column($answers, 'answer', 'dataKey')['tp'][0]['value'] ?? null;
            $response->tld = array_column($answers, 'answer', 'dataKey')['tld'][0]['value'] ?? null;
            $response->ep = array_column($answers, 'answer', 'dataKey')['ep'][0]['value'] ?? null;
            $response->klt = array_column($answers, 'answer', 'dataKey')['klt'][0]['value'] ?? null;
            $response->sm = array_column($answers, 'answer', 'dataKey')['sm'][0]['value'] ?? null;
            $response->sepeda = array_column($answers, 'answer', 'dataKey')['sepeda'][0]['value'] ?? null;
            $response->m = array_column($answers, 'answer', 'dataKey')['m'][0]['value'] ?? null;
            $response->p = array_column($answers, 'answer', 'dataKey')['p'][0]['value'] ?? null;
            $response->kpm = array_column($answers, 'answer', 'dataKey')['kpm'][0]['value'] ?? null;
            $response->smp = array_column($answers, 'answer', 'dataKey')['smp'][0]['value'] ?? null;
            $response->kmatbs = array_column($answers, 'answer', 'dataKey')['kmatbs'][0]['value'] ?? null;
            $response->lsyt = array_column($answers, 'answer', 'dataKey')['lsyt'][0]['value'] ?? null;
            $response->rb = array_column($answers, 'answer', 'dataKey')['rb'][0]['value'] ?? null;
            $response->jtym = array_column($answers, 'answer', 'dataKey')['jtym'] ?? null;
            $response->jaiuy = array_column($answers, 'answer', 'dataKey')['jaiuy'][0]['value'] ?? null;
            $response->akimradp = array_column($answers, 'answer', 'dataKey')['akimradp'][0]['value'] ?? null;

            // tambah atribut lain > rt

            $response->docState = $req['docState'];
            $response->submit_status = '2';

            for ($i = 0; $i < $jumlah_art; $i++) {
                // art
                $art = new ResponseArt();
                $art->response_id = $response->id;
                $art->no_art = $i + 1;
                $no_urut = '#' . ($i + 1);

                foreach ($answers as $key => $answer) {
                    if (str_ends_with($answer['dataKey'], $no_urut)) {
                        $dk = rtrim($answer['dataKey'], $no_urut);
                        $art->$dk = is_array($answer['answer'])
                            ? (empty($answer['answer']) ? null : json_encode($answer['answer']))
                            : strval($answer['answer']);
                    }
                }

                $art->save();
            }


            if (!$id) {
                // rt

                $response->save();


                return response()->json([
                    'message' => 'Data berhasil disimpan',
                    'id' => $response->nurt
                ], 201);
            } else {
                if ($response->hasil_kunjungan != '1') {
                    $response->submit_status = '1';
                    $response->jak = 0;
                    $response->save();
                    ResponseArt::where('response_id', $response->id)
                        ->delete();
                }


                return response()->json([
                    'message' => 'Data berhasil disimpan',
                    'id' => $response->nurt
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    public function submit(Request $request, string $region_id)
    {
        $ResponseModel = getResponseModel();
        $req = $request->all();
        $answers = $req['answers'];
        $jumlah_art = array_column($answers, 'answer', 'dataKey')['jml_art'] ?? null;
        $hasil_kunjungan = array_column($answers, 'answer', 'dataKey')['hasil_kunjungan'][0]['value'] ?? null;
        if ($hasil_kunjungan != '1') {
            $response = new $ResponseModel;
            $response->region_id = $region_id;
            $response->nurt = array_column($answers, 'answer', 'dataKey')['nurt'][0]['value'] ?? null;
            $response->hasil_kunjungan = $hasil_kunjungan;
            $response->pcl = array_column($answers, 'answer', 'dataKey')['pcl'][0]['value'] ?? null;
            $response->pml = array_column($answers, 'answer', 'dataKey')['pml'] ?? null;
            $response->docState = $req['docState'];
            $response->submit_status = '1';
            $response->save();
        } else {
            for ($i = 0; $i < $jumlah_art; $i++) {
                $response = new $ResponseModel;
                $response->region_id = $region_id;
                $response->nurt = array_column($answers, 'answer', 'dataKey')['nurt'][0]['value'] ?? null;
                $response->hasil_kunjungan = $hasil_kunjungan;
                $response->pcl = array_column($answers, 'answer', 'dataKey')['pcl'][0]['value'] ?? null;
                $response->pml = array_column($answers, 'answer', 'dataKey')['pml'] ?? null;
                $response->no_art = $i + 1;
                $no_urut = '#' . ($i + 1);
                foreach ($answers as $key => $answer) {
                    if (str_ends_with($answer['dataKey'], $no_urut)) {
                        $dk = rtrim($answer['dataKey'], $no_urut);
                        $response->$dk = strval($answer['answer']);
                    }
                }
                $response->docState = $req['docState'];
                $response->submit_status = '1';
                $response->save();
            }
        }
        return inertia_location('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $region_id, string $id)
    {
        $pml = auth()->user()->name;
        $idbs = $region_id;
        // $pcl = User::all()->where('kabupaten', $region_id)->where('status', '2')->map(fn($pcl) =>[
        //     "label" => $pcl->name,
        //     "value" => $pcl->name,
        // ]);
        $kab = DB::scalar(
            "select kabupaten from regions where id =" . $region_id
        );
        if ($kab != auth()->user()->kabupaten) {
            return inertia_location('/');
        }
        $res = DB::table(getResponseTable())
            ->select('nurt as label', 'nurt as value')
            ->where('region_id', '=', $region_id)
            ->where('nurt', '!=', $id)
            ->get()->toArray();
        $res = json_decode(json_encode($res), true);
        $nurt = [
            [
                'label' => "1",
                'value' => "1"
            ],
            [
                'label' => "2",
                'value' => "2"
            ],
            [
                'label' => "3",
                'value' => "3"
            ],
            [
                'label' => "4",
                'value' => "4"
            ],
            [
                'label' => "5",
                'value' => "5"
            ],
            [
                'label' => "6",
                'value' => "6"
            ],
            [
                'label' => "7",
                'value' => "7"
            ],
            [
                'label' => "8",
                'value' => "8"
            ],
            [
                'label' => "9",
                'value' => "9"
            ],
            [
                'label' => "10",
                'value' => "10"
            ]
        ];
        //  $nurt_done = array_diff($nurt, $res);
        foreach ($nurt as $key => $n) {
            foreach ($res as $r) {
                if ($n['value'] == $r['value']) {
                    unset($nurt[$key]);
                }
            }
        }

        $nurt = array_values($nurt);

        $pcl = DB::table('users')
            ->select('name as label', 'name as value')
            ->where('kabupaten', '=', $kab)
            ->where('status', '=', '2')
            ->get();

        $response = [];
        $data = DB::table(getResponseTable())
            ->where('region_id', '=', $region_id)
            ->where('pml', '=', $pml)
            ->where('nurt', "=", $id)
            ->get();

        $field = array('id', 'region_id', 'pcl', 'pml', 'nurt', 'no_art');
        $response = [
            [
                "dataKey" => "nurt",
                "answer" => [
                    [
                        "label" => $data[0]->nurt,
                        "value" => $data[0]->nurt
                    ]
                ]
            ],
            [
                "dataKey" => "pcl",
                "answer" => [
                    [
                        "label" => $data[0]->pcl,
                        "value" => $data[0]->pcl
                    ]
                ]
            ],
            [
                "dataKey" => "jml_art",
                "answer" => sizeof($data)
            ],
        ];

        foreach ($data as $k => $datum) {
            foreach ($datum as $key => $value) {
                if (!in_array($key, $field)) {
                    $r = [];
                    $r["dataKey"] = $key . '#' . $k + 1;
                    $r["answer"] = $value;
                    $response[] = $r;
                }
            }
        };
        // dd($response);

        $prefill = Region::all()->where('id', $idbs)->map(fn($prefill) => [
            [
                "dataKey" => "prov",
                "answer" => '[' . $prefill->provinsi . '] ' . $prefill->nama_provinsi
            ],
            [
                "dataKey" => "kab",
                "answer" => '[' . $prefill->kabupaten . '] ' . $prefill->nama_kabupaten
            ],
            [
                "dataKey" => "kec",
                "answer" => '[' . $prefill->kecamatan . '] ' . $prefill->nama_kecamatan
            ],
            [
                "dataKey" => "desa",
                "answer" => '[' . $prefill->desa . '] ' . $prefill->nama_desa
            ],
            [
                "dataKey" => "nbs",
                "answer" => $prefill->nbs
            ],
            [
                "dataKey" => "nks",
                "answer" => $prefill->nks
            ],
            [
                "dataKey" => "pml",
                "answer" => $pml
            ]
        ]);

        return Inertia::render(getViewPath(), [
            "prefill" => $prefill,
            "response" => $response,
            "region_id" => $region_id,
            'pcl' => $pcl,
            'nurt' => $nurt
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $region_id, string $id)
    {
        $ResponseModel = getResponseModel();
        $pml = auth()->user()->name;
        // $ResponseModel::where('region_id', $region_id)->where('pml', '=', $pml)->where('nurt', $id)->delete();

        $req = $request->all();
        $answers = $req['answers'];
        $jumlah_art = array_column($answers, 'answer', 'dataKey')['jml_art'] ?? null;
        $nurt = array_column($answers, 'answer', 'dataKey')['nurt'][0]['value'] ?? null;
        $hasil_kunjungan = array_column($answers, 'answer', 'dataKey')['hasil_kunjungan'][0]['value'] ?? null;
        if ($hasil_kunjungan != '1') {
            $response = new $ResponseModel;
            $response->region_id = $region_id;
            $response->nurt = $nurt;
            $response->hasil_kunjungan = $hasil_kunjungan;
            $response->pcl = array_column($answers, 'answer', 'dataKey')['pcl'][0]['value'] ?? null;
            $response->pml = array_column($answers, 'answer', 'dataKey')['pml'] ?? null;
            $response->docState = $req['docState'];
            $response->submit_status = '1';
            $response->save();
            $jumlah_art = 0;
        } else {
            $ResponseModel::where('region_id', $region_id)
                ->where('pml', $pml)
                ->where('nurt', $id)
                ->where('hasil_kunjungan', '!=', '1')
                ->delete();

            for ($i = 0; $i < $jumlah_art; $i++) {
                $response = $ResponseModel::firstOrNew([
                    'region_id' => $region_id,
                    'pml' => $pml,
                    'nurt' => $id,
                    'no_art' => $i + 1
                ]);
                $response->region_id = $region_id;
                $response->nurt = $nurt;
                $response->hasil_kunjungan = array_column($answers, 'answer', 'dataKey')['hasil_kunjungan'][0]['value'] ?? null;
                $response->pcl = array_column($answers, 'answer', 'dataKey')['pcl'][0]['value'] ?? null;
                $response->pml = array_column($answers, 'answer', 'dataKey')['pml'] ?? null;
                $response->no_art = $i + 1;
                $no_urut = '#' . ($i + 1);

                foreach ($answers as $key => $answer) {
                    if (str_ends_with($answer['dataKey'], $no_urut)) {
                        $dk = rtrim($answer['dataKey'], $no_urut);
                        $response->$dk = is_array($answer['answer'])
                            ? (empty($answer['answer']) ? null : json_encode($answer['answer']))
                            : strval($answer['answer']);
                    }
                }
                $response->docState = $req['docState'];
                $response->submit_status = '2';
                $response->save();
            }
        }

        $ResponseModel::where('region_id', $region_id)
            ->where('pml', $pml)
            ->where('nurt', $id)
            ->where('no_art', '>', $jumlah_art)
            ->delete();

        return inertia_location('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $region_id, string $id)
    {
        $ResponseModel = getResponseModel();
        $pml = auth()->user()->name;
        $ResponseModel::where('region_id', $region_id)->where('pml', '=', $pml)->where('nurt', $id)->delete();
        return redirect()->route('form.index', ['region_id' => $region_id]);
    }
}
