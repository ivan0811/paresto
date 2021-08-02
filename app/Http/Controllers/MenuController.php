<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;

class MenuController extends Controller
{
        public function kategori(){                      
            return response()->json(Kategori::all());
        }

        public function index()
        {            
            return response()->json(Menu::with('kategori')->get());
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
            Menu::create([
                'kategori_id' => $request->kategori,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'status' => 'tersedia'
            ]);
        
            return response()->json(['status' => true]);
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
            return response()->json(Menu::findOrFail($id));
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
            $menu = Menu::findOrFail($id);
            $menu->kategori_id = $request->kategori;
            $menu->nama = $request->nama;
            $menu->harga = $request->harga;            
            $menu->save();

            return response()->json(['status' => true]);
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Menu::findOrFail($id)->delete();
            return response()->json(['status' => true]);
        }

        public function updateStatus(Request $req){
            foreach ($req->id as $key => $val) {
                Menu::where('id', $val)
                ->update([
                    'status' => 'habis'
                ]);
            }
            return response()->json(['status' => true]);
        }

}
