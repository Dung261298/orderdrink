<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Tag;

class RegisterController extends Controller
{
    public function __construct()
    { 
        $categorys = Category::Where('isdelete',0)->get();
        $brands = Brand::Where('isdelete',0)->get();
        $tags = Tag::Where('isdelete',0)->get();
        view()->share(compact('categorys','brands','tags'));
    }

    public function index()
    {
        return view('client.login.register');
    }
}
