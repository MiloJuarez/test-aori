<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = collect([]);
        $errors = collect([]);
        $search = '';
        if ($request->has('search') && empty($request->search) == false) {
            $validator = Validator::make(
                $request->all(),
                ['search' => 'string|max:50'],
                [
                    'search.max' => 'The search value must not be greater than :max characters'
                ]
            );
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
            } else {
                $search = $request->search;
                $users = User::where('nombre', 'like', "%{$search}%")->orWhere('apellido', 'like', "%{$search}%")->get();
            }
        } else {
            $users = User::all();
        }
        return view('pages.user.index', compact('users', 'errors', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hideSF = true;
        return view('pages.user.create', compact('hideSF'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $hideSF = true;
        return view('pages.user.edit', compact('user', 'hideSF'));
    }
}
