<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product_category;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class CategoryAjaxController extends Controller
{
    public function index()
    {
        $data = Product_category::orderBy('nama_category', 'asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                return view('admin.pages.ajax-btn')->with('data',$data);
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
            'kode_category' => 'required',
            'nama_category' => 'required',
        ], [
            'kode_category.required' => 'Data wajib diisi',
            'nama_category.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'kode_category' => $request->kode_category,
                'nama_category' => $request->nama_category,
            ];
            Product_category::create($data);
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
        $data = Product_category::where('id', $id)->first();
        return response()->json(['result' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'kode_category' => 'required',
            'nama_category' => 'required',
        ], [
            'kode_category.required' => 'Data wajib diisi',
            'nama_category.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'kode_category' => $request->kode_category,
                'nama_category' => $request->nama_category,
            ];
            Product_category::where('id', $id)->update($data);
            return response()->json(['success' => "Berhasil melakukan update data"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product_category::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
