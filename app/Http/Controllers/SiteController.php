<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{

    protected $page;

    public function __construct(){
        
        $this->page = new Page();
        
    }



    
    // VIEW HOME

    public function viewHome() : View
    {
        $this->page->injectMetadata(config('app.name') . ' - News & Statistics', false);

        return view('pages.home', [
            'pageHeadings' => [
                'A true crime corner of the internet',
                'News & statistics on the cases we cover.'
            ]
        ]);
    }




    // VIEW ABOUT

    public function viewAbout() : View
    {
        $this->page->injectMetadata('About us', true);

        return view('pages.about', [
            'pageHeadings' => [
                'About us',
                'What we do here.'
            ]
        ]);
    }




    // VIEW TERMS OF USE

    public function viewTermsOfUse() : View
    {
        $this->page->injectMetadata('Terms of use', true);

        return view('pages.terms-of-use', [
            'pageHeadings' => [
                'Terms of use',
                'Thes are our terms of use'
            ]
        ]);
    }




    // VIEW PRIVACY POLICY

    public function viewPrivacyPolicy() : View
    {
        $this->page->injectMetadata('Privacy policy', true);

        return view('pages.privacy-policy', [
            'pageHeadings' => [
                'Privacy polcicy',
                'This is our privacy policy.'
            ]
        ]);
    }




    // END OF CLASS

}
