<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuValidation;
use App\Http\Requests\SubMenuValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class MenuController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
        $this->Menu = new Menu();
        $this->Submenu = new Submenu();
    }

    public function getMenu()
    {
        $data = [

            'title' => "Menu",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('menu.menu', $data);
    }

    public function addMenu()
    {
        $data = [

            'title' => "Menu",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('menu.addmenu', $data);
    }

    public function insertMenu(MenuValidation $request)
    {
        Menu::create([  
            'title' => $request->title,
            'icon' => $request->icon.' nav-icon',
            'link' => $request->link,
            'dropdown' => $request->dropdown,
            'placement' => $request->placement,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('admin/menu')->with('message', 'Insert Success!');
    }

    public function editMenu($id)
    {
        $data = [
            'menu' => $this->Menu->getDataById('menu', ['id' => $id]),
            'title' => "Menu",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];
        return view('menu.editmenu', $data);  
    }

    public function updateMenu($id, MenuValidation $request)
    {
    	$menu = Menu::find($id);

        $menu->title = $request->title;
        $menu->icon = $request->icon;
        $menu->link = $request->link;
        $menu->dropdown = $request->dropdown;
        $menu->placement = $request->placement;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->save();

        return redirect()->route('admin/menu')->with('message', 'Update Success!');
    }

    public function deleteMenu($id)
    {
        $this->Menu->deleteData('menu', ['id' => $id]);
        return redirect()->route('admin/menu')->with('message', 'Delete Success!');
    }

    public function getSubmenu($id)
    {
        $data = [
            'id_menu' => $this->Menu->getDataById('menu', ['id' => $id]),
            'submenu_id' => $this->Submenu->getSubMenu_Id(['id' => $id]),
            'title' => "Sub Menu",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('menu.submenu', $data);
    }

    public function addSubmenu($id)
    {
        $menu = $this->Menu->getAll('menu');

        foreach($menu as $m){

            $select_menu[$m->id] = $m->title;
        }

        $data = [
            'id_menu' => $this->Menu->getDataById('menu', ['id' => $id]),
            'title' => "Sub Menu",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('menu.addsubmenu', compact('select_menu'), $data);
    }

    public function insertSubmenu(SubmenuValidation $request)
    {
        Submenu::create([
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'link' => $request->link,
            'placement' => $request->placement,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('admin/submenu/'.$request->menu_id)->with('message', 'Insert Success!');
    }

    public function editSubmenu($id)
    {
        $menu = $this->Menu->getAll('menu');

        foreach($menu as $m){

            $select_menu[$m->id] = $m->title;
        }

        $data = [
            'submenu' => $this->Submenu->getDataById('submenu', ['id' => $id]),
            'title' => "Sub Menu",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];
        return view('menu.editsubmenu',  compact('select_menu'), $data);  
    }

    public function updateSubmenu($id, Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'title' => 'required',
            'link' => 'required',
            'placement' => 'required',
        ]);

        $data = [
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'link' => $request->link,
            'placement' => $request->placement,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->Submenu->updateData('submenu', ['id' => $id], $data);
        return redirect('admin/submenu/'.$request->menu_id)->with('message', 'Update Success!');
    }

    public function deleteSubmenu($id, Request $request)
    {
        $this->Submenu->deleteData('submenu', ['id' => $id]);
        return redirect('admin/submenu/'.$request->menu_id)->with('message', 'Delete Success!');
    }
}
