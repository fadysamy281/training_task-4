<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Requests\SectionsRequest;
use App\Http\Traits\JSONTrait;
use Carbon\Carbon;
use App\Http\Traits\ImagesTrait;
use Illuminate\Support\Facades\File;
use App\Models\Component;

class SectionsController extends Controller
{
	  use JSONTrait,ImagesTrait;

	  public function index(){
	  	$sections=Section::all();
	  	//paginate(PAGINATION_COUNT);
	  	 
	  	/*return view('categories.index')->with(
	  		$this->returnData($categories,"all categories"));
	  	*/return $this->returnData($sections,"all sections");
	  }
    public function create(){
    	return view('sections.create');
    }
    public function store(SectionsRequest $request){
  	$file_name=null;
  	$section=Section::last();   
 	if($request->has('file') )
  	{	if(!$section)
  		$file_name=1;
  		else $file_name=$section->id + 1;
  		$file_name=$file_name.'.'.$request->file->getClientOriginalExtension();
  		$this->saveImage($file_name,$request->file,sections_path);
  	}
    	Section::create([
    		'title'=>$request->title,
    		'file'=>$file_name,
    		'description'=>$request->description,
            'component_id'=>$request->component_id,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("section created successfully.");
    } 
    public function destroy($id){
    	$section=Section::find($id);
    	if(!$section)
    	return $this->returnError("section does not exist");
        		File::delete(sections_path.$section->file);
		$section->delete();    		
    	return $this->returnSuccessMessage("section deleted successfully.");
    }    
    public function edit(){
    	return view('sections.edit');
    }
    public function update(SectionsRequest $request,$id){
    	$section=Section::find($id);
    	if(!$section)
    	return $this->returnError("section does not exist");
    	$file=sections_path.$section->file;
    	if($request->has('file')){
    		File::delete($file);
    		$photo_name=$section->id.'.'.$request->file->getClientOriginalExtension();
  		$this->saveImage($file_name,$request->file,sections_path);
 
    	}
    	$section->update([
    		'title'=>$request->title,
    		'file'=>$file_name,
    		'description'=>$request->description,
            'component_id'=>$rquest->component_id,
    		'updated_at'=>Carbon::now()]);
    	return $this->returnSuccessMessage("section updated successfully.");
    }    
}
