<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Produk;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtKeranjang = Keranjang::where('user_id', Auth::id())->paginate(5);
        return view('user.keranjang.keranjang', compact('dtKeranjang'));
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
    public function keranjangadd(Request $request, $id)
    {
        // if(Auth::id())
        // {
            // $user = Auth::user();
            // $produk = Produk::firstOrFail();
        //     $keranjang = new Keranjang;
        //     $keranjang->user = $user->name;
        //     $keranjang->no_hp = $user->no_hp;
        //     $keranjang->nama_produk = $produk->nama_produk;
        //     $keranjang->harga = $produk->harga;
        //     // dd($keranjang);
        //     $keranjang->save();
        //     return redirect('keranjang');
        // }
        // else
        // {
        //     return redirect()->back();
        // }
        $data = [
            'produk_id' => $id,
            'user_id' => Auth::user()->id,
        ];
        Keranjang::create($data);
        // dd($data);
        return redirect('keranjang');
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
        $dtKeranjang = Keranjang::find($id);
        $dtKeranjang->delete();
        return redirect()->back();
    }
}