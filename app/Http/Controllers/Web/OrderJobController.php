<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\OrderJobRepository;
use App\JobCategory;
use DataTables;
use Illuminate\Support\Facades\DB;
use FarhanWazir\GoogleMaps\GMaps;

class OrderJobController extends Controller
{
    protected $OrderJobRepo, $gmap;

    public function __construct( OrderJobRepository $orderJobRepo, GMaps $gmap)
    {
        $this->OrderJobRepo = $orderJobRepo;
        $this->gmap = $gmap;
    }

    public function json(){

        $result = $this->OrderJobRepo->getJobOrder();

        //  dd($result);

        $data = collect($result);


        // $data = collect($result);
        // dd($result->items);
        return DataTables::of($data)
        ->addColumn('aksi', function ($data) {
            $button = '<a href="/order-job/'.$data->job_code.'" id="'.$data->job_code.'" class="btn btn-primary btn-sm">Detail</a>
            </div>';
            return $button;
          })

          ->rawColumns(['aksi', 'confirmed'])
          ->make(true);
    }

    public function index()
    {
        //

        return view('job_order.index');
    }

    public function create()
    {
        // //

        // $product_unit_models = ProductUnitModel::pluck('name', 'id');
        // $product_brands = ProductBrandModel::pluck('name', 'id');

        // $breadcrumb['product'] = 'Product';
		// $breadcrumb['!end!'] = 'Add Product';

        // return view('product.create', compact('breadcrumb', 'product_unit_models', 'product_brands'));
    }

    public function store(Request $request)
    {
        //



        // $req = $request->all();
        // $req['slug'] = str_slug($req['title']);
        // $photos = [] ;

        // // dd($req);

        // if($request->hasfile('filename'))
        //  {

        //     foreach($request->file('filename') as $image)
        //     {
        //         $name=url("/images") . "/" .$image->getClientOriginalName();
        //         $image->move('/images/', $name);
        //         $photos[] = $name;
        //     }
        //  }

        // $req['photo'] = implode(',', $photos);

        // // dd($req);

        // $product = new Product;
        // $product->product_code = generateFiledCode('PRODUCT');
        // $product->title = $request->input('title');
        // $product->slug = str_slug($req['title']);
        // $product->no_product = $request->input('no_product');
        // $product->sn_product = $request->input('sn_product');
        // $product->product_brand_id = $request->input('product_brand_id');
        // $product->description = $request->input('description');
        // $product->price_piece = $request->input('price_piece');
        // $product->price_box = $request->input('price_box');
        // $product->is_active = $request->input('is_active');
        // $product->is_stock_available = $request->input('is_stock_available');
        // $product->photo = $req['photo'];

        // // dd($req);

        // $product->save();


        // return redirect()->route('product.index')
        // ->with('success','User created successfully');
    }

    public function show($id)
    {
        $result = $this->OrderJobRepo->getDetail($id);
        // $data = collect($result);

        //  dd($result->latitude);

        $rightTopControls = ['document.getElementById("rightTopControl")'];
        $this->gmap->injectControlsInRightTop = $rightTopControls;

        $config = array();

        $config['zoom'] = '20';
        $config['center'] = ''.$result->latitude.', '.$result->longtitude.'';
        $config['map_height'] = '500px';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';
        $this->gmap->initialize($config); // Initialize Map with custom configuration
        // set up the marker ready for positioning
        $marker = array();

        $marker['c'] = true;
        $marker['position'] = ''.$result->latitude.', '.$result->longtitude.'';
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';
        $this->gmap->add_marker($marker);
        $map = $this->gmap->create_map();

        // dd($result);

        $breadcrumb['order-job'] = 'Job Order';
		$breadcrumb['!end!'] = 'Detail Order';
        return view('job_order.detail', compact ('breadcrumb', 'result', 'map'));
    }

    public function edit($id)
    {


    }

    public function update(Request $request, $id)
    {
        //
    }
}
