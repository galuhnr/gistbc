@extends('layouts.v_template')
@section('title', 'Edit Profil')
@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Profil Admin</h3>
                </div>
                <form action="{{ route('profil.update') }}" method="post" >
                    @method('patch')
                    @csrf
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label for="name" class="txt-label">{{ __('Nama Lengkap') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>
                            @error('name')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="txt-label">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-data">Ubah Profil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- </div> -->
@include('sweetalert::alert')
@endsection