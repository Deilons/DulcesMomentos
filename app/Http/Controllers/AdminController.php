<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    // admin panel
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }


    // Operarios
    public function indexOperarios()
    {
        $operarios = User::role('operario')->get();


        return Inertia::render('Admin/Operarios/Index', [
            'operarios' => $operarios,
        ]);
    }

    public function showOperario($id)
    {
        $operario = User::findOrFail($id);
        return Inertia::render('Admin/Operarios/Show', [
            'operario' => $operario,
        ]);
    }

    public function createOperario()
    {
        return Inertia::render('Admin/Operarios/Create');
    }

    public function editOperario($id)
    {
        $operario = User::findOrFail($id);
        return Inertia::render('Admin/Operarios/Edit', [
            'operario' => $operario,
        ]);
    }

    public function storeOperario(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('operario');

        return redirect()->route('admin.operarios.index')->with('success', 'Operario creado con éxito.');
    }

    public function updateOperario(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $operario = User::findOrFail($id);
        $operario->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.operarios.index')->with('success', 'Operario actualizado con éxito.');
    }

    public function destroyOperario($id)
    {
        $operario = User::findOrFail($id);
        $operario->delete();

        return redirect()->route('admin.operarios.index')->with('success', 'Operario eliminado con éxito.');
    }

    // Clientes
    public function indexClientes()
    {
        $clientes = Cliente::role('cliente')->get();
        return Inertia::render('Admin/Clientes/Index', [
            'clientes' => $clientes,
        ]);
    }

    public function createCliente()
    {
        return Inertia::render('Admin/Clientes/Create');
    }

    public function editCliente($id)
    {
        $cliente = User::findOrFail($id);
        return Inertia::render('Admin/Clientes/Edit', [
            'cliente' => $cliente,
        ]);
    }

    public function storeCliente(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('cliente');

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    public function updateCliente(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $cliente = User::findOrFail($id);
        $cliente->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroyCliente($id)
    {
        $cliente = User::findOrFail($id);
        $cliente->delete();

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }

    public function showCliente($id)
    {
        $cliente = User::findOrFail($id);
        return Inertia::render('Admin/Clientes/Show', [
            'cliente' => $cliente,
        ]);
    }
}
