<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:create sites', ['only' => ['store']]);
        $this->middleware('permission:delete sites', ['only' => ['destroy']]);
        $this->middleware('permission:read sites', ['only' => ['index', 'show']]);
        $this->middleware('permission:update sites', ['only' => ['update', 'edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::orderBy('created_at', 'asc')->paginate(2);

        return view('admin.site.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.site.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sites|max:255',
            'description' => 'max:160',
            'category' => 'required',
        ]);

        $data = new Site();
        $data->category_id = $request->category;
        $data->description = $request->description;
        $data->name = $request->name;
        $data->user_id = Auth::user()->id;

        $data->save();

        return redirect()->route('admin.categories.index')->with(['success' => __('categories.message.success-category-added', ['category' => $data->name])]);
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
        $site = Site::findOrFail($id);
        $categories = Category::all();

        return view('admin.site.edit', compact('site', 'categories'));
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
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.sites.index')->with(['success' => __('categories.message.success-category-updated', ['category' => $category->name])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
