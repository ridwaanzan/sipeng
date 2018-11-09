<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use Redirect;
use Validator;

use App\User;
class ControllerPassword extends Controller
{
    public function show($kode_karyawan)
    {
        $load = User::where('username', '=', $kode_karyawan)->first();

        return view('admin.home.password-update', compact('load'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $pesan = ['password.required' => 'Form Password haruslah diisi!', 'password2.required' => 'Form Confirmation Password haruslah diisi!'];

        $rules = ['password' => 'required', 'password2' => 'required'];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }
        else {
            if ($request->password != $request->password2) {
                Session::flash('alert', 'Password confirmation haruslah diisi sama dengan form Password!');

                return back();
            } else {
                $user = User::find($id);
                $user->password = bcrypt($request->password);
                $user->update();

                Session::flash('success', 'Berhasil mengubah data password profile');

                return redirect('dashboard');
             }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
