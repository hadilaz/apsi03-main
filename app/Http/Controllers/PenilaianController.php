<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\User;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Penilaian::with('User')->latest()->simplepaginate(10);
        return view('penilaian/index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/penilaian/create', [
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
            'laporan' => 'required',
            'aplikasi' => 'required',
            'presentasi' => 'required',
        ]);

        Penilaian::create([
            'user_id' => $request->user_id,
            'laporan' => $request->laporan,
            'aplikasi' => $request->aplikasi,
            'presentasi' => $request->presentasi,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
        </div>
        ');

        return redirect('/penilaian');
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
        $penilaian = penilaian::select('id', 'user_id', 'laporan', 'aplikasi', 'presentasi')->whereId($id)->first();
        $users = User::all();
        return view('penilaian/edit', compact('penilaian','users'));
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
            'laporan' => 'required',
            'aplikasi' => 'required',
            'presentasi' => 'required',
        ]);

        Penilaian::whereId($id)->update([
            'user_id' => $request->user_id,
            'laporan' => $request->laporan,
            'aplikasi' => $request->aplikasi,
            'presentasi' => $request->presentasi,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil di Edit
        </div>
        ');

        return redirect('/penilaian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Penilaian::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/penilaian');
    }
}
