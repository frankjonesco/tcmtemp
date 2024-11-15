<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Site;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $site, $page, $toast, $viewAssets;


    public function __construct()
    {
        $this->site = new Site();
        $this->page = new Page();
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
    }




    // ADMIN INDEX

    public function index() : View
    {
        $this->page->injectMetadata('Manage content', true, '', true);

        return view('admin.index', [
            'pageHeadings' => [
                'Manage content',
                'View, create, edit and delete your content.'
            ],
            'articles' => $this->site->articles(true, 12)->withPath('admin/articles'),
            
            'viewAssets' => $this->viewAssets
        ]);
    }

}
