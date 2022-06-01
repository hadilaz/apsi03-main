<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\revisi;
use Illuminate\Support\Facades\File;
use Redirect;
use Session;
use Excel;

use Illuminate\Http\Request;

class RevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revisi = revisi::with('User')->latest()->simplepaginate(10);
    	return view('revisi/index',compact('revisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revisi/create', [
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
        $this->validate($request, [
            'user_id' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]
        );
        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
        $dokumen->move(public_path().'/dokumenr', $nama_dokumen);

        $revisi = new revisi();
        $revisi->user_id = $request->user_id;
        $revisi->dokumen = $nama_dokumen;
        $revisi->save();
        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil di simpan
        </div>
        ');
        return redirect('/revisi');
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
    public function destroy(Request $request, $id)
    {
        revisi::whereId($id)->delete();
    

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/revisi');
    }
    public function download()
    {
        return Excel::download(new revisi(), 'Data revisi.xlsx');
    }
}
