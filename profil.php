@extends ('layouts/app') @section('titre') VRT - Profil @endsection @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header dark" style="color: white ">Modifier profil</div>
                <div class="card-body bg-secondary ">
                    @isset($profil)
                    <!--                        <form method="PATCH" action="{{ route('profil.update', $profil[0]->id) }}">-->
                    <form method="POST" action="{{ route('profil.update', ['id'=>$profil[0]->id]) }}">
                        <input type="hidden" name="_method" value="PATCH" /> {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$profil[0]->name}}" required autofocus> @if ($errors->has('name'))
                                <span class="invalid-feedback">

                                    <strong>{{ $errors->first('name') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adresse Email :</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$profil[0]->email}}" required> @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"> @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer à nouveau') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="id_lodestone" class="col-md-4 col-form-label text-md-right">Id Personnage</label>

                            <div class="col-md-6">
                                <input id="id_lodestone" type="text" class="form-control" name="id_lodestone" value="{{$profil[0]->id_lodestone}}" required>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right">Job</label>

                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control" name="job" value="{{$profil[0]->job}}">
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-white">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    @endsection
