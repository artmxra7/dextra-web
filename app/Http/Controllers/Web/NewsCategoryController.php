<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\NewsCategoryRepository;
use DataTables;

class NewsCategoryController extends Controller
{

    protected $newscatRepo;

    public function __construct( NewsCategoryRepository $newscatRepo )
    {
        $this->newscatRepo = $newscatRepo;
    }

    public function json(){

        $result = $this->newscatRepo->getNews();

        // dd($result);

        $data = collect($result);
        return DataTables::of($data)->addColumn('aksi', function ($data) {
            return  '<div class="btn-group">'.
                     '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                     '<label class="fa fa-pencil-alt"></label></button>'.
                     '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                     '<label class="fa fa-trash"></label></button>'.
                    '</div>';
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
        return view('news_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
