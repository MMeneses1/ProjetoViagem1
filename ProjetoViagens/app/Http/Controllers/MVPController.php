<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class MVPController extends Controller
{
    
    public function showLoginForm()
    {
        return view('insta.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redirecionar para a página de perfil
            return redirect()->route('perfil')->with('login_success', true);
        } else {
            // Autenticação falhou, redirecionar de volta para a página de login com uma mensagem de erro
            return redirect()->route('login')->with('error', 'Credenciais inválidas. Tente novamente.');
        }
    }

    public function perfil()
    {
        if (Auth::check()) {
            $usuario = Auth::user();
            return view('insta.perfil', compact('usuario'));
        } else {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar o perfil.');
        }
    }



    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:usuarios',
            'nome' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $usuario = new Usuario([
            'email' => $request->input('email'),
            'nome' => $request->input('nome'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($usuario->save()) {
            return redirect()->route('insta.login')->with('success', 'Registro realizado com sucesso!');
        } else {
            return back()->withInput()->with('error', 'Erro durante o registro. Tente novamente.');
        }
    }



}
