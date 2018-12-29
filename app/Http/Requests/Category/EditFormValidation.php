<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class EditFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     *
     */
    public function rules()
    {
        $this->customValidation();
        return [
            'title' => 'required|parent_unique',
            'status' => 'required|boolean',
            'parent_id' => 'same_parent',
        ];
    }

    private function customValidation()
    {
        //Two slugs cannot be same under the same parent category but can be different across the different parent category
        Validator::extend('parent_unique', function ($attribute, $value, $parameters, $validator) {
            $categoryCount = Category::where('parent_id', 0)
                ->where('slug', str_slug($value))
                ->where('id', '!=', $this->request->get('id'))
                ->count();
            if ($categoryCount > 0)
                return false;
            return true;

        });

        Validator::extend('same_parent', function ($attribute, $value, $parameters, $validator) {
             if($this->get('id')){
                 if($category = Category::find($this->id)){
                     if($category->id == $category->parent_id){
                         return false;
                     }
                 };
                 return true;
             }
        });
    }

    public function messages()
    {
        return [
            'title.parent_unique' => 'Category with the same title already  in same category',
            'parent_id.same_parent' => 'Category cannot be it own parent. Please choose another category'
        ];
    }
}
