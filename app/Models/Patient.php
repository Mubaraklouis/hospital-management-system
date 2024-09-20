<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /*
     *  @Properties: $fillable: this array contains the database flieds that are mass assiged
     * @method: diagonoses(): return an elequant relations of many to many
     *
     */
    protected $fillable=[
        "name",
        "age",
        "phone",
        "gender"
    ];

    //creating a relationship for patients and diagonoses
    public function diagonoses(){
        return $this->belongsToMany(Diagonose::class);
    }

//search for a patient in the database
    public function scopeFilter($query)
    {
        //check if the user try to search for a product
        if (request('search')) {
                Patient::where('name', 'like', '%' . request('search') . '%')->with(['diagonose']);
            }
        }




    use HasFactory;

}
