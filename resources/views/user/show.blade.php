@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profil <strong>{{ $user->nom }} {{ $user->prenom }}</strong></div>
                    <div class="card-body">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label ">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input disabled id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') ?? $user->nom }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input disabled id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') ?? $user->prenom }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input disabled id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') ?? $user->age }}" required autocomplete="age" autofocus>

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input disabled id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <label for="competence" class="col-md-3 col-form-label">{{ __('Competences') }}</label>
                        @foreach($competences as $competence)
                            <div class="form-group form-check">

                                <input disabled type="checkbox" class="form-check-input" name="competences[]" value="{{ $competence->id }}" id="{{ $competence->id }}"
                                       @if ($user->competences->pluck('id')->contains($competence->id)) checked @endif>
                                <label for="{{ $competence->id }}" class="form-check-label">{{ $competence->nom }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
