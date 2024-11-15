<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Site;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\ImageProcess;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    protected $site, $model, $page, $pageHeadings, $toast, $viewAssets;


    public function __construct()
    {
        $this->site = new Site();
        $this->model = $this->site->formatModelData('Article', 'lg');
        $this->page = new Page();
        $this->pageHeadings = $this->site->getPageHeadings($this->model);
        $this->toast = "Good!";
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
    }


    

    // VIEW INDEX

    public function viewIndex() : View
    {
        $this->page->injectMetadata('News articles', true);

        return view('articles.index', [
            'pageHeadings' => [
                'News articles',
                'Stuff we\'ve written about the cases we cover.'
            ]
        ]);
    }




    // VIEW CREATE FORM
        
    public function create() : View
    {
        $this->page->injectMetadata('Create '.$this->model->label, true, '', true);

        return view('admin.resources.create', [
            'pageHeadings' => $this->pageHeadings,
            'form_fields' => [
                'input-title',
                'input-subtitle',
                'textarea-introduction-ck-editor',
                'textarea-body-ck-editor',
                'input-image',
                'select-status'
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            // 'categories' => $this->site->categories(),
            // 'countries' => $this->site->countries(),
            // 'states' => $this->site->states()
        ]);

    }




    // STORE IN DATATBASE

    public function store(Request $request)
    {   
        $request->merge([
            'hex' => Str::random(11),
            'user_id' => auth()->id(),
            'slug' => Str::slug($request->title),
            'views' => 0
        ]);

        


        $request->validate([
            'hex' => 'required|unique:articles,hex',
            'user_id' => 'required',
            'title' => 'required|unique:articles,title',
            'slug' => 'required|unique:articles,slug',
            'subtitle' => 'required',
            'introduction' => '',
            'body' => '',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,svg|max:2048|dimensions:min_width=100,min_height=100',
            'views' => 'numeric',
            'status' => 'required',
        ]);


       


        $resource = Article::create([
            'hex' => $request->hex,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'subtitle' => $request->subtitle,
            'introduction' => $request->introduction,
            'body' => $request->body,
            'image' => $request->image,
            'views' => $request->views,
            'status' => $request->status,
        ]);


        $url = $resource->link();

        if($request->hasFile('image')){

            $image = new ImageProcess();
            $image = $image->upload($request, $resource, $image, true);

            $url = $this->model->directory.'/'.$resource->slug.'/images/'.$image->hex.'/crop';

        }

        return redirect($url)->with('toast', $this->toast);

    }
    
}
