<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Product_category_detail;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductAjaxController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('product_name', 'asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                return view('admin.pages.ajax-btn-product')->with('data',$data);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'category_id' => 'required',
            'thumnail_name' => '',
        ], [
            'product_name.required' => 'Data wajib diisi',
            'price.required' => 'Data wajib diisi',
            'description.required' => 'Data wajib diisi',
            'stock.required' => 'Data wajib diisi',
            'weight.required' => 'Data wajib diisi',
            'category_id.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'description' => $request->description,
                'product_rate' => '0',
                'stock' => $request->stock,
                'weight' => $request->weight,
                'category_id' => $request->category_id,
                'thumnail_name' => ''
            ];
            Product::create($data);

            $product = Product::latest()->first()->id;

            $detail = new Product_category_detail;
            $detail->product_id = $product;
            $detail-> category_id = $request->category_id;
            $detail->save();

            return response()->json(['success' => "Berhasil menyimpan data"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::where('id', $id)->first();
        return response()->json(['result' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'weight' => 'required',
        ], [
            'product_name.required' => 'Data wajib diisi',
            'price.required' => 'Data wajib diisi',
            'description.required' => 'Data wajib diisi',
            'stock.required' => 'Data wajib diisi',
            'weight.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'description' => $request->description,
                'stock' => $request->stock,
                'weight' => $request->weight,
            ];
            Product::where('id', $id)->update($data);
            return response()->json(['success' => "Berhasil melakukan update data"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
