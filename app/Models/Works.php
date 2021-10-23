<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;

    protected $works = 'works';
    public $timestamps = true;
    protected $fillable = [
        'title','starting_date','ending_date'
    ];
}
