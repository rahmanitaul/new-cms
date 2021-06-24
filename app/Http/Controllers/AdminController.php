<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Menu = new Menu();
        $this->Submenu = new Submenu();
    }

    public function index()
    {
        $data = [
            'title' => "Dashboard",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('index', $data);
    }
}
