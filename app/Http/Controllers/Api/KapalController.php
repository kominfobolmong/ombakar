<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\Kapal;
use App\Http\Resources\KapalResource;
use Illuminate\Support\Facades\Auth;

class KapalController extends BaseController
{
    public function index()
    {
        if (auth()->user()->is_admin == 'Y') {
            $kapals = Kapal::latest()->get();
        } else {
            $kapals = Kapal::where('user_id', auth()->user()->id)->latest()->get();
        }
        return $this->sendResponse(KapalResource::collection($kapals), 'Kapal fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_kapal'   => 'required',
            'nama_pemilik' => 'required|string',
            'pk_gt'        => 'required',
            'alamat_usaha' => 'required',
            'jenis_usaha'  => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $kapal = auth()->user()->kapals()->create($input);
        return $this->sendResponse(new KapalResource($kapal), 'Kapal created.');
    }

    public function show($id)
    {
        $kapal = Kapal::find($id);
        if (is_null($kapal)) {
            return $this->sendError('Kapal does not exist.');
        }
        return $this->sendResponse(new KapalResource($kapal), 'Kapal fetched.');
    }

    public function update(Request $request, Kapal $kapal)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_kapal'   => 'required',
            'nama_pemilik' => 'required|string',
            'pk_gt'        => 'required',
            'alamat_usaha' => 'required',
            'jenis_usaha'  => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $kapal->nama_kapal   = $input['nama_kapal'];
        $kapal->nama_pemilik = $input['nama_pemilik'];
        $kapal->pk_gt        = $input['pk_gt'];
        $kapal->alamat_usaha = $input['alamat_usaha'];
        $kapal->jenis_usaha  = $input['jenis_usaha'];
        $kapal->save();

        return $this->sendResponse(new KapalResource($kapal), 'Kapal updated.');
    }

    public function destroy(Kapal $kapal)
    {
        $kapal->delete();
        return $this->sendResponse([], 'Kapal deleted.');
    }
}
