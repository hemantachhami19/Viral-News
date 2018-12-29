<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class AddFormValidation extends FormRequest
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
        $this->customValidation();
        return [
            'title'=>'required|parent_unique',
            'status'=>'required|boolean',
        ];
    }

    public function messages()
    {
        return[
            'title.parent_unique'=>'Category with the same title already  in same category'
        ];
    }


    private function customValidation()
    {

        //Two slugs cannot be same under the same parent category but can be different across the different parent category
        Validator::extend('parent_unique', function($attribute,$value,$parameters,$validator){
            $categoryCount =Category::where('parent_id', \CategoryLevel::first_level)
                ->where('slug', str_slug($value))
                ->count();
            if ($categoryCount > 0)
                return false;
            return true;

        });
    }
}
