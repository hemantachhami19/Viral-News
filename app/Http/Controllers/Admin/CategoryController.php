<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\AddFormValidation;
use App\Http\Requests\Category\EditFormValidation;
use App\Models\Category;
use CategoryLevel;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $base_route = 'admin.category';
    protected $view_path = 'admin.category';
    protected $panel = 'Category';
    protected $model;


    public function __construct()
    {
        $this->model = new Category();
    }

    //loads 'admin/category/index' from view folder
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model::paginate(8);
        return view(parent::loadDefaultDataToView($this->view_path .'.index'), compact('data'));
    }

    //loads 'admin/category/create' from view folder
    public function create()
    {
        $data['rows'] = Category::all();
        return view(parent::loadDefaultDataToView($this->view_path . '.create'),compact('data'));
    }


    public function store(AddFormValidation $request)
    {
        $request->request->add([
            'slug' => str_slug($request->get('title'))
        ]);
        $request->request->add(['parent_id' => CategoryLevel::first_level]);
        $this->model->create($request->all());
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

    public function edit(Request $request ,$id)
    {
        $data = [];
        $data['row'] = $this->model->findOrFail($id);
        $data['rows'] = Category::all();
        $this->model->update($request->all());
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data'));
    }


    public function update(EditFormValidation $request, $id)
    {
        $row = $this->model->find($id);
        $request->request->add([
            'slug' => str_slug($request->get('title')),
            'parent_id' => $request->get('parent_id')? $request->get('parent_id'):CategoryLevel::first_level
        ]);
        $row->update($request->all());
        $request->session()->flash('success_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }

    public function show($id)
    {
        $data = [];
        $row = $this->model->findOrFail($id);
        return view(parent::loadDefaultDataToView($this->view_path.'.show'), compact('row'));
    }

    public function delete(Request $request ,$id)
    {
        $row =$this->model->findOrFail($id);
        $row->delete();
        $request->session()->flash('success_message',$this->panel. "is successfully deleted");
        return redirect()->route('admin.category');
    }

}