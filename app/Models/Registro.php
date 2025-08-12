<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable =[
        'sensor_id',
        'valor',
        'unidade',
        'data_hora'
    ];

    protected $casts = [
    'data_hora' => 'datetime'
    ]; // garante que a conversão do banco seja do tipo date_time

   public function sensor(){
    return $this->belongsTo(Sensor::class);
   }
}
