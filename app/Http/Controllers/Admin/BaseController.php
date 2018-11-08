<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{

    public function loadDefaultDataToView($view_path)
    {
        // Using Closure based composers...
        View::composer($view_path, function ($view) {
            $view->with('flash_message_path', 'admin.common.flash_messages');
            $view->with('_base_route', $this->base_route);
            $view->with('_view_path', $this->view_path);
            $view->with('_panel', $this->panel);
            $view->with('folder', property_exists($this, 'folder') ? $this->folder : '');
        });

        return $view_path;
    }



    //if folder does not exist then create new and give permission
    protected function createFolderIfNotExist($path)
    {
        if (!file_exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
    }
}