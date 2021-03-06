<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Alert;
use Exception;
use Facade\FlareClient\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\User::paginate(10);

        return View('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $new_user = new \App\User;
            $new_user->name = $request->get('name');
            $new_user->username = $request->get('username');
            $new_user->roles = json_encode([$request->get('roles')]);
            $new_user->address = $request->get('address');
            $new_user->phone = $request->get('phone');
            $new_user->email = $request->get('email');
            $new_user->password = \Hash::make($request->get('password'));

            if ($request->file('avatar')) {
                $file = $request->file('avatar')->store('avatars', 'public');

                $new_user->avatar = $file;
            }

            $new_user->save();

            return response()->json([
                'status' => 'true',
                'message' => 'Inserted successfully',
                'data' => $new_user
            ]);
        } catch (Exception  $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'Inserted unsuccessfully',
                'data' => $e
            ]);
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
