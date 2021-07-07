<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function edit(Request $request){
        return view('profil.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(UpdateProfileRequest $request){

        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profil.edit')->with('toast_success', 'Data berhasil diupdate');
    }
}
