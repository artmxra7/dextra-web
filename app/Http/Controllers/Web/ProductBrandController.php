<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductBrandRepository;
use App\ProductBrandModel;
use DataTables;

class ProductBrandController extends Controller
{

    protected $prodBrandRepo;

    public function __construct( ProductBrandRepository $prodBrandRepo)
    {
        $this->prodBrandRepo = $prodBrandRepo;
    }

    public function json(){
        $result = $this->prodBrandRepo->getBrand();

        $data = collect($result);

        return DataTables::of($data)->addColumn('aksi',
        function ($data){

        })
        ->addColumn('none', function ($data){
            return '-';
        })
        ->rawColumns(['aksi', 'confirmed'])
        ->make(true);
    }

    public function index()
    {
        //
        return view('product_brand.index');
    }


    public function create()
    {
        //

        $breadcrumb['product-brand'] = 'Product Brand';
        $breadcrumb['!end!'] = 'Create Product Brand';

        return view('product_brand.create', compact('breadcrumb'));
    }


    public function store(Request $request)
    {
        //

        $req = $request->all();

        $prodcat = new ProductBrandModel;
        $prodcat->product_brands_code = generateFiledCode('BRANDS');
        $prodcat->product_brands_name = $request->input('name');

        $prodcat->save();

        return redirect()->route('product-brands.index')
        ->with('succes', 'Product Brand created Succesfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
