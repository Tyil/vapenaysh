<?php

namespace App\Http\Controllers;

use App\Flavour;
use App\Http\Requests\StoreMixRequest;
use App\Mix;
use App\MixFlavour;
use DB;
use Exception;
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
        if (!$request->has('flavours')) {
            return view('pages.mix.select-flavours');
        }

        $flavours = Flavour::orderBy('name', 'asc')
            ->orderBy('brand', 'asc')
            ->get()
            ;

        return view('pages.mix.create', [
            'flavours' => $flavours,
            'input' => $request->all(),
            'rows' => $request->get('flavours'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMixRequest $request)
    {
        try {
            DB::beginTransaction();

            $mix = new Mix();

            $mix->name = $request->input('name');
            $mix->description = $request->input('description') ?? '';
            $mix->created_by = 1;
            $mix->save();

            foreach ($request->input('flavour') as $flavour) {
                $mixFlavour = new MixFlavour();

                $mixFlavour->mix_id = $mix->id;
                $mixFlavour->flavour_id = $flavour['flavour'];
                $mixFlavour->units = $flavour['units'];
                $mixFlavour->nicotine = $flavour['nicotine'];
                $mixFlavour->save();
            }

            DB::commit();

            return redirect()->route('mixes.show', [
                'id' => $mix->id,
            ]);
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
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
