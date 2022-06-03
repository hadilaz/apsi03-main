<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use PDF;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = jadwal::select('id', 'name', 'waktu', 'date', 'penguji', 'ruangan')->simplepaginate(10);
        return view('admin/jadwal/index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jadwal/create');
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
            'name' => 'required',
            'waktu' => 'required',
            'date' => 'required',
            'penguji' => 'required',
            'ruangan' => 'required',
        ]);

        jadwal::create([
            'name' => $request->name,
            'waktu' => $request->waktu,
            'date' => $request->date,
            'penguji' => $request->penguji,
            'ruangan' => $request->ruangan,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
        </div>
        ');

        return redirect('/jadwal');
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
        $jadwal = jadwal::select('id', 'name', 'waktu', 'date', 'penguji', 'ruangan')->whereId($id)->first();
        return view('admin/jadwal/edit', compact('jadwal'));
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
            'name' => 'required',
            'waktu' => 'required',
            'date' => 'required',
            'penguji' => 'required',
            'ruangan' => 'required',
        ]);

        jadwal::whereId($id)->update([
            'name' => $request->name,
            'waktu' => $request->waktu,
            'date' => $request->date,
            'penguji' => $request->penguji,
            'ruangan' => $request->ruangan,

        ]);
        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
            Data berhasil diedit
        </div>
        ');

        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        jadwal::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/jadwal');
    }

    public function exportpdf()
    {
        $data = Jadwal::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('admin/jadwal/datajadwal-pdf');
        return $pdf->download('data.pdf');
    }
}
