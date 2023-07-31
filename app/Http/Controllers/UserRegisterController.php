<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserRegister;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserRegisterController extends Controller
{
    public function index(UserRegister $userRegister)
    {
        $userRegisters = $userRegister->all();
        return view('lista', compact('userRegisters'));
    }
    public function inicio()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $post = new UserRegister;
        $post->nome = $request->nome;
        $post->cpf = $request->cpf;
        $post->rg = $request->rg;
        $post->nascimento = $request->nascimento;
        $post->sexo = $request->sexo;
        $post->save();
        return redirect('dashboard')->with('status', 'Cadastrado com sucesso');
    }

    public function update(Request $request)
    {

    }
}