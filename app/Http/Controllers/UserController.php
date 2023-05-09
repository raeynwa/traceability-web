<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

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
                    $btn = '
                    <div class="btn-group">
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->name . '" data-original-title="Reset" title="Reset" class="btn btn-sm btn-primary btnReset">
                            <i class="fas fa-lock"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->name . '" data-original-title="Edit" title="Edit" class="btn btn-sm btn-warning btnEdit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->name . '" data-original-title="Hapus" title="Hapus" class="btn btn-sm btn-danger btnHapus">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>';
                    return $btn;
                })
                ->make(true);
        }
        $header = "Data User";
        return view('pages.user.index', compact('header'));
    }
}
