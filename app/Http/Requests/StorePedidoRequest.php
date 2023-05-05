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
            'vend' => '',
            'importe' => 'decimal:2',
            'descuento' => 'integer',
            'impuesto' => 'integer',
            'precio' => 'integer',
            'costo' => 'integer',
            'almacen' => 'integer',
            'estado' => '',
            'observ' => '',
//            'tipo_cam' => '',
            'moneda' => '',
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
            'ocupado' => 'integer'
        ];
    }
}
