<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Application;

class AdminSettingsController extends Controller
{
  public function index()
  {
    return view('admin.setting.index', [
      'app' => Application::all(),
      'title' => 'setting'
    ]);
  }

  // verify user
  public function verify(Request $request)
  {
    $credentials = $request->validate([
      'usernameverify' => 'required',
      'password' => 'required',
    ]);

    $credentials['username'] = $credentials['usernameverify'];
    unset($credentials['usernameverify']);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return back()->with('statusverifysuccess', 'success');
      exit;
    }

    return back()->with('statusverifyfailed', 'failed');
  }

  // set email baru
  public function setemail(Request $request)
  {
    $validatedData = $request->validate([
      'email' => 'required|email:dns|unique:users',
    ]);
    User::where('id', auth()->user()->id)
      ->update($validatedData);
    return back()->with('updateEmailUser', 'Correo electrónico actualizado correctamente!');
  }
  /**
   * Store a new blog post.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = [
      'name' => 'required|string|max:100',
      'alamat' => 'Max:255',
      'gender' => 'in:Laki-Laki,Perempuan',
      'tanggal_lahir' => '',
      'image' => 'image|file|max:500|dimensions:ratio=1/1'
    ];

    if ($request->username != auth()->user()->username) {
      $rules['username'] = 'required|string|regex:/^[a-zA-Z0-9]+$/|min:5|max:50|unique:users';
    }

    $validatedData = $request->validate($rules, [
      'image.dimensions' => 'El atributo debe tener una relación de aspecto 1:1.',
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('profil-images');
    }
    User::where('id', auth()->user()->id)->update($validatedData);
    return back()->with('updateUserBerhasil', 'Los datos han sido actualizados correctamente');
  }

  public function changepassword(Request $request)
  {
    $validatedData = $request->validate([
      'passwordLama' => 'required',
      'passwordBaru' => ['required', 'max:255', Password::min(8)->mixedCase()->letters()->numbers()->symbols(), 'confirmed'],
    ]);

    if (Hash::check($validatedData['passwordLama'], auth()->user()->password)) {
      $hashPassword = bcrypt($validatedData['passwordBaru']);
      User::where('id', auth()->user()->id)
        ->update(['password' => $hashPassword]);
      return back()->with('passwordUpdateSuccess', 'Contraseña actualizada correctamente');
      exit;
    } else {
      return back()->with('passwordLamaSalah', 'Su antigua contraseña es incorrecta.');
    }
  }

}