<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use App\Page;
use App\Http\Requests\PageValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Menu = new Menu();
        $this->Submenu = new Submenu();
        $this->Page = new Page();
    }

    public function getPage()
    {
        $page = $this->Page->getAll('page');

        if (count($page) != 0) {

            foreach ($page as $p) {

                if ($p->submenu_id == NULL) {

                    $getPage = $this->Page->getPage1();
                }else{

                    $getPage = $this->Page->getPage2();
                }
            }
        }else{
            $getPage = $page;
        }
        
        $data = [
            'page' => $getPage,
            'title' => "Page",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('page.page', $data);
    }

    public function addPage()
    {
        $menu = $this->Menu->getAll('menu');
        $submenu = $this->Submenu->getAll('submenu');

        foreach($menu as $m){

            $select_menu[$m->id] = $m->title;
        }

        foreach($submenu as $s){

            $select_submenu[$s->id] = $s->title;
        }

        $data = [
            'title' => "Page",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('page.addpage', compact('select_menu', 'select_submenu'), $data);
    }

    public function insertPage(PageValidation $request)
    {
        Page::create([
            'menu_id' => $request->menu_id,
            'submenu_id' => $request->submenu_id,
            'meta_fields' => json_encode(explode(", ", $request->meta_fields)),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/page')->with('message', 'Insert Success!');
    }

    public function editPage($id)
    {
        $menu = $this->Menu->getAll('menu');
        $submenu = $this->Submenu->getAll('submenu');

        foreach($menu as $m){

            $select_menu[$m->id] = $m->title;
        }

        foreach($submenu as $s){

            $select_submenu[$s->id] = $s->title;
        }

        $page = $this->Page->getDataById('page', ['id' => $id]);

        $data = [
            'page' => $page,
            'meta_fields' => implode(", ", json_decode($page->meta_fields)),
            'title' => "Page",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('page.editpage', compact('select_menu', 'select_submenu'), $data);

    }

    public function updatePage($id, PageValidation $request)
    {
        $page = Page::find($id);

        $page->menu_id = $request->menu_id;
        $page->submenu_id = $request->submenu_id;
        $page->meta_fields = json_encode(explode(", ", $request->meta_fields));
        $page->created_at = date('Y-m-d H:i:s');
        $page->updated_at = date('Y-m-d H:i:s');
        $page->save();

        return redirect()->route('admin/page')->with('message', 'Update Success!');
    }

    public function deletePage($id)
    {
        $this->Page->deleteData('page', ['id' => $id]);
        return redirect()->route('admin/page')->with('message', 'Delete Success!');
    }
}
