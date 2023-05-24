<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function user()
    {
        $user = User::all();
        return view('admin.pages.users', compact('user'));
    }

    public function product()
    {
        $category = Product_category::orderBy('nama_category', 'asc')->get();
        return view('admin.pages.product', compact('category'));
    }
}
