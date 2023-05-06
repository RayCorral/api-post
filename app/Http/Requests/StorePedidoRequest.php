<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'f_emision' => 'date',
            'cliente' => 'required',
            'vend' => 'max:15',
            'importe' => 'decimal:2',
            'descuento' => 'numeric',
            'impuesto' => 'numeric',
            'precio' => 'size:1',
            'costo' => 'numeric',
            'almacen' => 'numeric',
            'estado' => 'max:2',
            'observ' => '',
//            'tipo_cam' => '',
            'moneda' => 'max:5',
            'datos' => '',
            'desglose' => 'integer',
            'usuario' => '',
            'usufecha' => 'date',
//            'usuhora' => '',
            'pedcli' => '',
            'aplicardes' => 'integer',
            'entrega' => 'date',
//            'tipo' => '',
            'no_ped' => 'integer',
            'cotizaremota' => 'integer',
            'ocupado' => 'integer',
            'products' => 'required|array',
            'products.*.articulo' => 'required|max:15',
            'products.*.cantidad' => 'required|integer',
            'products.*.precio' => 'numeric',
            'products.*.descuento' => 'numeric',
            'products.*.por_surt' => 'numeric',
            'products.*.impuesto' => 'numeric',
            'products.*.observaciones' => 'max:255',
            'products.*.usuario' => 'max:50',
            'products.*.usuario_fecha' => 'date',
//            'products.*.usuario_hora' => '',
            'products.*.alamcen' => 'integer',
            'products.*.lista' => 'integer',


        ];
    }
}
