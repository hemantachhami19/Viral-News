<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Post\AddFormValidation;
use App\Http\Requests\Post\EditFormValidation;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use CategoryLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController
{
    protected $base_route = 'admin.post';
    protected $view_path = 'admin.post';
    protected $panel = 'Post';
    protected $folder = 'post';
    protected $model;
    protected $folder_path;



    public function __construct()
    {
        $this->model = new Post();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder.DIRECTORY_SEPARATOR;
    }

    //loads 'admin/post/index' from view folder
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model::paginate(8);
        return view(parent::loadDefaultDataToView($this->view_path .'.index'), compact('data'));
    }

    //loads 'admin/post/create' from view folder
    public function create()
    {
        $data['rows'] = Category::all();
        return view(parent::loadDefaultDataToView($this->view_path . '.create'),compact('data'));
    }


    public function store(AddFormValidation $request)
    {
        $post = $this->createPost($request);
        dd($post);
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

    public function edit(EditFormValidation $request ,$id)
    {
        $data = [];
        $data['row'] = $this->model->findOrFail($id);
        $data['rows'] = Post::all();
        $this->model->update($request->all());
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data'));
    }


    public function update(Request $request, $id)
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
        return redirect()->route('admin.post');
    }

    private function createPost($request)
    {
        $file_name = null;
        if ($request->hasFile('main_image')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('main_image');
            $file_name = rand(0000, 9998) . '_' . $file->getClientOriginalName();
            $file->move($this->folder_path, $file_name);
        }

        $post = new Post();
        $post->title = $request->get('title');
        $post->slug =  str_slug($request->get('title'));
        $post->summary =  $request->get('summary');
        $post->category_id =  $request->get('category_id');
        $post->details =  $request->get('details');
        $post->status =  $request->get('status');
        $post->submitted_date = Carbon::now();
        $post->published_date = $request->get('published_date');
        $post->main_image  = $request->get('main_image');
        $post->user_id = Auth::user()->id;
        $post->save();
        return $post;
    }


}