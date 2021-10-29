<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Aparat;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aparats = DB::table('aparats')
        ->select('aparats.id', 'aparats.jabatan' , 'aparats.rt' , 'aparats.rw')
        ->get();

        $role = Auth::user()->role;

        if($role != 'Admin') {
            return view('livewire.failed');
        }
        
        return view('admin2')->with('aparats', $aparats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'jabatan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Aparat',
        ]);


 
        Aparat::create([
            'nik' => $request->nik,
            'jabatan' => strtoupper($request->jabatan),
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);
    
       
        $aparats = DB::table('aparats')
        ->select('aparats.id', 'aparats.jabatan' , 'aparats.rt' , 'aparats.rw')
        ->get();
        
        return view('admin2')->with('aparats', $aparats);
    }
    
    public function showFormDaftar(){
        $role = Auth::user()->role;

        if($role != 'Admin') {
            return view('livewire.failed');
        }

        return view('admin');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        //
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
