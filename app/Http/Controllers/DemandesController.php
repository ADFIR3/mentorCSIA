<?php

namespace App\Http\Controllers;

use App\User;
use App\demandes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class demandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $demandes = demandes::all();

        return view('Demandes.index', [
            'user' => $user,
            'demandes' => $demandes,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function create($user)
    {
        Demandes::create([
            'id_demandeur' => Auth::user()->id,
            'id_receveur' => $user,
        ]);

        return view('Demandes.create');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\demandes  $demandes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demandes $demandes)
    {
        $demandes->delete();

        return redirect()->route('demandes.index');
    }
}
