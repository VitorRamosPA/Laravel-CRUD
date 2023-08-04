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
            'nome' => 'required',
            'cpf' => 'required|unique:user_registers|',
            'rg' => 'required|unique:user_registers|',
            'nascimento' => 'required|date',
            'sexo' => 'required'],
            [
                'cpf.unique' => 'O CPF deve ser um valor único',
                'rg.unique' => 'O RG deve ser um valor único'
            ]);


        $post = new UserRegister;
        $post->nome = $request->nome;
        $post->cpf = $request->cpf;
        $post->rg = $request->rg;
        $post->nascimento = $request->nascimento;
        $post->sexo = $request->sexo;
        $post->save();
        return redirect('lista');
    }

    public function destroy($id)
    {
        UserRegister::query()->where('id', '=', $id)->delete();

        return redirect('lista');
    }
}
