@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste des mentor</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Age</th>
                            <th scope="col">Compétences</th>
                            <th scope="col">Faire une demande d'ajout</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $use)
                            <!-- Permet de savoir si le mentor est disponible -->
                            <!-- Permet de savoir si le mentor a bien fait une candidature pour être mentor -->
                            <!-- Permet de ne pas l'afficher lui même -->
                            @if ($use->dispo == 1 and $use->candidature_mentor == 1 and $use->email <> Auth::user()->email)
                            <tr>
                                <th scope="row">{{ $use->id }}</th>
                                <td>{{ $use->nom }} </td>
                                <td>{{ $use->prenom }} </td>
                                <td>{{ $use->age }} </td>
                                <td>
                                    @foreach($competences as $competence)
                                        @if ($use->competences->pluck('id')->contains($competence->id))
                                            <label for="{{ $competence->id }}" class="form-check-label">{{ $competence->nom }}</label>
                                        @endif
                                    @endforeach

                                </td>
                                <td>
                                    <button class="btn btn-success" href="{{ route('password.request') }}">Ajout</button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection