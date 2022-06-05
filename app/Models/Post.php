<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //? Definiamo i fill con protected $fillable
    protected $fillable = ['title','content','slug','image'];

    public function getFormatteDate($column,$format ='d-m-Y H:i:s'){
return Carbon::create($this->$column)->format($format);
    }
}
//$post->getFormatteDate('created_at');
