<div>
    <div class="th tm bg-slate-900 pd nb zq zy bj wn" :class="sidebarOpen ? 'bf' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak=""></div>
        <div
            id="sidebar"
            class="flex fu tp nb tb tk zh zm zg tef a_ sj lq tev ta uy tei ttn 2xl:!w-64 af pr vn bz wn wi"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
            @click.outside="sidebarOpen = false"
            @keydown.escape.window="sidebarOpen = false"
            x-cloak="lg"
        >
        <div class="flex fh ih gt ji">
            <button class="zq text-slate-500 xg" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="tc">Close sidebar</span> <svg class="oz on dd" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path></svg>
            </button>
            <a class="block" href="{{ route('dashboard.main')}}">
                <img src="{{ asset('customer/images/logo.svg')}}" alt="">
            </a>
        </div>
        <div class="ln">
            <div>
                <h3 class="gp gb text-slate-500 gg gn"><span class="hidden zk tte 2xl:hidden gu oz" aria-hidden="true">•••</span> <span class="zq tez 2xl:block">Pages</span></h3>
                <ul class="ip">
                    <li class="vx vc rounded-sm im wg" :class="{ 'bg-slate-900': {{ explode('.',Route::currentRouteName())[0] == 'dashboard'?'true':'false' }} }" x-data="{ open: false }" x-init="$nextTick(() => open = {{ explode('.',Route::currentRouteName())[0] == 'dashboard'?'true':'false' }})">
                        <a class="block yn xh lz b_ we" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fh">
                                <div class="flex items-center">
                                    <svg class="af on oz" viewBox="0 0 24 24">
                                        <path class="dd yt" :class="page.startsWith('dashboard-') &amp;&amp; '!text-indigo-500'" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                                        <path class="dd gz" :class="page.startsWith('dashboard-') &amp;&amp; 'text-indigo-600'" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                                        <path
                                            class="dd yt"
                                            
                                            d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"
                                        ></path>
                                    </svg>
                                    <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Dashboard</span>
                                </div>
                                <div class="flex af r_ tek ttr 2xl:opacity--100 wn">
                                    <svg class="w-3 h-3 af rq dd yt" :class="open &amp;&amp; 'a_ ak'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="zq tez 2xl:block">
                            <ul class="mr io" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz " href="{{ route('dashboard.main')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'dashboard.main'?'text-indigo-500':'' }}">Main</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('analytics')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'dashboard.analytics'?'text-indigo-500':'' }}">Analytics</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('fintech')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'dashboard.fintech'?'text-indigo-500':'' }}">Fintech</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @can('manage-users')
                    <li class="vx vc rounded-sm im wg" :class="{ 'bg-slate-900': {{ explode('.',Route::currentRouteName())[0] == 'users'?'true':'false' }} }" x-data="{ open: false }" x-init="$nextTick(() => open = {{ explode('.',Route::currentRouteName())[0] == 'users'?'true':'false' }})">
                        <a class="block yn xh lz b_ we"  href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fh">
                                <div class="flex items-center">
                                    <svg class="af on oz" viewBox="0 0 24 24">
                                        <path class="dd yt" :class="page.startsWith('ecommerce-') &amp;&amp; 'text-indigo-300'" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"></path>
                                        <path class="dd be" :class="page.startsWith('ecommerce-') &amp;&amp; '!text-indigo-600'" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"></path>
                                        <path class="dd gz" :class="page.startsWith('ecommerce-') &amp;&amp; 'text-indigo-500'" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"></path>
                                    </svg>
                                    <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Manage Users</span>
                                </div>
                                <div class="flex af r_ tek ttr 2xl:opacity--100 wn">
                                    <svg class="w-3 h-3 af rq dd yt" :class="open &amp;&amp; 'a_ ak'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="zq tez 2xl:block">
                            <ul class="mr io" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('users')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'users.users'?'text-indigo-500':'' }}">Users</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('roles')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'users.roles'?'text-indigo-500':'' }}">Roles</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('permissions')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'users.permissions'?'text-indigo-500':'' }}">Permissions</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan
                    <li class="vx vc rounded-sm im wg" :class="{ 'bg-slate-900': {{ explode('.',Route::currentRouteName())[1] == 'product'?'true':'false' }} }" x-data="{ open: false }" x-init="$nextTick(() => open = {{ explode('.',Route::currentRouteName())[1] == 'product'?'true':'false' }})">
                        <a class="block yn xh lz b_ we" :class="page.startsWith('admin/products/') &amp;&amp; 'hover--text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fh">
                                <div class="flex items-center">
                                    <svg class="af on oz" viewBox="0 0 24 24">
                                        <path
                                            class="dd gz"
                                            :class="page === 'campaigns' &amp;&amp; 'text-indigo-500'"
                                            d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"
                                        ></path>
                                        <path
                                            class="dd yt"
                                            :class="page === 'campaigns' &amp;&amp; 'text-indigo-300'"
                                            d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"
                                        ></path>
                                    </svg>
                                    <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Manage Product</span>
                                </div> 
                                <div class="flex af r_ tek ttr 2xl:opacity--100 wn">
                                    <svg class="w-3 h-3 af rq dd yt" :class="open &amp;&amp; 'a_ ak'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="zq tez 2xl:block">
                            <ul class="mr io" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ route('admin.product.index')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'admin.product.index'?'text-indigo-500':'' }}">Products</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ route('admin.product.main-category')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'admin.product.main-category'?'text-indigo-500':'' }}">Main categories</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ route('admin.product.sub-category')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'admin.product.sub-category'?'text-indigo-500':'' }}">Sub categories</span>
                                    </a>
                                </li>
                               
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ route('admin.product.slider') }}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'admin.product.slider'?'text-indigo-500':'' }}">Slider</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ route('admin.product.others')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'admin.product.others'?'text-indigo-500':'' }}">Others</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('shop-2')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'ecommerce.shop-2'?'text-indigo-500':'' }}">Shop 2</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('product')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'ecommerce.product'?'text-indigo-500':'' }}">Single Product</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('cart')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'ecommerce.cart'?'text-indigo-500':'' }}">Cart</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('cart-2')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'ecommerce.cart-2'?'text-indigo-500':'' }}">Cart 2</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('cart-3')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'ecommerce.cart-3'?'text-indigo-500':'' }}">Cart 3</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('pay')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'ecommerce.pay'?'text-indigo-500':'' }}">Pay</span> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="vx vc rounded-sm im wg" :class="{ 'bg-slate-900': {{ explode('.',Route::currentRouteName())[0] == 'community'?'true':'false' }}  }" x-data="{ open: false }" x-init="$nextTick(() => open = {{ explode('.',Route::currentRouteName())[0] == 'community'?'true':'false' }})">
                        <a class="block yn xh lz b_ we" :class="page.startsWith('community-') &amp;&amp; 'hover--text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fh">
                                <div class="flex items-center">
                                    <svg class="af on oz" viewBox="0 0 24 24">
                                        <path
                                            class="dd gz"
                                            :class="page.startsWith('community-') &amp;&amp; 'text-indigo-500'"
                                            d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"
                                        ></path>
                                        <path
                                            class="dd yt"
                                            :class="page.startsWith('community-') &amp;&amp; 'text-indigo-300'"
                                            d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"
                                        ></path>
                                    </svg>
                                    <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Community</span>
                                </div>
                                <div class="flex af r_ tek ttr 2xl:opacity--100 wn">
                                    <svg class="w-3 h-3 af rq dd yt" :class="open &amp;&amp; 'a_ ak'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="zq tez 2xl:block">
                            <ul class="mr io" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('users-tabs')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.users-tabs'?'text-indigo-500':'' }}">Users - Tabs</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('users-tiles')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.users-tiles'?'text-indigo-500':'' }}">Users - Tiles</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('profile')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.profile'?'text-indigo-500':'' }}">Profile</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz"  href="{{ url('feed')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.feed'?'text-indigo-500':'' }}">Feed</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('forum')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.forum'?'text-indigo-500':'' }}">Forum</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('forum-post')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.forum-post'?'text-indigo-500':'' }}">Forum - Post</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('meetups')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.meetups'?'text-indigo-500':'' }}">Meetups</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('meetups-post')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'community.meetups-post'?'text-indigo-500':'' }}">Meetups - Post</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @can('manage-finance')
                    <li class="vx vc rounded-sm im wg" :class="{ 'bg-slate-900': {{ explode('.',Route::currentRouteName())[1] == 'orders'?'true':'false' }} }" x-data="{ open: false }" x-init="$nextTick(() => open = {{ explode('.',Route::currentRouteName())[1] == 'orders'?'true':'false' }})">
                        <a class="block yn xh lz b_ we" :class="page.startsWith('finance-') &amp;&amp; 'hover--text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fh">
                                <div class="flex items-center">
                                    <svg class="af on oz" viewBox="0 0 24 24">
                                        <path class="dd yt" :class="page.startsWith('finance-') &amp;&amp; 'text-indigo-300'" d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z"></path>
                                        <path
                                            class="dd be"
                                            :class="page.startsWith('finance-') &amp;&amp; '!text-indigo-500'"
                                            d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z"
                                        ></path>
                                        <path 
                                            class="dd gz"
                                            :class="page.startsWith('finance-') &amp;&amp; 'text-indigo-600'"
                                            d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z"
                                        ></path>
                                    </svg>
                                    <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Orders</span>
                                </div>
                                <div class="flex af r_ tek ttr 2xl:opacity--100 wn">
                                    <svg class="w-3 h-3 af rq dd yt" :class="open &amp;&amp; 'a_ ak'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="zq tez 2xl:block">
                            <ul class="mr io" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ route('admin.orders.index')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'admin.orders.index'?'text-indigo-500':'' }}">Order</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ route('admin.orders.transactions')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'admin.orders.transactions'?'text-indigo-500':'' }}">Transactions</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('transaction-details')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'finance.details'?'text-indigo-500':'' }}">Transaction Details</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan
                    <li class="vx vc rounded-sm im wg {{Route::currentRouteName()=='admin.cupon'?'bg-slate-900':''}}">
                        <a class="block yn xh lz b_ we" :class="page === 'tasks' &amp;&amp; 'hover--text-slate-200'" href="{{ url('admin/cupon')}}">
                            <div class="flex items-center">
                                <svg class="af on oz" viewBox="0 0 24 24">
                                    <path class="dd gz" :class="page === 'tasks' &amp;&amp; 'text-indigo-500'" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z"></path>
                                    <path class="dd gz" :class="page === 'tasks' &amp;&amp; 'text-indigo-500'" d="M1 1h22v23H1z"></path>
                                    <path class="dd yt" :class="page === 'tasks' &amp;&amp; 'text-indigo-300'" d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z"></path>
                                </svg>
                                <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Cupon</span>
                            </div>
                        </a>
                    </li>
                    <li class="vx vc rounded-sm im wg {{Route::currentRouteName()=='admin.posts'?'bg-slate-900':''}}">
                        <a class="block yn xh lz b_ we" :class="page === 'inbox' &amp;&amp; 'hover--text-slate-200'" href="{{ route('admin.posts')}}">
                            <div class="flex items-center">
                                <svg class="af on oz" viewBox="0 0 24 24">
                                    <path class="dd gz" :class="page === 'inbox' &amp;&amp; 'text-indigo-500'" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"></path>
                                    <path
                                        class="dd yt"
                                        :class="page === 'inbox' &amp;&amp; 'text-indigo-300'"
                                        d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"
                                    ></path>
                                </svg>
                                <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Blog Post</span>
                            </div>
                        </a>
                    </li>
                   
                    <li class="vx vc rounded-sm im wg" :class="{ 'bg-slate-900': {{ explode('.',Route::currentRouteName())[0] == 'settings'?'true':'false' }} }" x-data="{ open: false }" x-init="$nextTick(() => open = {{ explode('.',Route::currentRouteName())[0] == 'settings'?'true':'false' }})">
                        <a class="block yn xh lz b_ we" :class="page.startsWith('settings-') &amp;&amp; 'hover--text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fh">
                                <div class="flex items-center">
                                    <svg class="af on oz" viewBox="0 0 24 24">
                                        <path
                                            class="dd gz"
                                            :class="page.startsWith('settings-') &amp;&amp; 'text-indigo-500'"
                                            d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"
                                        ></path>
                                        <path
                                            class="dd yt"
                                            :class="page.startsWith('settings-') &amp;&amp; 'text-indigo-300'"
                                            d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"
                                        ></path>
                                        <path
                                            class="dd gz"
                                            :class="page.startsWith('settings-') &amp;&amp; 'text-indigo-500'"
                                            d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"
                                        ></path>
                                        <path
                                            class="dd yt"
                                            :class="page.startsWith('settings-') &amp;&amp; 'text-indigo-300'"
                                            d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"
                                        ></path>
                                    </svg>
                                    <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Settings</span>
                                </div>
                                <div class="flex af r_ tek ttr 2xl:opacity--100 wn">
                                    <svg class="w-3 h-3 af rq dd yt" :class="open &amp;&amp; 'a_ ak'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="zq tez 2xl:block">
                            <ul class="mr io" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('settings')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'settings.account'?'text-indigo-500':'' }}">My Account</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz"  href="{{ url('notifications')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'settings.notifications'?'text-indigo-500':'' }}">My Notifications</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('connected-apps')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'settings.apps'?'text-indigo-500':'' }}">Connected Apps</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('plans')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'settings.plans'?'text-indigo-500':'' }}">Plans</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('billing')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'settings.billing'?'text-indigo-500':'' }}">Billing &amp; Invoices</span>
                                    </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz"  href="{{ url('feedback')}}">
                                        <span class="text-sm gm tek ttr 2xl:opacity--100 wn {{ Route::currentRouteName() == 'settings.feedback'?'text-indigo-500':'' }}">Give Feedback</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="gp gb text-slate-500 gg gn"><span class="hidden zk tte 2xl:hidden gu oz" aria-hidden="true">•••</span> <span class="zq tez 2xl:block">More</span></h3>
                <ul class="ip">
                <li class="vx vc rounded-sm im wg" :class="{ 'bg-slate-900': {{ explode('.',Route::currentRouteName())[0] == 'auth'?'true':'false' }} }" x-data="{ open: false }" x-init="$nextTick(() => open = {{ explode('.',Route::currentRouteName())[0] == 'auth'?'true':'false' }})">
                        <a class="sidebar-expander-link block yn xh b_ we" :class="open &amp;&amp; 'hover--text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fh">
                                <div class="flex items-center">
                                    <svg class="af on oz" viewBox="0 0 24 24">
                                        <path class="dd gz" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
                                        <path class="dd yt" d="M15 12L8 6v5H0v2h8v5z"></path>
                                    </svg>
                                    <span class="text-sm gm ml-3 tek ttr 2xl:opacity--100 wn">Authentication</span>
                                </div>
                                <div class="flex af r_ tek ttr 2xl:opacity--100 wn">
                                    <svg class="w-3 h-3 af rq dd yt" :class="{ 'a_ ak': open }" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="zq tez 2xl:block">
                            <ul class="mr io" :class="{ 'hidden': !open }" x-cloak="">
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('signin')}}"> <span class="text-sm gm tek ttr 2xl:opacity--100 wn">Sign In</span> </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('signup')}}"> <span class="text-sm gm tek ttr 2xl:opacity--100 wn">Sign up</span> </a>
                                </li>
                                <li class="rx wg">
                                    <a class="block yt hover--text-slate-200 b_ we lz" href="{{ url('reset-password')}}"> <span class="text-sm gm tek ttr 2xl:opacity--100 wn">Reset Password</span> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mq hidden zj 2xl:hidden justify-end sh">
            <div class="vx vc">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="tc">Expand / collapse sidebar</span>
                    <svg class="oz on dd kp" viewBox="0 0 24 24">
                        <path class="yt" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                        <path class="gz" d="M3 23H1V1h2z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>