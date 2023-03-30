<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.admin_list.index', compact('users'));
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
     * @param  \App\Models\AdminList  $adminList
     * @return \Illuminate\Http\Response
     */
    public function show(AdminList $adminList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminList  $adminList
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminList $adminList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminList  $adminList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminList $adminList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminList  $adminList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return back()->with(['deleteSuccess' => 'Admin is Deleted successfully']);
    }

    //admin search
    public function adminSearch(Request $request) {
        $users = User::orWhere('name', 'like', "%$request->searchKey%")
                        ->orWhere('email', 'like', "%$request->searchKey%")
                        ->orWhere('phone', 'like', "%$request->searchKey%")
                        ->orWhere('address', 'like', "%$request->searchKey%")
                        ->orWhere('gender', 'like', "%$request->searchKey%")
                        ->get();

        $searchKey = $request->searchKey;

        return view('admin.admin_list.index', compact('users', 'searchKey'));

    }
}
