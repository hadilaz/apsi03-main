<?php

namespace App\Http\Controllers;

use App\Models\rekaptulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Redirect;
use Session;
use Excel;

class RekaptulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = rekaptulasi::paginate(5);
    	return view('rekaptulasi/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekaptulasi/create');
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
            'nama' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
            'dokumen_g' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
            'dokumen_l' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]
        );
        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
        $dokumen->move(public_path().'/dokumen', $nama_dokumen);

        $dokumen_g = $request->file('dokumen_g');
        $nama_dokumen_g = 'FT'.date('Ymdhis').'.'.$request->file('dokumen_g')->getClientOriginalExtension();
        $dokumen_g->move(public_path().'/dokumen_l', $nama_dokumen_g);

        $dokumen_l = $request->file('dokumen_l');
        $nama_dokumen_l = 'FT'.date('Ymdhis').'.'.$request->file('dokumen_l')->getClientOriginalExtension();
        $dokumen_l->move(public_path().'/dokumen_g', $nama_dokumen_l);

        $data = new rekaptulasi();
        $data->nama = $request->nama;
        $data->dokumen = $nama_dokumen;
        $data->dokumen_g = $nama_dokumen_g;
        $data->dokumen_l = $nama_dokumen_l;
        $data->save();
        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil di simpan
        </div>
        ');
        return redirect('/rekaptulasi');
      

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
        rekaptulasi::whereId($id)->delete();
    

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/rekaptulasi');
    }
    public function download()
    {
        return Excel::download(new rekaptulasi(), 'Data rekaptulasi.xlsx');
    }
}
