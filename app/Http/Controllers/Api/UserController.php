<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()->paginate(5);
        return new UserResource(true, 'List Data Pegawai', $users);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 424);
        }

        $users = User::create([
            'id_pegawai' => $request->id_pegawai,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return new UserResource(true, 'Data Berhasil ditambahkan', $users);
    }

    public function show($id) {
        $users = User::find($id);

        return new UserResource(true, "Detail data pegawai", $users);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'email' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 414);
        }

        $users = User::find($id);

        $users->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'email' => $request->email
        ]);

        return new UserResource(true, "Update data berhasil", $users);
    }

    public function destroy($id) {
        $users = User::find($id);

        $users->delete();

        return new UserResource(true, "Data Berhasil terhapus", $users);
    }
}
