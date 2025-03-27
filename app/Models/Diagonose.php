<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/*
 *  @Properties: $fillable: this array contains the database flieds that are mass assiged
 * @method: patients(): return an elequant relations of many to many
 *
 */

class Diagonose extends Model
{
    protected $fillable=[
        "title",
        "price"
    ];

    public function patients(){
        return $this->belongsToMany(Patient::class);
    }
    use HasFactory;
}
