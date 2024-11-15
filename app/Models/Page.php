<?php

namespace App\Models;

use Butschster\Head\Facades\Meta;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    // INJECT METADATA

    function injectMetadata(
        string $title = '', 
        bool $prepend = false, 
        string $description = '', 
        bool $noindex = false) : Void {
            

        // TITLE

        if($prepend)
            Meta::prependTitle($title);
        
        else
            Meta::setTitle($title);


        // DESCRIPTION

        if($description)
            Meta::setDescription($description);


        // NO ROBOTS

        if($noindex)
            Meta::addMeta('robots', ['content' => 'noindex']);

    }




    // END OF CLASS
    
}
