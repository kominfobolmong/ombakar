<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuratPermohonanResource;
use App\Models\Kapal;
use App\Models\SuratPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SuratPermohonanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->is_admin == 'Y') {
            $surat = SuratPermohonan::latest()->get();
        } else {
            // $surat = DB::table('surat_permohonans')
            //     ->join('kapals', 'surat_permohonans.kapal_id', '=', 'kapals.id')
            //     ->where('kapals.user_id', auth()->user()->id)
            //     ->orderBy('surat_permohonans.created_at', 'desc')
            //     ->get();
            // $item = SuratPermohonan::all();
            // $surat = $item->find(2);
            $surat = SuratPermohonan::latest()->get();
        }

        return $this->sendResponse(SuratPermohonanResource::collection($surat), 'Surat fetched.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'kapal_id'         => 'required',
            'lama_operasional' => 'required',
            'daerah_operasi'   => 'required',
            'kebutuhan_bbm'    => 'required',
            'pengisian_bulan'  => 'required',
            'penyalur_id'      => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $surat = SuratPermohonan::create($input);
        return $this->sendResponse(new SuratPermohonanResource($surat), 'Surat created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = SuratPermohonan::find($id);
        if (is_null($surat)) {
            return $this->sendError('Surat does not exist.');
        }
        return $this->sendResponse(new SuratPermohonanResource($surat), 'Surat fetched.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratPermohonan $surat)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'kapal_id'         => 'required',
            'lama_operasional' => 'required',
            'daerah_operasi'   => 'required',
            'kebutuhan_bbm'    => 'required|numeric',
            'pengisian_bulan'  => 'required',
            'penyalur_id'      => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $surat->kapal_id         = $input['kapal_id'];
        $surat->lama_operasional = $input['lama_operasional'];
        $surat->daerah_operasi   = $input['daerah_operasi'];
        $surat->kebutuhan_bbm    = $input['kebutuhan_bbm'];
        $surat->pengisian_bulan  = $input['pengisian_bulan'];
        $surat->penyalur_id      = $input['penyalur_id'];
        $surat->save();

        return $this->sendResponse(new SuratPermohonanResource($surat), 'Surat updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratPermohonan $surat)
    {
        $surat->delete();
        return $this->sendResponse([], 'Surat deleted.');
    }
}
