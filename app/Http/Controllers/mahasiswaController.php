<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\MahasiswaService;
use App\Models\mahasiswa;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = mahasiswa::orderBy('id', 'desc')->paginate(10);
        $data = compact(['mahasiswa']);
        // dd($data);
        return view('mahasiswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MahasiswaService $MahasiswaService)
    {
        $MahasiswaService->storeMhs(
            $request->nim_mahasiswa,
            $request->nama_mahasiswa
        );
        
        return redirect()->route('mahasiswa.index')->with('tambah', true);
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
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, MahasiswaService $MahasiswaService)
    {
        $MahasiswaService->updateMhs(
            $id,
            $request->nim_mahasiswa,
            $request->nama_mahasiswa
        );
        
        return redirect()->route('mahasiswa.index')->with('edit', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, MahasiswaService $MahasiswaService)
    {
        $MahasiswaService->destroyMhs(
            $id
        );
        
        return redirect()->route('mahasiswa.index')->with('delete', true);
    }
}
