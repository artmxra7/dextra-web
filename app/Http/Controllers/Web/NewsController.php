<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\NewsRepository;
use App\Models\News as AppNews;
use App\NewsCategory;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    protected $newsRepo;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }




    public function json(){

        $result = $this->newsRepo->getNews();

        // dd($result);

        $data = collect($result);
        return DataTables::of($data)
        ->addColumn('aksi', function ($data) {

            // $button = '<a href="/order-job/'.$data->news_code.'" id="'.$data->news_code.'" class="btn btn-primary btn-sm">Detail</a>
            // </div>';
            // $button = '&nbsp;&nbsp;';
            // $button .= '<a class="btn btn-primary btn-sm">Edit</a>
            // </div>';
            // $button .= '&nbsp;&nbsp;';
            // $button .= '<a  class="btn btn-danger btn-sm">Hapus</a>
            // </div>';
            // return $button;
          })

          ->rawColumns(['aksi'])
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

        return view('news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $news_categories = NewsCategory::pluck('news_category_name', 'id');
        $breadcrumb['news'] = 'News';
        $breadcrumb['!end!'] = 'Create News';

        return view('news.create' , compact('breadcrumb', 'news_categories'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($input['title']);
        $input['photo'] =  uploadFotoWithFileName($input['photo'], 'news');
        $input['news_publisher'] = Auth::user()->users_name;

        // dd($input);

        $news = $this->newsRepo->createNews($input);

        return redirect()->route('news.index')
        ->with('success','News created successfully');
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
