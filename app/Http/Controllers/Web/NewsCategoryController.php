<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\NewsCategoryRepository;
use App\NewsCategory;
use Carbon\Carbon;
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


            $button = '<a href="/news-category/'.$data->news_category_code.'/edit" id="'.$data->news_category_code.'"  class="btn btn-primary btn-sm">Edit</a>
            </div>';
            $button .= '<a href="/news-category/hapus/'.$data->news_category_code.'" id="'.$data->news_category_code.'"  class="btn btn-danger btn-sm">Hapus</a>
            </div>';
            $button .= '&nbsp;&nbsp;';

            return $button;
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

        $breadcrumb['news-category'] = 'News Category';
        $breadcrumb['!end!'] = 'Create News Category';

        return view('news_category.create', compact('breadcrumb', ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();

        $newscat = new NewsCategory();
        $newscat->news_category_code = generateFiledCode('NEWS-CATEGORIES');
        $newscat->news_category_name = $request->input('name');
        $newscat->created_at = Carbon::now();

        $newscat->save();

        return redirect()->route('news-category.index')
        ->with('success','News Category created successfully');
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

        $result = $this->newscatRepo->getDetail($id);


        $breadcrumb['news-category'] = 'News Category';
        $breadcrumb['!end!'] = 'Edit News Category';

        return view('news_category.edit', compact ('breadcrumb', 'result'));
    }

    public function update(Request $request, $id)
    {

        $update = ['news_category_name' => $request->name];

        // dd($update);

        NewsCategory::where('news_category_code', $id)->update($update);


        return redirect()->route('news-category.index')
        ->with('success','News Category updated successfully');
    }


    public function destroy($id)
    {

        $result = $this->newscatRepo->getDetail($id);


        return redirect()->route('news-category.index')
        ->with('success','News Category Deleted successfully');
    }

    public function hapus($id)
    {

        $result = $this->newscatRepo->getDetail($id);

        $breadcrumb['news-category'] = 'News Category';
        $breadcrumb['!end!'] = 'Delete News Category';

        return view('news_category.delete', compact ('breadcrumb', 'result'));
    }

    public function confirm(Request $request, $id)
    {

        $update = [
            'news_category_status' => 0
    ];

        // dd($update);

        NewsCategory::where('news_category_code', $id)->update($update);



        return redirect()->route('news-category.index')
        ->with('success','News Category Delete successfully');
    }

}
