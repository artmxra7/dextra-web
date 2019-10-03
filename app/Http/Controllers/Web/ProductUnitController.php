<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductUnitRepository;
use App\ProductUnitModel;
use DataTables;

class ProductUnitController extends Controller
{
    protected $prodUnitRepo;

    public function __construct(ProductUnitRepository $prodUnitRepo)
    {
        $this->prodUnitRepo = $prodUnitRepo;
    }

    public function json(){
        $result = $this->prodUnitRepo->getUnit();

        $data = collect($result);

        return DataTables::of($data)->addColumn('aksi', function($data){

        })
        ->addColumn('none', function ($data){
            return '-';
        })
        ->rawColumns(['aksi', 'çonfirmed'])
        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product_unit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcrumb['product-unit'] = 'Product Unit';
        $breadcrumb['!end!'] = 'Create Product Unit';

        return view('product_unit.create', compact('breadcrumb'));
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

        $produnit = new ProductUnitModel();
        $produnit->product_unit_code = generateFiledCode('UNIT');
        $produnit->product_unit_name = $request->input('name');

        $produnit->save();

        return redirect()->route('product-unit.index')
        ->with('succes', 'Product Unit Created Succesfully');
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
