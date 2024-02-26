<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class UserController extends Controller
{
    public function yajrabox_datatable(){
        if(request()->ajax()){
            return DataTables::eloquent(User::query())->make(true);

        }
        return view('yajra_datatable.data_table');
    }
}
