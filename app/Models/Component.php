<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
class Component extends Model
{
    use HasFactory;
    protected $table="components";
    protected $fillable=['title'];

    public function lists(){
    	return $this->hasMany(Section::class,'component_id','id');
    }
}
