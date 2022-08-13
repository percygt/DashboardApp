<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {

      return Inertia::render('Users/Index', [
          'users' => User::when($request->search,function($query,$search){
            $query->where('name','like',"%{$search}%");
          })
          ->orderBy('id', 'ASC')
          ->paginate(10)
          ->withQueryString()
          ->through(fn($user)=>[
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'role'=>$user->role,
            'can' => [
              'update' => Auth::user()->can('update', $user),
            ],

          ]),
          'filters'=>$request->only(['search']),
          'can' => [
            'create_user' => Auth::user()->can('create', $user),
          ],


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
    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->withInput()->with('mesage','User saved successfully');
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
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', Rules\Password::defaults()],
    ]);
      User::where('id', $id)
        ->update([
          'id'=> $request->id,
          'name' => $request->name,
          'email' => $request->email,
          'role'=>$request->role,
          'password' => Hash::make($request->password),
      ]);

    return back()->withInput()->with('mesage','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {

      User::where('id', $id)->delete();

      return back()->withInput()->with('mesage','User deleted successfully');
    }
}