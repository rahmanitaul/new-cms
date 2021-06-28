<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use App\Page;
use App\DetailPage;
use App\Http\Requests\DetailPageValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DetailPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Menu = new Menu();
        $this->Submenu = new Submenu();
        $this->Page = new Page();
        $this->DetailPage = new DetailPage();
    }

    public function getDetailPage($id)//ID PAGE
    {   
        $data = [
            'id' => $id,
            'detailpage' => $this->DetailPage->getDetailPage(['page_id' => $id]),
            'title' => "Detail Page",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('page.detailpage', $data);
    }

    public function addDetailPage($id)//ID PAGE
    {
        $type_field = $this->DetailPage->getAll('type_field');

        foreach($type_field as $t){

            $select_type_field[$t->type] = $t->type;
        }

        $data = [
            'page' => $this->DetailPage->getDataById('page', ['id' => $id]),
            'title' => "Detail Page",
            'menu' => $this->Menu->getAll('menu'),
            'submenu' => $this->Submenu->getSubmenu(),
        ];

        return view('page.adddetailpage', compact('select_type_field'),$data);
    }

    public function insertDetailPage(DetailPageValidation $request)
    {
        DetailPage::create([
            'page_id' => $request->page_id,
            'meta' => json_encode($request->meta),
            'type' => $request->type,
            'method' => $request->method,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/detailpage/'.$request->page_id)->with('message', 'Insert Success!');
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
