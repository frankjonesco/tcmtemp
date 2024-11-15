<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('images/favicon-94x94.png')}}">
    

    @meta_tags


    {{-- OPEN GRAPH META --}}

    <meta id="ogSiteName" property="og:site_name" content="{{config('app.name')}}" />
    <meta id="ogTitle" property=“og:title” content="" />
    <meta id="ogDescription" property="og:description" content="" />
    <meta id="ogUrl" property="og:url" content="{{url()->current()}}" />
    <meta id="ogType" property="og:type" content="website" />
    <meta id="ogImage" property="og:image" content="{{asset('images/truecrimemetrix-logo.png')}}" />
    <meta id="ogImageWidth" property="og:image:width" content="660" />
    <meta id="ogImageHeight" property="og:image:height" content="661" />
    <meta id="ogTwitterCard" property="twitter:card" content="summary_large_image" />
    <meta id="ogTwitterImage" property="twitter:image" content="{{asset('images/truecrimemetrix-logo.png')}}" />
    <meta id="ogTwitterSite" property="twitter:site" content="@truecrimemetrix" />


    {{-- GOOGLE FONTS --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;0,600;0,700;1,300;1,400;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');">

    
    {{-- BUILD SCRIPTS --}}

    @if(environmentIsProduction())

        @foreach(explodeCssAssets() as $cssAsset)

            <link href="{{ asset('build/assets/'.trim($cssAsset))}}"  rel="preload" as="style" onload="this.rel='stylesheet'">

        @endforeach

        @foreach(explodeJsAssets() as $jsAsset)

            <script src="{{ asset('build/assets/'.trim($jsAsset)) }}" defer></script>

        @endforeach

    @else

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    @endif


</head>
<body>

    <x-layout.navigation />

    <main>

        <x-blocks.container class="{{isset($containerClass) ? $containerClass : null}}">

            @if(empty($breadcrumbs) === false)
                <x-elements.breadcrumbs :breadcrumbs="$breadcrumbs" />
            @endif

            @if(empty($pageHeadings) === false)
                <x-cards.page-headings :pageHeadings="$pageHeadings" />
            @endif

            {{$slot}}

        </x-blocks.container>
        
    </main>

    <x-layout.footer />


    {{-- HIDDEN ELEMENTS --}}

    <x-cards.toast />
    <x-blocks.blackout />


</body>
</html>