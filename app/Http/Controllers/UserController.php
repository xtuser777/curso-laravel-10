<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $users = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.user.pagination', compact('users'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrar(UserFormRequest $request)
    {
        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('user.index');
        }
        // mostrar os dados
        return view('pages.user.create');
    }

    public function atualizar(UserFormRequest $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('user.index');
        }
        $user = User::where('id', '=', $id)->first();

        return view('pages.user.update', compact('user'));
    }
}
