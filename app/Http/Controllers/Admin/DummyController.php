<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function index()
    {
        $menu = ucwords(str_replace('_', ' ', last(explode('/', request()->path()))));
        return view('admin.dummy', compact('menu'));
    }
}
