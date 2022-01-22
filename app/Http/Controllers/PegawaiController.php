<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){        
        return response()->json(Pegawai::with('user')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){    
        if($request->photo){
            $request->file('photo')->store('photo', 'public');                
        }        

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->foto = $request->photo->hashName();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->roles = $request->roles;
        $user->save();
        
        Pegawai::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'no_telp' => $request->noTelp,            
            'jk' => $request->jk
        ]);                     

        $user = Pegawai::with('user')->get();

        return response()->json(['status' => true, 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user, 'pegawai' => $user->pegawai]);
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
        $user = User::findOrFail($id);
        if($request->photo){
            if($user->photo != null){
                Storage::delete(storage_path('app/public/photo') . '/' . $user->photo);
            }
            $request->photo->store('photo', 'public');
            $user->foto = $request->photo->hashName();
        }
        $user->username = $request->username;
        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }        
        $user->nama = $request->nama;
        $user->email = $request->email;                
        $user->roles = $request->roles;
        $user->save();

        Pegawai::where('user_id', $id)
        ->update([
            'alamat' => $request->alamat,
            'no_telp' => $request->noTelp,
            'jk' => $request->jk
        ]);

        $user = Pegawai::with('user')->get();
        
        return response()->json(['status' => true, 'user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();        
        return response()->json([
            'status' => true,
            'user' => Pegawai::with('user')->get()
        ]);
    }
}
