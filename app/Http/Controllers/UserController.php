<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('updated_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('role', function ($e) {
                    return Helpers::_role($e['role']);
                })
                ->addColumn('action', function ($e) {
                    if (auth()->user()->id == $e->id) {
                        $btn = '
                        <div class="btn-group">
                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->name . '" data-original-title="Edit" title="Edit" class="btn btn-sm btn-warning btnEdit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>';
                        return $btn;
                    } else {
                        $btn = '
                        <div class="btn-group">
                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->name . '" data-original-title="Edit" title="Edit" class="btn btn-sm btn-warning btnEdit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->name . '" data-original-title="Hapus" title="Hapus" class="btn btn-sm btn-danger btnHapus">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>';
                        return $btn;
                    }
                })
                ->make(true);
        }
        $header = "Data User";
        return view('pages.user.index', compact('header'));
    }

    public function store(Request $request)
    {
        if ($request->name == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['name' => "Nama wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->role == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['role' => "Role wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->username == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['username' => "Username wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->email != $request->email) {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['email' => "E-mail wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->password == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['password' => "Password wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->konfirmasi_password != $request->password) {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['konfirmasi_password' => "Konfirmasi password wajib sama dengan password"]
            );
            return response($returnData, 422);
        }

        $user = User::where('username', $request->username)->count();
        if ($user > 0) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Username sudah ada, silahkan menggunakan username yang lain'
            ], 402);
        }

        $create = User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'role'          => $request->role,
            'password'      => Hash::make($request->konfirmasi_password),
        ]);

        if ($create) {
            return response()->json([
                'status'    => 'success',
                'title'     => 'Berhasil',
                'message'   => 'Data Berhasil disimpan'
            ], 201);
        }

        return response()->json([
            'status'    => 'error',
            'title'     => 'Berhasil',
            'message'   => 'Something Wrong.'
        ], 400);
    }

    public function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user) {
            return response()->json([
                'status'    => 'success',
                'message'   => 'Data ditemukan.',
                'data'      => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Data tidak ditemukan.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Something Wrong.'
        ], 400);
    }

    public function update(Request $request)
    {
        if ($request->name == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['name' => "Nama wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->role == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['role' => "Role wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->username == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['username' => "Username wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->email != $request->email) {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['email' => "E-mail wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->konfirmasi_password != $request->password) {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['konfirmasi_password' => "Konfirmasi password wajib sama dengan password"]
            );
            return response($returnData, 422);
        }

        $user = User::where('id', $request->id)->first();

        if ($user) {
            $user->name      = $request->name;
            $user->role      = $request->role;
            $user->username  = $request->username;
            $user->email  = $request->email;
            if ($request->konfirmasi_password) {
                $user->password       = Hash::make($request->konfirmasi_password);
            }
            $user->updated_at   = Carbon::now();
            if ($user->save()) {
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Berhasil',
                    'message'   => 'Data Berhasil disimpan'
                ], 201);
            }
        } else {
            return response()->json([
                'status'    => 'error',
                'title'     => 'Gagal',
                'message'   => 'Data tidak ditemukan.'
            ], 200);
        }

        return response()->json([
            'status'    => 'error',
            'title'     => 'error',
            'message'   => 'Data gagal disimpan.'
        ], 400);
    }

    public function delete(Request $request)
    {
        $data = User::where('id', $request->id)->first();

        if ($data->delete()) {
            return response()->json([
                'status'    => 'success',
                'title'     => 'Berhasil',
                'message'   => 'Data berhasil dihapus'
            ], 201);
        }

        return response()->json([
            'status'    => 'error',
            'title'     => 'Gagal',
            'message'   => 'Something Wrong.'
        ], 400);
    }
}
