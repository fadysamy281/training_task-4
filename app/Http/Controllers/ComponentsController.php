<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
use App\Http\Requests\ComponentsRequest;
use App\Http\Traits\JSONTrait;
use Carbon\Carbon;

class ComponentsController extends Controller
{
    	  use JSONTrait;
	  public function index(){
	  	$components=Component::paginate(PAGINATION_COUNT);
	  	//paginate(PAGINATION_COUNT);
	  	 
	  	/*return view('categories.index')->with(
	  		$this->returnData($categories,"all categories"));
	  	*/return $this->returnData($components,"all component");
	  }
    public function create(){
    	return view('components.create');
    }
    public function store(ComponentsRequest $request){
    	Component::create([
    		'title'=>$request->title,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("component created successfully.");
    }
    public function destroy($id){
    	$component=Component::find($id);
    	if(!$component)
    	return $this->returnError("component does not exist");
		$component->delete();    		
    	return $this->returnSuccessMessage("component deleted successfully.");
    }    
    public function edit(){
    	return view('components.edit');
    }
    public function update(ComponentsRequest $request,$id){
    	$component=Component::find($id);
    	if(!$component)
    	return $this->returnError("component does not exist");

    	$component->update([
    		'name'=>$request->name,
    		'description'=>$request->description,    		
    		'updated_at'=>Carbon::now()]);
    	return $this->returnSuccessMessage("component updated successfully.");
    }
}
