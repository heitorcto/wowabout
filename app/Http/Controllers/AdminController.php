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
     * Atributo responsável por armazenar o nome do administrador.
     *
     * @var string
     */
    protected string $nome;

    /**
     * Atributo responsável por armazenar a senha do administrador.
     *
     * @var string
     */
    protected string $senha;

    /**
     * Atributo responsável por atribuir a request de dados vindos do formulário 'formAdmin'.
     *
     * @var Request
     */
    protected Request $request;

    /**
     * Método responsável por validar dados vindos do formulário 'formAdmin'.
     *
     * @return bool
     */
    protected function validarDados(): bool
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
    protected function atribuirDados(): void
    {
        $this->nome = $this->request->input('nome');
        $this->senha = $this->request->input('senha');
    }

    /**
     * Método responsável por validar os dados na tabela 'admins'.
     *
     * @return bool
     */
    protected function validarDadosBanco(): bool
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
    protected function criarSessao(): void
    {
        session([
            'nome' => $this->nome
        ]);
    }

    /**
     * Método responsável por efetuar o login do usuário e redirecioná-lo para a página principal da área de administração.
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    protected function efetuarLogin(Request $request): \Illuminate\Routing\Redirector|\Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        $this->request = $request;

        if ($this->validarDados()) {
            $this->atribuirDados();
            if ($this->validarDadosBanco()) {
                $this->criarSessao();
                return redirect('/master/principal'); 
            } else {
                return view("masterLogin", ['erro' => 'Administrador não existe!']);
            }
        } else {
            return view("masterLogin", ['erro' => 'Preencha todos os campos corretamente!']);
        }
    }

    /**
     * Método responsável por destruir o login do usuário e redirecioná-lo para página principal do site.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destruirLogin(): \Illuminate\Http\RedirectResponse
    {
        session()->flush();
        return redirect('/master');
    }
}
