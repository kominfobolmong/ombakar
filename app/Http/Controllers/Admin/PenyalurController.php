<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenyalurRequest;
use App\Models\Penyalur;
use Illuminate\Http\Request;

class PenyalurController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:penyalur-list|penyalur-create|penyalur-edit|penyalur-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:penyalur-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:penyalur-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:penyalur-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Penyalur::latest()->paginate(10);
        return view('pages.penyalur.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Penyalur();
        return view('pages.penyalur.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenyalurRequest $request)
    {
        $data = $request->all();
        Penyalur::create($data);
        session()->flash('success', 'Penyalur was created.');
        return redirect()->route('penyalur.create');
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
        $item = Penyalur::findOrFail($id);
        return view('pages.penyalur.edit', compact('item'));
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
        $this->validate($request, [
            'nama' => 'required|max:255',
            'nomor_lembaga' => 'sometimes|required|string|max:255|unique:penyalurs,nomor_lembaga,' . $id,
            'lokasi' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $item = Penyalur::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Penyalur was updated.');
        return redirect()->route('penyalur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Penyalur::findOrFail($id);
        $item->delete();
        return redirect()->route('penyalur.index');
    }
}
