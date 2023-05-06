<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'pedido';

    public $timestamps = false;

    protected $fillable = ['F_EMISION',
        'CLIENTE',
        'VEND',
        'IMPORTE',
        'DESCUENTO',
        'IMPUESTO',
        'PRECIO',
        'COSTO',
        'ALMACEN',
        'ESTADO',
        'OBSERV',
        'TIPO_CAM',
        'MONEDA',
        'DATOS',
        'DESGLOSE',
        'USUARIO',
        'USUFECHA',
        'USUHORA',
        'PEDCLI',
        'APLICARDES',
        'ENTREGA',
        'TIPO',
        'NO_PED',
        'COTIZAREMOTA',
        'OCUPADO',
    ];

    public function orderDetails()
    {
        return $this->hasMany(DetallePedido::class,'pedido', 'pedido');
    }
}
