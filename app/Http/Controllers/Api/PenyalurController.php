<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PenyalurResource;
use App\Models\Penyalur;
use Illuminate\Http\Request;

class PenyalurController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $penyalur = Penyalur::latest()->get();
        return $this->sendResponse(PenyalurResource::collection($penyalur), 'Penyalur fetched.');
    }
}
