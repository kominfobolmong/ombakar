<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPermohonan;
use Illuminate\Http\Request;

class SuratPermohonanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:surat-permohonan-list|surat-permohonan-show|surat-permohonan-create|surat-permohonan-edit|surat-permohonan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:surat-permohonan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:surat-permohonan-show', ['only' => ['show']]);
        $this->middleware('permission:surat-permohonan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:surat-permohonan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SuratPermohonan::latest()->paginate(10);
        return view('pages.surat_permohonan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
