<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Http\Requests\StoreOffreRequest;
use App\Http\Requests\UpdateOffreRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OffreController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Offre->users();
        $offre = Offre::all();
        return response()->json($offre);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Gate::authorize('create', Offre::class);


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
    public function postuler(Request $request,$id)
    {
        // $validateData=$request->validate(["url"=> "required"]);
        // $user=Auth::user();
        // $user->offres()->attach($id,["url"=>$request->url]);
        // return response()->json($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        Gate::authorize('update', $offre);
        $user=$request->user();
        // $this->authorize("update", $offre);
       
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
