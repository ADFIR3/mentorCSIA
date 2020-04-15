<?php

namespace App\Http\Controllers;

use App\Competences;
use App\User;
use Illuminate\Http\Request;

class listMentorerController extends Controller
{
    public function index(User $user)
    {
        $user = User::all();
        $competences = Competences::all();

        return view('listeMentorer', [
            'user' => $user,
            'competences' => $competences
        ]);
    }
}
