<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\search;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $users = DB::table('users')->get();
        $search = $request->input('search');
        $data = User::query();

        if ($search) {
            $data->where('name', 'like', '%' .$search. '%');
        }

        $data = $data->latest()->paginate(10);

        return view('user.index', [
            'data' => $data,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'username' => 'required|min:2|max:255',
            'password' => 'required|min:4|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('user')->with('status', 'tambah user berhasil');
    }

    /**
     * 
     * Display the specified resource.
     */
    public function show($id)
    {
        $ubahuser = DB::table('users')->where('id', $id)->first();

        if(!$ubahuser) {
            return redirect('user')->withErrors('Data User Tidak Temukan');
        }

        return view('user.edit', compact('ubahuser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'username' => 'required|min:2|max:255',
            'password' => 'required|min:4|max:255',

        ]);

        DB::table('users')->where('id', $id)
            ->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);
        return redirect('user')->with('status', 'Edit User Berhasil !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('user')->with('delete', 'Hapus Data User Berhasil !!');
    }
}