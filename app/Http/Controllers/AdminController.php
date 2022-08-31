<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    protected string $nome;
    protected string $senha;

    protected function resgatarDados(Request $request)
    {
        if ($request->has('nome') && $request->has('senha')) {
            $this->nome = $request->input('nome');
            $this->senha = $request->input('senha');
            return true;
        } else {
            return false;
        }
    }

    protected function validarDados()
    {
        if (Admin::where('nome', '=', $this->nome)->where('senha', '=', $this->senha)->exists()) {
            return true;
        } else {
            return false;
        }
    }

    protected function criarSessao()
    {
        session([
            'nome' => $this->nome
        ]);
    }

    protected function efetuarLogin(Request $request)
    {
        if ($this->resgatarDados($request) && $this->validarDados()) {
            $this->criarSessao();
            return redirect('/master/principal'); 
        } else {
            return view("/master", ['erro' => 'Dados incorretos!']);
        }
    }

    protected function destruirLogin() {
        
    }

}
