<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <!-- <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company"> -->
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        <a href="/socialmedia/"
                            class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            aria-current="page">Authenticate</a>

                        <a href="/socialmedia/home"
                            class="<?= urlIs('/home') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>

                        <a href="/socialmedia/post"
                            class="<?= urlIs('/post') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Post</a>

                        <a href="/socialmedia/friends"
                            class="<?= urlIs('/friends') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Friends</a>

                        <a href="/socialmedia/members"
                            class="<?= urlIs('/members') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Members</a>

                        <a href="/socialmedia/media"
                            class="<?= urlIs('/media') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Media</a>

                        <?php if (isset($_SESSION['credentials'])) { ?>
                            <a href="/socialmedia/profile?id=<?= $_SESSION['credentials'][1] ?>&name=<?= $_SESSION['credentials'][0] ?>"
                                class="<?= urlIs('/profile?id=' . $_SESSION['credentials'][1] . '&name=' . $_SESSION['credentials'][0]) && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Your
                                Profile</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button"
                        class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <!-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg> -->
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <!-- <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt=""> -->
                            </button>
                        </div>

                        <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
                        <!-- <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="user-menu-item-0">Your Profile</a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="user-menu-item-1">Settings</a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="user-menu-item-2">Sign out</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/socialmedia/"
                class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Authenticate</a>

            <a href="/socialmedia/home"
                class="<?= urlIs('/home') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>

            <a href="/socialmedia/post"
                class="<?= urlIs('/post') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Post</a>

            <a href="/socialmedia/friends"
                class="<?= urlIs('/friends') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Friends</a>

            <a href="/socialmedia/members"
                class="<?= urlIs('/members') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Members</a>

            <a href="/socialmedia/media"
                class="<?= urlIs('/media') && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Media</a>

            <?php if (isset($_SESSION['credentials'])) { ?>
                <a href="/socialmedia/profile?id=<?= $_SESSION['credentials'][1] ?>&name=<?= $_SESSION['credentials'][0] ?>"
                    class="<?= urlIs('/profile?id=' . $_SESSION['credentials'][1] . '&name=' . $_SESSION['credentials'][0]) && isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn" ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Your
                    Profile</a>
            <?php } ?>

        </div>
    </div>
    </div>
</nav>