<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Component;

class Section extends Model
{
    use HasFactory;
    protected $table="sections";
    protected $fillable=['title','file','description','component_id'];

    public function section(){
    	return $this->belongsTo(Component::class,'component_id','id');
    }}
