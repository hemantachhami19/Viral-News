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

    private function customValidation()
    {
        Validator::extend('parent_unique', function($attribute,$value,$parameters,$validator){
            $categoryCount =Category::where('parent_id', 0)
                ->where('slug', str_slug($value))
                ->where('id', '!=', $this->request->get('id'))
                ->count();
            if ($categoryCount > 0)
                return false;
            return true;

        });
    }
}
