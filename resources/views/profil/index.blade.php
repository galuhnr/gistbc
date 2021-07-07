@extends('layouts.v_template')
@section('title', 'Akun Profil')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card profile-widget">
            <div class="card-header">
                <h3 class="card-title">Profil Admin</h3>
                <div class="card-tools">
                    <a href=""><i class="fas fa-edit" style="color: #66799E;"></i></a>              
                </div>
            </div>
            <div class="card-body profiile-widget-description">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <div class="profile-widget-name">
                                {{ Auth::('auth')->users->name }}
                                <div class="text-muted d-inline font-weight-normal"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>

@endsection