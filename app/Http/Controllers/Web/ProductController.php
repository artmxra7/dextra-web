<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Product;
use App\ProductBrandModel;
use App\ProductUnitModel;
use DataTables;
use Validator;

class ProductController extends Controller
{

    protected $productRepo;

    public function __construct( ProductRepository $productRepo )
    {
        $this->productRepo = $productRepo;
    }

    public function json(){

        $result = $this->productRepo->getProduct();

        //  dd($result);

        $data = collect($result);
        return DataTables::of($data)->addColumn('aksi', function ($data) {
            // return  '<div class="btn-group">'.
            //          '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
            //          '<label class="fa fa-pencil-alt"></label></button>'.
            //          '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
            //          '<label class="fa fa-trash"></label></button>'.
            //         '</div>';
          })
          ->addColumn('none', function ($data) {
              return '-';
          })
          ->rawColumns(['aksi', 'confirmed'])
          ->make(true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $product_unit_models = ProductUnitModel::pluck('product_unit_name', 'id');
        $product_brands = ProductBrandModel::pluck('product_brands_name', 'id');

        $breadcrumb['product'] = 'Product';
		$breadcrumb['!end!'] = 'Add Product';

        return view('product.create', compact('breadcrumb', 'product_unit_models', 'product_brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        $req = $request->all();
        $req['slug'] = str_slug($req['title']);
        $photos = [] ;

        // dd($req);

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=url("/images") . "/" .$image->getClientOriginalName();
                $image->move('/images/', $name);
                $photos[] = $name;
            }
         }

        $req['photo'] = implode(',', $photos);

        // dd($req);

        $product = new Product;
        $product->product_code = generateFiledCode('PRODUCT');
        $product->title = $request->input('title');
        $product->slug = str_slug($req['title']);
        $product->no_product = $request->input('no_product');
        $product->sn_product = $request->input('sn_product');
        $product->product_brand_id = $request->input('product_brand_id');
        $product->description = $request->input('description');
        $product->price_piece = $request->input('price_piece');
        $product->price_box = $request->input('price_box');
        $product->is_active = $request->input('is_active');
        $product->is_stock_available = $request->input('is_stock_available');
        $product->photo = $req['photo'];

        // dd($req);

        $product->save();


        return redirect()->route('product.index')
        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
