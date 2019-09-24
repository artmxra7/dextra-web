<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Validator;

class RoleController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:role list');
        // $this->middleware('permission:role create');
        // $this->middleware('permission:role edit');
        // $this->middleware('permission:role delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$breadcrumb['!end!'] = 'Role';

        $roles = Role::orderBy('id','DESC')
            ->where('id', '!=', 1)->paginate(5);
        return view('roles.index',compact('roles','breadcrumb'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $permission = $permission->mapToGroups(function ($item) {
            $arr = explode(' ',trim($item->name));
            return array(
                $arr[0] => array(
                    (int)$item->id => (strpos($item->name, $arr[0]) ? $item->name : $item->name )
                )
            );
        });

		$breadcrumb['roles'] = 'Role';
		$breadcrumb['!end!'] = 'Buat Role';

        return view('roles.create',compact('permission','breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('roles.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('success','Berhasil membuat role.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 1) {
            abort(404);
        }

        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == 1) {
            abort(404);
        }

        $breadcrumb['roles'] = 'Role';
		$breadcrumb['!end!'] = 'Ubah Role';

        $role = Role::find($id);
        $permission = Permission::get();
        $permission = $permission->mapToGroups(function ($item) {
            $arr = explode(' ',trim($item->name));
            return array(
                $arr[0] => array(
                    (int)$item->id => (strpos($item->name, $arr[0]) ? $item->name : $item->name )
                )
            );
        });

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();


        return view('roles.edit',compact('role','permission','rolePermissions','breadcrumb'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
                        ->with('success','Berhasil mengubah role.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Berhasil menghapus role.');
    }
}
