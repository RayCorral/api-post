<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $table = 'pedpar';
    protected $primaryKey = 'ID_SALIDA';
    public $timestamps = false;

    protected $fillable = ['pedido',
        'ARTICULO',
        'CANTIDAD',
        'POR_SURT',
        'PRECIO',
        'DESCUENTO',
        'IMPUESTO',
        'OBSERV',
        'Usuario',
        'UsuFecha',
        'UsuHora',
        'Almacen',
        'Lista',
    ];

    public function order()
    {
        return $this->belongsTo(Pedidos::class, 'pedido');
    }
}
