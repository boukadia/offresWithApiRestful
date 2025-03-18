<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Http\Requests\StoreOffreRequest;
use App\Http\Requests\UpdateOffreRequest;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offre = Offre::all();
        return response()->json($offre);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $credential=$request->validate(["title"=>"required","description"=> "required"]);
        $offre = Offre::create($request->all());
        return response()->json($offre);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOffreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function postuler(Request $request,Offre $offre)
    {
        $validateData=$request->validate(["cv"=> "required"]);
        $user=Auth::user();
        $user->offres()->attach($offre->id,[$request->url]);
        return response()->json($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        $offre->update($request->all());
        return response()->json(["date"=> $offre],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
    }
}
