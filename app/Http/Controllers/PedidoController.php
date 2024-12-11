<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with('cliente')->get();
        return response()->json($pedidos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Formulario de creación no disponible en la API.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validatePedido($request);

        $pedido = Pedido::create($validated);

        return response()->json($pedido, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $pedido = Pedido::with('cliente')->findOrFail($id);
            return response()->json($pedido);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Pedido no encontrado.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(['message' => 'Formulario de edición no disponible en la API.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validatePedido($request, $id);

        try {
            $pedido = Pedido::findOrFail($id);
            $pedido->update($validated);

            return response()->json($pedido);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Pedido no encontrado o no se pudo actualizar.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pedido = Pedido::findOrFail($id);
            $pedido->delete();

            return response()->json(['message' => 'Pedido eliminado con éxito.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Pedido no encontrado o no se pudo eliminar.'], 404);
        }
    }

    /**
     * Validate Pedido data.
     */
    private function validatePedido(Request $request, $id = null)
    {
        return $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'detalles' => 'required|string',
            'estado' => 'required|in:pendiente,completado',
            'prioridad' => 'nullable|integer|min:1',
            'fecha_entrega' => 'required|date',
        ]);
    }
}
