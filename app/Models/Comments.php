<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;


//This model is used to access the sweetwater_test table
class Comments extends Model
{
    protected $table = 'sweetwater_test';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderid', 'comments', 'shipdate_expected',
    ];

}
