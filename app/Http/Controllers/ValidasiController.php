<?php

namespace App\Http\Controllers;
use App\Models\validasi;
use App\Models\User;

use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validasi = validasi::with('User')->latest()->simplepaginate(10);
    	return view('validasi/index',compact('validasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/validasi/create', [
            'users' => User::all()
        ]);
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
            'user_id' => 'required',
            'proposal' => 'required',
            'laporan' => 'required',
            'seminar' => 'required',
        ]);

        validasi::create([
            'user_id' => $request->user_id,
            'proposal' => $request->proposal,
            'laporan' => $request->laporan,
            'seminar' => $request->seminar,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
        </div>
        ');

        return redirect('/validasi');

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
        $validasi = validasi::select('id', 'user_id', 'proposal', 'laporan', 'seminar')->whereId($id)->first();
        $users = User::all();
        return view('validasi/edit', compact('validasi','users'));
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
            'user_id' => 'required',
            'proposal' => 'required',
            'laporan' => 'required',
            'seminar' => 'required',
        ]);

        validasi::whereId($id)->update([
            'user_id' => $request->user_id,
            'proposal' => $request->proposal,
            'laporan' => $request->laporan,
            'seminar' => $request->seminar,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil di edit
        </div>
        ');

        return redirect('/validasi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        validasi::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/validasi');
    }
}
