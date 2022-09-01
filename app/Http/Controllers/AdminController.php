<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

/**
 * Classe responsável por validar e efetuar o login do administrador e destruí-la ao finalizar a sessão.
 */
class AdminController extends Controller
{
    /**
     * Propriedade responsável por armazenar o nome do responsável.
     *
     * @var string
     */
    protected string $nome;

    /**
     * Propriedade responsável por armazenar a senha do responsável.
     *
     * @var string
     */
    protected string $senha;

    /**
     * Propriedade responsável por atribuir a request de dados vindos do formulário 'formAdmin'.
     *
     * @var mixed
     */
    protected mixed $request;

    /**
     * Método responsável por validar dados vindos do formulário 'formAdmin'.
     *
     * @return void
     */
    protected function validarDados()
    {
        if ($this->request->filled('nome') && $this->request->filled('senha')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método responsável por validar os dados do formulário e atribuir as propriedades.
     *
     * @param Request $request
     * @return void
     */
    protected function atribuirDados()
    {
        $this->nome = $this->request->input('nome');
        $this->senha = $this->request->input('senha');
    }

    /**
     * Método responsável por validar os dados na tabela 'admin'.
     *
     * @return boolean
     */
    protected function validarDadosBanco()
    {
        if (Admin::where('nome', '=', $this->nome)->where('senha', '=', $this->senha)->exists()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método responsável por criar a sessão do administrador.
     *
     * @return void
     */
    protected function criarSessao()
    {
        session([
            'nome' => $this->nome
        ]);
    }

    /**
     * Método responsável por efetuar o login do usuário e redirecioná-lo para a página principal da área de administração.
     *
     * @param Request $request
     * @return view
     */
    protected function efetuarLogin(Request $request)
    {
        $this->request = $request;

        if ($this->validarDados()) {
            $this->atribuirDados();
            if ($this->validarDadosBanco()) {
                $this->criarSessao();
                return redirect('/master/principal'); 
            } else {
                return view("/master", ['erro' => 'Administrador não existe!']);
            }
        } else {
            return view("/master", ['erro' => 'Preencha todos os campos corretamente!']);
        }
    }

    /**
     * Método responsável por destruir o login do usuário e redirecioná-lo para página principal do site.
     *
     * @return view
     */
    protected function destruirLogin() {
        session()->flush();
        return redirect('/master');
    }
}
