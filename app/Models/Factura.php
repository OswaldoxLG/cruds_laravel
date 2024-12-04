<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';

    protected $primarykey = 'id';

    protected $fillable = [
        'fecha_emision', 'emisor', 'receptor', 'importe_total'
    ];
}
