<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Models\API\V1\DetallePedido;
use App\Models\API\V1\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoRequest $request)
    {
        $attributes = $request->validated();
        $currentDateTime = date('Y-m-d H:i:s');
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');
        $usuario = $attributes['usuario'];

        $orderData = [
            'F_EMISION' => $attributes['F_EMISION'] ?? $currentDateTime,
            'CLIENTE' => $attributes['cliente'],
            'VEND' => $attributes['vend'],
            'IMPORTE' => $attributes['importe'],
            'DESCUENTO' => $attributes['descuento'],
            'IMPUESTO' => $attributes['impuesto'],
            'PRECIO' => $attributes['precio'],
            'COSTO' => $attributes['costo'],
            'ALMACEN' => $attributes['almacen'],
            'ESTADO' => $attributes['estado'] ?? 'PE',
            'OBSERV' => 'Pedido App' . $attributes['observ'],
            'TIPO_CAM' => $attributes['tipo_cam'] ?? 2,
            'MONEDA' => $attributes['moneda'],
            'DATOS' => $attributes['datos'],
            'DESGLOSE' => $attributes['desglose'],
            'USUARIO' => $usuario,
            'USUFECHA' => $attributes['usufecha'] ?? $currentDateTime,
            'USUHORA' => $attributes['usuhora'] ?? $currentTime,
            'PEDCLI' => $attributes['pedcli'],
            'APLICARDES' => $attributes['aplicardes'],
            'ENTREGA' => $attributes['entrega'],
            'TIPO' => $attributes['tipo'] ?? 'PE',
            'NO_PED' => $attributes['no_ped'],
            'COTIZAREMOTA' => $attributes['cotizaremota'],
            'OCUPADO' => $attributes['ocupado'],
        ];

        $order = Pedidos::create($orderData);
        $importeTotal = 0;
        foreach ($request->input('products') as $product) {
            $orderDetail = new DetallePedido([
                'pedido' => $order->PEDIDO,
                'ARTICULO' => $product['articulo'],
                'CANTIDAD' => $product['cantidad'],
                'POR_SURT' => $product['por_surt'] ?? 1,
                'PRECIO' => $product['precio'],
                'DESCUENTO' => $product['descuento'] ?? '',
                'IMPUESTO' => $product['impuesto'] ?? 0,
                'OBSERV' => $product['observ'] ?? "",
                'Usuario' => $usuario,
                'UsuFecha' => $product['usufecha'] ?? $currentDateTime,
                'UsuHora' => $product['usuhora'] ?? $currentTime,
                'Almacen' => $product['almacen'] ?? 1,
                'Lista' => $product['lista'] ?? 0,
            ]);

            $order->orderDetails()->save($orderDetail);

            $importeTotal += $orderDetail->CANTIDAD * $orderDetail->PRECIO;
        }

        $order->update(['IMPORTE' => $importeTotal]);

        return response()->json(['data' => $order]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
