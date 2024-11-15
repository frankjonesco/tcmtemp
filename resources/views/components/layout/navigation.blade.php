{{-- SITE NAVIGATIOIN --}}

<nav id="siteNav">


    <x-blocks.container>


        {{-- MAIN MENU ICON --}}

        <span>

            <a
                id="openMainMenuIcon"
                href=""
                title="Main menu"
                aria-label="Main menu"
            >
                <i class="fa-solid fa-bars"></i>
            </a>

        </span>


        {{-- APP NAME --}}

        <span>

            <a
                href=""
                title="{{config('app.name')}} homepage"
                aria-label="{{config('app.name')}} homepage"
            >
                {{config('app.name')}}
            </a>

        </span>


        {{-- SEARCH AND AUTH ICONS --}}

        <span>

            @auth

                <a
                    href="/admin"
                    title="Admin - Manage content"
                    aria-label="Admin - Manage content"
                >
                    <i class="fa-solid fa-hammer"></i>
                </a>

            @endauth

            <a
                id="toggleSearchBar"
                href="#"
                title="Search {{config('app.name')}}"
                aria-label="Search {{config('app.name')}}"
            >
                <i class="fa-solid fa-search"></i>
            </a>

        </span>

    </x-blocks.container>



</nav>




{{-- MAIN MENU --}}


<nav id="mainMenu" class="-translate-x-full">


    {{-- CLOSE MENU ICON --}}

    <x-blocks.container class="close-icon">

        <a
            id="closeMainMenuIcon"
            href="#"
            title="Close main menu"
            aria-label="Close main menu"
        >
            <i class="fa-solid fa-times"></i>
        </a>

    </x-blocks.container>


    {{-- MENU ITEMS --}}

    <x-blocks.container class="menuItems">


        {{-- NEWS --}}

        <span>
            
            <a
                href="/articles"
                title="News articles and blog posts"
                aria-label="News articles and blog posts"
            >
                Articles
            </a>

        </span>



        {{-- AUTH MENU ITEMS --}}

        @auth

            {{-- ADMIN --}}

            <span>
            
                <a
                    href="/admin"
                    title="Admin - Manage content"
                    aria-label="Admin - Manage content"
                >
                    Admin
                </a>
    
            </span>


            {{-- LOG OUT --}}

            <span>
            
                <form
                    action="/logout"
                    method="POST"
                >

                    @csrf

                    <a
                        href="#"
                        onclick="this.parentNode.submit()"
                    >
                        Log out
                    </a>

                </form>
    
            </span>


        {{-- GUEST MENU ITEMS --}}

        @else

            <span>

                <a
                    href="/register"
                    title="Create an account"
                    aria-label="Create an account"
                >
                    Register
                </a>

            </span>


            <span>

                <a
                    href="/login"
                    title="Log in to {{config('app.name')}}"
                    aria-label="Log in to {{config('app.name')}}"
                >
                    Log in
                </a>

            </span>

        @endauth


    </x-blocks.container>    


</nav>




{{-- SEARCH BAR --}}

<div id="navSearchBar">

    <form 
        id="navSearchForm"
        action="/grab-search-term" 
        method="POST"
    >
        
        @csrf

        <input 
            id="navSearchInput"
            type="text"
            name="search_term"
            placeholder="Search..."
        >

    </form>
    
</div>