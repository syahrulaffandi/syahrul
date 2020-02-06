<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class productcontroller extends Controller
{
	public function index()
	{
    		// mengambil data dari table pegawai
		$pegawai = DB::table('users')->paginate(10);

    		// mengirim data pegawai ke view index
		return view('admin.master.user.index',['users' => $pegawai]);

	}

	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('users')
		->where('name','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('admin.master.user.index',['users' => $pegawai]);

	}

}