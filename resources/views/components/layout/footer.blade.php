{{-- SITE FOOTER --}}

<footer id="siteFooter">


    {{-- SITE LOGO --}}

    <a 
        href="/"
        title="{{config('app.name')}} homepage"
        aria-label="{{config('app.name')}} homepage"
        class="font-logo"
    >
        {{config('app.name')}}
    </a>




    {{-- NAVIGATION --}}

    <nav>


        {{-- ABOUT --}}

        <a
            href="/about"
            title="About {{config('app.name')}}"
            aria-label="About {{config('app.name')}}"
        >
            About
        </a>


        {{-- NEWS --}}

        <a
            href="/articles"
            title="News articles and blog posts"
            aria-label="News articles and blog posts"
        >
            Articles
        </a>


        {{-- TERMS OF USE --}}

        <a
            href="/terms-of-use"
            title="Terms of use"
            aria-label="Terms of use"
        >
            Terms of use
        </a>


        {{-- PRIVACY POLICY --}}

        <a
            href="/privacy-policy"
            title="Privacy policy"
            aria-label="Privacy policy"
        >
            Privacy policy
        </a>

    </nav>




    {{-- SUPPORT LINKS --}}

    <div class="social-networks bg-white text-black px-6 py-3 rounded-xl border-2 border-yellow-400">

        <span class="!text-black">
            Support the creator
        </span>


        {{-- BUY ME A COFFEE ICON --}}

        <a
            href="{{config('settings.buymeacoffee_url')}}"
            target="_blank"
            title="Buy a coffee for {{config('app.name')}}"
            aria-label="Buy a coffee for {{config('app.name')}}"

        >
            <i class="fa fa-coffee"></i>
        </a>


        {{-- PATREON ICON --}}

        <a
            href="{{config('settings.patreon_url')}}"
            target="_blank"
            title="Become a {{config('app.name')}} Patreon member"
            aria-label="Become a {{config('app.name')}} Patreon member"

        >
            <i class="fa-brands fa-patreon"></i>
        </a>


        {{-- YOUTUBE ICON --}}

        <a
            href="{{config('settings.youtube_membership_url')}}"
            target="_blank"
            title="Become a {{config('app.name')}} YouTube member"
            aria-label="Become a {{config('app.name')}} YouTube member"

        >
            <i class="fa-brands fa-youtube"></i>
        </a>
    
    </div>



    {{-- SOCIAL NETWORKS --}}

    <div class="social-networks">

        <span>
            Stay connected
        </span>


        {{-- FACEBOOK ICON --}}

        <a
            href="{{config('settings.facebook_url')}}"
            target="_blank"
            title="Follow {{config('app.name')}} on Facebook"
            aria-label="Follow {{config('app.name')}} on Facebook"

        >
            <i class="fa-brands fa-facebook-f"></i>
        </a>


        {{-- TWITTER ICON --}}

        <a
            href="{{config('settings.twitter_url')}}"
            target="_blank"
            title="Follow {{config('app.name')}} on Twitter"
            aria-label="Follow {{config('app.name')}} on Twitter"

        >
            <i class="fa-brands fa-twitter"></i>
        </a>


        {{-- YOUTUBE ICON --}}

        <a
            href="{{config('settings.youtube_url')}}"
            target="_blank"
            title="Follow {{config('app.name')}} on YouTube"
            aria-label="Follow {{config('app.name')}} on YouTube"

        >
            <i class="fa-brands fa-youtube"></i>
        </a>


        {{-- INSTAGRAM ICON --}}

        <a
            href="{{config('settings.instagram_url')}}"
            target="_blank"
            title="Follow {{config('app.name')}} on Instagram"
            aria-label="Follow {{config('app.name')}} on Instagram"

        >
            <i class="fa-brands fa-instagram"></i>
        </a>


        {{-- DISCORD ICON --}}

        <a
            href="{{config('settings.discord_url')}}"
            target="_blank"
            title="Join {{config('app.name')}} on Discord"
            aria-label="Join {{config('app.name')}} on Discord"

        >
            <i class="fa-brands fa-discord"></i>
        </a>

    </div>




    {{-- LEGALS --}}

    <div class="legals">


        <span>
            {{config('app.name')}}
        </span>


        <span>
            &copy; {{date('Y', time())}}
        </span>


    </div>


    


</footer>