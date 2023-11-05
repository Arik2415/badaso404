<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminLTE;
use App\Models\agama;
use App\Models\datadiri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminLTEController extends Controller
{

    public function data()
    {
        $data=datadiri::get();

        return view('table', [
            "data"=>$data
        ]);
    }
 
    public function forms()
    {
        $data=datadiri::get();

        $agama=agama::get();
        return view('forms', [
            "data"=>$data, 
            "agama"=>$agama
        ]);
    }
 
    public function table(Request $request)
    {

        $this->validate($request,[
            'nama'=>'required|min:3|max:20',
            'nik'=>'required',
            'jenis_pegawai'=>'required',
            'status_pegawai'=>'required',
            'unit'=>'required',
            'sub_unit'=>'required',
            'pendidikan'=>'required',
            'tanggal_lahir'=>'required',
            'tempat_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'foto'=>'required'
        ],[
            'nama.required'=> 'Nama Wajib diisi',
            'nik.required'=> 'NIK Wajib diisi',
            'jenis_pegawai.required'=> 'Jenis Pegawai Wajib diisi',
            'status_pegawai'=> 'Status Pegawai Wajib diisi',
            'unit'=> 'Unit Wajib diisi',
            'sub_unit'=> 'Sub Unit Wajib diisi',
            'pendidikan'=> 'Pendidikan Wajib diisi',
            'tanggal_lahir.required'=> 'Tanggal Lahir Wajib diisi',
            'tempat_lahir.required'=> 'Tempat Lahir Wajib diisi',
            'jenis_kelamin.required'=> 'Jenis Kelamin Wajib diisi',
            'agama.required'=> 'Agama Wajib diisi',
            'foto.required'=> 'Foto Wajib diisi',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);
        
       
        $data =[
            'nama'=>$request->nama,
            'nik'=>$request->nik,
            'jenis_pegawai'=>$request->jenis_pegawai,
            'status_pegawai'=>$request->status_pegawai,
            'unit'=>$request->unit,
            'sub_unit'=>$request->sub_unit,
            'pendidikan'=>$request->pendidikan,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'tempat_lahir'=>$request->tempat_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'agama'=>$request->agama,
            'foto'=>$foto_nama
        ];
        datadiri::create($data);
        return redirect(url('table'));
    }

    public function edit($id)
    {
        $data=datadiri::find($id);
        $agama=agama::get();

        return view('edit', [
            "data"=>$data,
            "agama"=>$agama
        ]);
    }
    
    public function editdata(Request $request, $id)
    {
        $this->validate($request,[
            'nama'=>'required|min:3|max:20',
            'nik'=>'required',
            'jenis_pegawai'=>'required',
            'status_pegawai'=>'required',
            'unit'=>'required',
            'sub_unit'=>'required',
            'pendidikan'=>'required',
            'tanggal_lahir'=>'required',
            'tempat_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
        ]);
        $data=datadiri::find($id);

        if ($request->hasFile('foto')){
            $request->validate([]);          
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'),$foto_nama);

            $data = datadiri::findOrFail($id);
            File::delete(public_path('foto').'/'.$data->foto);

            $data['foto']=$foto_nama;
        };
        
        $data->update([
            'nama'=>$request->nama,
            'nik'=>$request->nik,
            'jenis_pegawai'=>$request->jenis_pegawai,
            'status_pegawai'=>$request->status_pegawai,
            'unit'=>$request->unit,
            'sub_unit'=>$request->sub_unit,
            'pendidikan'=>$request->pendidikan,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'tempat_lahir'=>$request->tempat_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'agama'=>$request->agama,
            'foto'=>$foto_nama
        ]);
        
        
        return redirect(url('table'));

        
    }

    public function destroy($id)
    {
        $data = datadiri::findOrFail($id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        //get post by ID
        $post = datadiri::findOrFail($id);
        //delete post
        $post->delete();

        //redirect to index
        return redirect(url('table'));
    }

    public function agama()
    {
        $data=datadiri::get();

        return view('table.agama', [
            "data"=>$data
        ]);
    }
    public function jenisp()
    {
        $data=datadiri::get();

        return view('table.jenispegawai', [
            "data"=>$data
        ]);
    }
    public function statusp()
    {
        $data=datadiri::get();

        return view('table.statuspegawai', [
            "data"=>$data
        ]);
    }
    public function pendidikan()
    {
        $data=datadiri::get();

        return view('table.pendidikan', [
            "data"=>$data
        ]);
    }
    public function kelamin()
    {
        $data=datadiri::get();

        return view('table.jeniskelamin', [
            "data"=>$data
        ]);
    }
   
    
}