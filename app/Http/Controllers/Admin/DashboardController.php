<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:create users', ['only' => ['store']]);
        $this->middleware('permission:delete users', ['only' => ['destroy']]);
        $this->middleware('permission:read users', ['only' => ['index', 'show']]);
        $this->middleware('permission:update users', ['only' => ['update', 'edit']]);
    }

    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
