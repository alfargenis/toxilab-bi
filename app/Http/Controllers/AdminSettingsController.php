<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminSettingsController extends Controller
{
  public function index()
  {
    return view('admin.setting.index', [
      'app' => Application::all(),
      'title' => 'Configuración'
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
    return back()->with('updateEmailUser', 'Email berhasil diupdate!');
  }

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
      'image.dimensions' => 'The :attribute must have a 1:1 aspect ratio.',
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('profil-images');
    }
    User::where('id', auth()->user()->id)->update($validatedData);
    return back()->with('updateUserBerhasil', 'Data admin berhasil diupdate!');
  }

  public function changepassword(Request $request)
{
    $validatedData = $request->validate([
        'passwordLama' => 'required',
        'passwordBaru' => ['required', 'confirmed', 'min:8'], // Simplificado para el ejemplo
    ]);

    $user = auth()->user();
    if (Hash::check($request->passwordLama, $user->password)) {
        $user->password = bcrypt($request->passwordBaru);
        $user->save(); // Guardar el usuario actualizado
        return response()->json(['message' => 'Contraseña actualizada correctamente']);
    } else {
        return response()->json(['message' => 'La contraseña actual es incorrecta'], 400);
    }
}

}
