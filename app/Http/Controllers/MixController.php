<?php

namespace App\Http\Controllers;

use App\Flavour;
use App\Mix;
use Illuminate\Http\Request;

class MixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mixes = Mix::paginate(20);

        return view('pages.mix.index', [
            'mixes' => $mixes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $flavours = Flavour::orderBy('name', 'desc')
            ->orderBy('brand', 'desc')
            ->get()
            ;

        return view('pages.mix.create', [
            'flavours' => $flavours,
            'input' => $request->all(),
            'rows' => $request->get('flavours', 1),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('add-row-button') && $request->get('add-row-button') !== '') {
            $rows = (int)$request->get('flavours') + (int)$request->get('add-rows', 1);

            $request->request->add(['flavours' => $rows]);

            return $this->create($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mix = Mix::findOrFail($id);

        return view('pages.mix.show', [
            'mix' => $mix,
        ]);
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
