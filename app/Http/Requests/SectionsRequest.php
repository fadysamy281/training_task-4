<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string|min:3|max:50',
            'component_id'=>'required|integer|exists:components,id',
            'description'=>'nullable|text',
            //only photo or video
            'file'=>'required|mimes:jpg,png,jpeg,gif,svg,mp4,mov,ogg|max:40000',

                    ];
    }
        public function messages(){
        return [
            'title.required'=>' title is required.',
            'title.string'  =>' title should consist of valid characters.',
            'title.min'     =>' title can not have less than 3 characters.',
            'title.max'     =>'title name can not have more than 50 characters.',
            'description.text'  =>'provide valid text.',
            
            'file.required'  =>'provide valid image or file.',
            'file.mimes'   =>'provide valid photo or video(i.e,of extensions 
            : jpg,png,jpeg,gif,svg,mp4,mov,ogg)',
            'file.max'=>'max space for your file approximately 40 MB.'
            'component_id.required' =>' component is required.',
            'component_id.integer' =>'provide valid component .',
            'component_id.exists' =>'provide valid component .',

                   ];
    }
}
