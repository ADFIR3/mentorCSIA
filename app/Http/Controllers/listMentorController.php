<?php

namespace App\Http\Controllers;

use App\User;
use App\Competences;
use App\Demandes;
use Illuminate\Http\Request;

class listMentorController extends Controller
{
    public function index(User $user)
    {
        $user = User::all();
        $competences = Competences::all();
        $demandes = Demandes::all();

        return view('listeMentor', [
            'user' => $user,
            'competences' => $competences,
            'demandes' => $demandes,
        ]);
    }

    public function show(User $user)
    {

    }
}
