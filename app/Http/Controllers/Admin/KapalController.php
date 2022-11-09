<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KapalRequest;
use App\Models\Kapal;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:kapal-list|kapal-show|kapal-create|kapal-edit|kapal-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:kapal-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kapal-show', ['only' => ['show']]);
        $this->middleware('permission:kapal-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kapal-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kapal::latest()->paginate(10);
        return view('pages.kapal.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Kapal();
        return view('pages.kapal.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KapalRequest $request)
    {
        $data = $request->all();
        $kapal = auth()->user()->kapals()->create($data);
        session()->flash('success', 'Kapal was created.');
        return redirect()->route('kapal.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Kapal::where('id', $id)->firstOrFail();
        return view('pages.kapal.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kapal::findOrFail($id);
        return view('pages.kapal.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KapalRequest $request, $id)
    {
        $data = $request->all();
        $item = Kapal::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Kapal was updated.');
        return redirect()->route('kapal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kapal::findOrFail($id);
        $item->delete();
        return redirect()->route('kapal.index');
    }
}
