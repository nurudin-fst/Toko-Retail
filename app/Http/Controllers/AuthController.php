<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Pelanggan;
use Whoops\Run;

class AuthController extends Controller
{

  public function indexLogin()
  {
    return view('pages.login', [
      "title" => "Login"
    ]);
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);


    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      if (Auth::user()->level == "Admin") {
        return redirect()->intended('/dashboard');
      } else if (Auth::user()->level == "Kasir") {
        return redirect()->intended('/kasir');
      } else {
        return redirect()->intended('/');
      }
    }

    return back()->with('loginError', 'Gagal login!!');
  }

  public function indexRegistration()
  {
    return view('pages.registration', [
      "title" => "Registrasi"
    ]);
  }

  public function registration(Request $request)
  {
    $validateData = $request->validate(
      [
        "namaUser" => 'required|max:255',
        "email" => 'required|email|unique:datauser,email',
        "password" => 'required|min:5|max:255',
        "noHp" => 'required|max:20',
        "kabupaten" => 'required|max:255',
        "kecamatan" => 'required|max:255',
        "desa" => 'required|max:255',
        "alamatLengkap" => 'required|max:255'
      ],
      [
        'namaUser.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email harus sesuai aturan',
        'email.unique:datauser,email' => 'Email sudah ada',
        'password.min:5' => 'Password minimal 5 karakter',
        'noHp.required' => 'No Handphone harus diisi',
        'kabupaten.required' => 'Kabupaten harus diisi',
        'kecamatan.required' => 'Kecamatan harus diisi',
        'desa.required' => 'Desa harus diisi',
        'alamatLengkap.required' => 'Alamat lengkap harus diisi',
      ]
    );

    $validateData['password'] = Hash::make($validateData['password']);
    $user = User::create($validateData);
    $pelanggan = Pelanggan::create([
      'kdPelanggan' => Str::random(5),
      'namaPelanggan' => $request->namaUser,
      'Point' => 0,
    ]);

    return redirect()->to('/loginView')->with('success', 'Registrasi Berhasil');
    // return response()->json([
    //   'message' => "berhasil menambah data"
    // ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerate();
    return redirect('/');
  }

  public function update(Request $request)
  {
    $user = User::where('kdUser', $request->kdUser)->first();
    // dd($user);
    if ($request->email !== $user->email) {
      $validateData['email'] = 'required|email|unique:datauser,email';
    }

    if (Hash::make($request->password) !== $user->password) {
      $validateData['password'] = 'min:5|max:255';
    }

    $validateData = $request->validate(
      [
        "namaUser" => 'required|max:255',
        // "email" => 'required|email|unique:datauser,email',
        // "password" => 'min:5|max:255',
        "noHp" => 'required|max:20',
        "kabupaten" => 'required|max:255',
        "kecamatan" => 'required|max:255',
        "desa" => 'required|max:255',
        "alamatLengkap" => 'required|max:255'
      ],
      [
        'namaUser.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email harus sesuai aturan',
        'email.unique:datauser,email' => 'Email sudah ada',
        'password.min:5' => 'Password minimal 5 karakter',
        'noHp.required' => 'No Handphone harus diisi',
        'kabupaten.required' => 'Kabupaten harus diisi',
        'kecamatan.required' => 'Kecamatan harus diisi',
        'desa.required' => 'Desa harus diisi',
        'alamatLengkap.required' => 'Alamat lengkap harus diisi',
      ]
    );

    $user->update([
      "namaUser" => $request->namaUser,
      "email" => $request->email,
      "password" => Hash::make($request->password) ?? $user->password,
      "noHp" => $request->noHp,
      "kabupaten" => $request->kabupaten,
      "kecamatan" => $request->kecamatan,
      "desa" => $request->desa,
      "alamatLengkap" => $request->alamatLengkap
    ]);
    // $user = User::update($validateData);
    // $pelanggan = Pelanggan::create([
    //   'kdPelanggan' => Str::random(5),
    //   'namaPelanggan' => $request->namaUser,
    //   'Point' => 0,
    // ]);

    return back()->with('success', 'Profil berhasil diupdate');
  }
}
