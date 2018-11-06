<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends BaseController
{
    protected $base_route = 'admin.category';
    protected $view_path = 'admin.category';
    protected $panel = 'Category';
    protected $model;


    public function __construct()
    {
        $this->model = new Category();
        $this->folder_path_category = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . "category" . DIRECTORY_SEPARATOR;
        $this->main_image_dimensions = config('broadway.image_dimensions.product.main_image');
        $this->gallery_image_dimensions = config('broadway.image_dimensions.product.gallery_image');
    }

    //loads 'admin/category/index' from view folder
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model::all();
        return view(parent::loadDefaultDataToView($this->view_path .'.index'), compact('data'));
    }

    //loads 'admin/category/create' from view folder
    public function create()
    {
        $data['categories'] = Category::all();
        return view(parent::loadDefaultDataToView($this->view_path . '.create'),compact('data'));
    }


    public function store( $request)
    {
        $request->request->add([
            'slug' => str_slug($request->get('title'))
        ]);
        $this->model->create($request->all());

        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

    public function edit($id)
    {
        $data = [];
        $data['row'] = $this->model->findOrFail($id);
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('data'));
    }


    public function update(EditFormValidations $request, $id)
    {
        $row = $this->model->find($id);
        $request->request->add([
            'slug' => str_slug($request->get('title'))
        ]);
        $row->update($request->all());
        $request->session()->flash('success_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }
//
//
//    /*Cascade delete
//    Deleting category needs all products ,tags and all associated images
//    */
//    public function delete(Request $request, $id)
//    {
//        $row = $this->model->find($id);
//
//        //Getting all the products belonging to particular category
//        $products = Product::where('category_id', $row->id)->get();
//
//        //Unlinking th main image  and detaching the necessary tags
//        foreach ($products as $product) {
//            $product->tags()->detach();
//            if ($product->main_image) {
//                if (file_exists($this->folder_path_category . $product->main_image))
//                    unlink($this->folder_path_category . $product->main_image);
//
//                foreach ($this->main_image_dimensions as $dimension) {
//
//                    $d = $dimension['width'] . '_' . $dimension['height'] . '_';
//                    if (file_exists($this->folder_path_category . $d . $product->main_image))
//                        unlink($this->folder_path_category . $d . $product->main_image);
//                }
//            }
//
//            //unlinking the gallery image and deleting the gallery
//            $product_galleries = ProductGallery::where('product_id', $product->id)->get();
//            if ($product_galleries->count() > 0) {
//
//                foreach ($product_galleries as $gallery) {
//
//                    if ($gallery->image) {
//
//                        if (file_exists($this->folder_path_category . $gallery->image))
//                            //dd($this->folder_path . $gallery->image);
//                            unlink($this->folder_path_category . $gallery->image);
//
//                        foreach ($this->gallery_image_dimensions as $dimension) {
//
//                            $d = $dimension['width'] . '_' . $dimension['height'] . '_';
//                            if (file_exists($this->folder_path_category . $d . $gallery->image))
//                                unlink($this->folder_path_category . $d . $gallery->image);
//
//                        }
//
//                    }
//
//                    $gallery->delete();
//                }
//
//
//            }
//
//
//        }
//
//        $row->delete();
//        return redirect()->route($this->base_route);
//
//    }
//

    public function show($id)
    {
        $data = [];
        $row = $this->model->find($id);
        return view(parent::loadDefaultDataToView($this->view_path.'.show'), compact('row'));
    }

}