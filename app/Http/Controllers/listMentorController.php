<?php

namespace App\Http\Controllers;

use App\User;
use App\Competences;
use Illuminate\Http\Request;

class listMentorController extends Controller
{
    public function index(User $user)
    {
        $user = User::all();
        $competences = Competences::all();

        return view('listeMentor', [
            'user' => $user,
            'competences' => $competences
        ]);
    }

    public function show(User $user)
    {

    }
}
