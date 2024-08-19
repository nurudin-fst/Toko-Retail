<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $admin = 'Admin';
    // $kasir = 'Kasir';
    // $users = User::where('level', [$admin, $kasir])->get();
    // dd($users);
    return view('admin.pages.user.index', [
      'title' => 'Akun',
      // 'users' => $users,
      'users' => User::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'namaUser' => 'required',
      'email' => 'unique:datauser',
      'password' => 'min:5',
      'level' => 'required',
    ]);
    $validateData['password'] = Hash::make($validateData['password']);
    User::create($validateData);
    return back()->with('success', 'Akun berhasil dibuat');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $kdUser)
  {
    $user = User::find($kdUser);
    if ($request->email != $user->email) {
      $validateData['email'] = 'required';
    }

    $validateData = $request->validate([
      'namaUser' => 'required',
      'password' => 'min:5',
      'level' => 'required',
    ]);

    $validateData['password'] = Hash::make($validateData['password']);
    $user->where('kdUser', $kdUser)
      ->update($validateData);
    return back()->with('success', 'Akun berhasil dibuat');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete($id);
    return redirect()->to('user')->with('success', 'Akun berhasil dihapus');
  }
}
