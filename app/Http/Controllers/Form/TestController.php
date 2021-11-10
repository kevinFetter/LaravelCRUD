<?php

namespace App\Http\Controllers\Form;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //guarda numa variável todos os usuários da tabvela Users do DB
        $users = User::all();
        //Retorna pra view todos usuarios armazenados no DB
        return view('listAllUsers', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //persistir no DB
    public function store(Request $request)
    {
        //persistir no DB: Instancia o modelo, seta as propriedades faço o $user->save;
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        //dd($user);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('listUser', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

     //preciso retornar a visão, para isso faz a função:
    public function edit(User $user)
    {
        return view('editUser', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //meu modelo de usuario, na propriedade nome, vai receber o valor da requisicao do form feito anterior na posição "name"
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //var_dump($user);
        $user->delete();
        return redirect()->route('user.index');
    }
}
