@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Liste des utilisateurs</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rôles</th>
                                    <th scope="col">Éditer</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->nom }} </td>
                                    <td>{{ $user->prenom }} </td>
                                    <td>{{ $user->age }} </td>
                                    <td>{{ $user->email }} </td>
                                    <td>{{ implode(', ', $user->roles()->get()->pluck('nom')->toArray()) }} </td>
                                    <td> <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary">Éditer</button></a> </td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
