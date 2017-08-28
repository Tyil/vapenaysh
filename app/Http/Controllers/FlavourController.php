<?php

namespace App\Http\Controllers;

use App\Flavour;
use App\Http\Requests\StoreFlavourRequest;
use DB;
use Exception;
use Illuminate\Http\Request;

class FlavourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flavours = Flavour::paginate(20);

        return view('pages.flavour.index', [
            'flavours' => $flavours,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.flavour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlavourRequest $request)
    {
        try {
            DB::beginTransaction();

            $flavour = new Flavour();

            $flavour->name = $request->input('name');
            $flavour->brand = $request->input('brand');
            $flavour->link = $request->input('link') ?? '';
            $flavour->description = $request->input('description') ?? '';
            $flavour->save();

            DB::commit();

            return redirect()->route('flavours.show', [
                'id' => $flavour->id,
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
        $flavour = Flavour::findOrfail($id);
        $alternatives = Flavour::where('name', $flavour->name)
            ->where('id', '<>', $flavour->id)
            ->get()
            ;

        return view('pages.flavour.show', [
            'flavour' => $flavour,
            'alternatives' => $alternatives,
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
