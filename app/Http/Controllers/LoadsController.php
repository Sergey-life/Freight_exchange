<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;
use App\Load;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RouteRequest;

class LoadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('loads')
            ->leftJoin('routes', 'routes.load_id', '=', 'loads.id')
            ->orderBy('loads.id', 'desc')->take(35)
            ->get();
//
        return response()->json($query);
//       return Load::latest()->get();
//        return Load::with('loads')->orderBy('id', 'desc')->take(35)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {
        $load = new Load();
        $load->name = $request->name;
        $load->weight = $request->weight;
        $load->save();

        $route = new Route();
        $route->from = $request->from;
        $route->to = $request->to;
        $route->date = $request->date;
        $route->load_id = $load->id;
        $route->save();

        $cargo_data = [$load, $route];

        return response()->json($cargo_data);
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
        $load->name = $request->name;
        $load->weight = $request->weight;
        $load->update();

        $route = Route::findOrFail($id);
        $route->from = $request->from;
        $route->to = $request->to;
        $route->date = $request->date;
        $route->update();

        $cargo_update = [$load, $route];

        return $cargo_update;
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

        return "Запись удалена!!!";
    }
}
