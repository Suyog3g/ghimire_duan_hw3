<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','weight','height','abilities'];

    /**
     * The attributes that should be hidden for arrays and JSON output.
     *
     * @var array
     */
    protected $hidden = [];
}

