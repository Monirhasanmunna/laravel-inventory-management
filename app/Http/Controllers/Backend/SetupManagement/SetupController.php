<?php

namespace App\Http\Controllers\Backend\SetupManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function index()
    {
        return view('backend.setup.index');
    }
}
