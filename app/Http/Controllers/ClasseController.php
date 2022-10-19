<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Classe;

/**
 * Classe responsável por efetuar o CRUD das classes.
 */
class ClasseController extends Controller
{
    /**
     * Atributo responsável por armazenar o nome da classe.
     *
     * @var string
     */
    public string $nome;

    /**
     * Atributo responsável por armazenar a cor da classe.
     *
     * @var string
     */
    public string $cor;

    /**
     * Atributo responsável por armazenar a imagem da classe.
     *
     * @var string
     */
    public string $imagem;

    /**
     * Atributo responsável por armazenar a request de dados vindas do formulário 'formClasse'.
     *
     * @var Request
     */
    public Request $request;

    /**
     * Método responsável por validar os dados enviados.
     *
     * @return boolean
     */
    public function validarDados(): bool
    {
        if ($this->request->filled('nome') && $this->request->filled('cor') && $this->request->hasFile('imagem') ) {
            $this->atribuirDados();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método responsável por atribuir valores aos atributos.
     *
     * @return void
     */
    public function atribuirDados(): void
    {
        $this->nome = $this->request->get('nome');
        $this->cor = $this->request->get('cor');
        $this->imagem = $this->tratarNomeImagem();
    }

    /**
     * Método responsável por tratar o nome da imagem enviada.
     *
     * @return string
     */
    public function tratarNomeImagem (): string
    {
        return Str::random(40) . "." . $this->request->file('imagem')->extension();
    }

    /**
     * Método responsável por verificar se a classe existe no banco.
     *
     * @return boolean
     */
    public function verificarSeClasseExiste (): bool
    {
        return Classe::where('nome', '=', $this->nome)->exists();
    }

    /**
     * Método responsável por salvar o arquivo no diretório de imagens das classes: '/storage/app/public/imagens/classes/'.
     *
     * @return void
     */
    public function salvarArquivo(): void
    {
        $this->request->file('imagem')->storeAs('classes', $this->imagem, 'imagens');
    }

    /**
     * Método responsável por salvar os dados na tabela 'classes'.
     *
     * @return boolean
     */
    public function salvarClasse(): bool
    {
        $classe = Classe::create([
            'nome' => $this->nome,
            'cor' => $this->cor,
            'imagem' => $this->imagem
        ]);

        return $classe->save();
    }

    /**
     * Método responsável por efetuar o cadastro da classe.
     *
     * @param Request $request
     * @return void
     */ 
    public function cadastrarClasse(Request $request): \Illuminate\View\View
    {
        $this->request = $request;
        if ($this->validarDados()) {
            if (! $this->verificarSeClasseExiste()) {
                $this->atribuirDados();
                $this->salvarArquivo();
                if ($this->salvarClasse()) {
                    return view('masterClassesCadastrar', ['sucesso' => 'Classe salva com sucesso.', 'tituloFerramenta' => 'Classes']);
                } else {
                    return view('masterClassesCadastrar', ['erro' => 'Erro ao salvar classe.', 'tituloFerramenta' => 'Classes']);
                }
            } else {
                return view('masterClassesCadastrar', ['erro' => 'Essa classe já existe no sistema.', 'tituloFerramenta' => 'Classes']);
            }
        } else {
            return view('masterClassesCadastrar', ['erro' => 'Insira os dados corretamente.', 'tituloFerramenta' => 'Classes']);
        }
    }

    /**
     * Método responsável por deletar o res=gistro da classe.
     *
     * @return void
     */
    public function deletarClasse(Request $request): \Illuminate\View\View
    {
        if (Classe::where('id', '=', $request->codigo)->delete()) {
            return view('masterClasses', ['tituloFerramenta' => 'Classes', 'classes' => Classe::all()]);
        }
    }

    public function redirecionarEditar(Request $request)
    {
        $dadosClasse = Classe::where('id', '=', $request->codigo)->get()->toArray();
        print_r($dadosClasse);
        // return view('masterClassesEditar', ['dados' => $dadosClasse]);
    }
}
