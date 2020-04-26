@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mes Demandes</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Age</th>
                            <th scope="col">Rôle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($demandes as $demande)
                            @if ($demande->id_demandeur == Auth::user()->id)
                                @foreach($user as $use)
                                    @if ($demande->id_receveur == $use->id)
                                    <tr>
                                        <th scope="row">{{ $use->id }}</th>
                                        <td><a href="{{ route('user.show', $use->id) }}">{{ $use->nom }} </a> </td>
                                        <td>{{ $use->prenom }} </td>
                                        <td>{{ $use->age }} </td>
                                        @if($use->candidature_mentor == 1)
                                            <td>Mentor </td>
                                        @endif

                                        @if($use->candidature_mentorer == 1)
                                            <td>Mentorer </td>
                                        @endif
                                        <td> <a href="{{ route('demandes.index') }}"><button class="btn btn-primary">Accepter</button></a> </td>
                                        <td>
                                            <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Refuser</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
