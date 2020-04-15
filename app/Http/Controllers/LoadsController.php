<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;
use App\Load;

class LoadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       Load::latest()->get();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $load = new Load();
        $load->name = $request->name;
        $load->weight = $request->weight;
        $load->save();

        return $load;
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
        $load = Load::findOrFail($id);
        $load->completed = $request->completed;
        $load->update();

        return $load;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $load = Load::findOrFail($id);
        $load->delete();

        return 204;
    }
}
