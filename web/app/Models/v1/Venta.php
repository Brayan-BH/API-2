<?php
 
namespace App\Models\v1;
 
use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Venta extends Model
{
    use HasUUID; 
    use SoftDeletes;
    
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $keyType = 'string';// convierte a entero
    protected $uuidFieldName = 'id';
}