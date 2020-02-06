<?php

namespace App\Http\Controllers\Web;

use DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBY('name','asc')->paginate(10);

        return view('admin.master.user.index', compact('users'));
    }
    public function edit($id)
    {
        $users = User::find($id);

        return view('admin.master.user.edit', compact('users'));
    }
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        DB::beginTransaction();

        try {
            $users ->update([
                //kolom-di-tabel => inputan-user
                "name" =>$request->name,
                "username" =>$request->username,
                "email" =>$request->email,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            // dd($e);
        }
        return redirect()->route('user.index');

    }

    public function destroy($id)
    {
        // dd($id);
         $users = User::find($id);
         $users->delete();

        return redirect()->route("user.index");
    }
}
