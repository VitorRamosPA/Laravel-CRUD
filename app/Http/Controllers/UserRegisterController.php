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
        return view('lista');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:50',
            'cpf' => 'required|numeric|unique:user_registers|',
            'rg' => 'required|numeric|unique:user_registers|',
            'nascimento' => 'required|date|max:50',
            'sexo' => 'required']);


        $post = new UserRegister;
        $post->nome = $request->nome;
        $post->cpf = $request->cpf;
        $post->rg = $request->rg;
        $post->nascimento = $request->nascimento;
        $post->sexo = $request->sexo;
        $post->save();
        return redirect('lista')->with('msg', 'Cadastrado com sucesso');
    }

    public function destroy($id)
    {
        UserRegister::query()->where('id', '=', $id)->delete();

        return redirect('lista')->with('alert', 'Excluído com sucesso');
    }
}
