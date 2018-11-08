<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Tag\AddFormValidation;
use App\Http\Requests\Tag\EditFormValidation;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    protected $base_route = 'admin.tag';
    protected $view_path = 'admin.tag';
    protected $panel = 'Tag';
    protected $model;


    public function __construct()
    {
        $this->model = new Tag();
    }

    //loads 'admin/tag/index' from view folder
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model::paginate(8);
        return view(parent::loadDefaultDataToView($this->view_path .'.index'), compact('data'));
    }

    //loads 'admin/tag/create' from view folder
    public function create()
    {
        $data['rows'] = Tag::all();
        return view(parent::loadDefaultDataToView($this->view_path . '.create'),compact('data'));
    }


    public function store(AddFormValidation $request)
    {
        $request->request->add([
            'slug' => str_slug($request->get('title'))
        ]);
        $this->model->create($request->all());
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

    public function edit(Request $request ,$id)
    {
        $data = [];
        $data['row'] = $this->model->findOrFail($id);
        $this->model->update($request->all());
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data'));
    }


    public function update(EditFormValidation $request, $id)
    {
        $row = $this->model->find($id);
        $request->request->add([
            'slug' => str_slug($request->get('title'))
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
        return redirect()->route('admin.tag');
    }

}