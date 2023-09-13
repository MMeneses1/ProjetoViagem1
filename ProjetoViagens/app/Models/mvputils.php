<?php

namespace Insta;

use App\Models\Criptografia;
use App\Models\Model;
use Illuminate\Http\Request;

class MVPUtils {
    private $logado = false;
    private $credenciais;
    private $senha;

    public function login(Request $request) {
        $credencial = $request->input('user');
        $pass = Criptografia::md5($request->input('pass'));

        $qr = Model::execute("SELECT id FROM usuarios WHERE (usuario = ? or email = ? or telefone = ?) and senha = ?", [
            $credencial,
            $credencial,
            $credencial,
            $pass
        ]);
        if ($qr->count() > 0) {
            $_SESSION['id_user'] = $qr->list()->id;
            return true;
        } else {
            return false;
        }
    }

    public function register(Request $request) {
        $telefone = $request->input('telefone');
        $nome = $request->input('nome');
        $usuario = $request->input('usuario');
        $senha = $request->input('pass');

        $tipoCad = 'telefone';
        $email = '';
        if (strpos($telefone, '@')) {
            $tipoCad = 'email';
            $email = $telefone;
            $telefone = '';
        }

        $qr = Model::execute("INSERT INTO usuarios (nome, usuario, telefone, email, senha) VALUES (?,?,?,?,?)", [
            $nome,
            $usuario,
            $telefone,
            $email,
            $senha
        ]);

        if ($qr->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isOnline() {
        if (isset($_SESSION['id_user'])) {
            $this->logado = true;
        }
    }
}
