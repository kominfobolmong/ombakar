<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BerkasResource;
use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BerkasController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkas = Berkas::latest()->get();
        return $this->sendResponse(BerkasResource::collection($berkas), 'Berkas fetched.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'surat_permohonan_id'                   => 'required',
            'stblkk'                                => 'required|mimes:pdf|max:2048',
            'sipi_sikpi'                            => 'required|mimes:pdf|max:2048',
            'slo'                                   => 'required|mimes:pdf|max:2048',
            'estimasi_produksi_per_trip'            => 'required|mimes:pdf|max:2048',
            'jadwal_rencana_pengisian_minyak_solar' => 'required|mimes:pdf|max:2048',
            'realisasi_pengisian_bbm_sebelumnya'    => 'required|mimes:pdf|max:2048',
            'estimasi_sisa_minyak_solar_dikapal'    => 'required|mimes:pdf|max:2048',
            'surat_kuasa'                           => 'required|mimes:pdf|max:2048',
            'produksi_per_jenis_ikan'               => 'required|mimes:pdf|max:2048',
            'spb'                                   => 'required|mimes:pdf|max:2048',
            'daftar_abk'                            => 'required|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $data['surat_permohonan_id'] = $request->surat_permohonan_id;

        if ($request->file('stblkk')) {
            $data['stblkk'] = $request->file('stblkk')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('sipi_sikpi')) {
            $data['sipi_sikpi'] = $request->file('sipi_sikpi')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('slo')) {
            $data['slo'] = $request->file('slo')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('estimasi_produksi_per_trip')) {
            $data['estimasi_produksi_per_trip'] = $request->file('estimasi_produksi_per_trip')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('jadwal_rencana_pengisian_minyak_solar')) {
            $data['jadwal_rencana_pengisian_minyak_solar'] = $request->file('jadwal_rencana_pengisian_minyak_solar')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('realisasi_pengisian_bbm_sebelumnya')) {
            $data['realisasi_pengisian_bbm_sebelumnya'] = $request->file('realisasi_pengisian_bbm_sebelumnya')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('estimasi_sisa_minyak_solar_dikapal')) {
            $data['estimasi_sisa_minyak_solar_dikapal'] = $request->file('estimasi_sisa_minyak_solar_dikapal')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('surat_kuasa')) {
            $data['surat_kuasa'] = $request->file('surat_kuasa')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('produksi_per_jenis_ikan')) {
            $data['produksi_per_jenis_ikan'] = $request->file('produksi_per_jenis_ikan')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('spb')) {
            $data['spb'] = $request->file('spb')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        if ($request->file('daftar_abk')) {
            $data['daftar_abk'] = $request->file('daftar_abk')->store(
                'assets/' . auth()->user()->id . '/berkas',
                'public'
            );
        }

        $berkas = Berkas::create($data);

        return $this->sendResponse(new BerkasResource($berkas), 'Berkas created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berkas = Berkas::find($id);
        if (is_null($berkas)) {
            return $this->sendError('Berkas does not exist.');
        }
        return $this->sendResponse(new BerkasResource($berkas), 'Berkas fetched.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Berkas::findOrFail($id);
        Storage::delete($item->stblkk);
        Storage::delete($item->sipi_sikpi);
        Storage::delete($item->slo);
        Storage::delete($item->estimasi_produksi_per_trip);
        Storage::delete($item->jadwal_rencana_pengisian_minyak_solar);
        Storage::delete($item->realisasi_pengisian_bbm_sebelumnya);
        Storage::delete($item->estimasi_sisa_minyak_solar_dikapal);
        Storage::delete($item->surat_kuasa);
        Storage::delete($item->produksi_per_jenis_ikan);
        Storage::delete($item->spb);
        Storage::delete($item->daftar_abk);
        $item->delete();
        return $this->sendResponse([], 'Berkas deleted.');
    }
}
