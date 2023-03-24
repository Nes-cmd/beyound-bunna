<header class="tv tk bg-white cm border-slate-200 ng">
    <div class="va jn teb">
        <div class="flex items-center fh ou iq">
            <div class="flex">
                <button class="text-slate-500 hover--text-slate-600 zq" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="tc">Open sidebar</span>
                    <svg class="oz on dd" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2"></rect>
                        <rect x="4" y="11" width="16" height="2"></rect>
                        <rect x="4" y="17" width="16" height="2"></rect>
                    </svg>
                </button>
            </div>
            <div class="flex items-center lo">
                <div x-data="{ searchOpen: false }">
                    <button
                        class="un or flex items-center justify-center hp xr b_ we rounded-full"
                        :class="{ 'hv': searchOpen }"
                        @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
                        aria-controls="search-modal"
                    >
                        <span class="tc">Search</span>
                        <svg class="o_ sq" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="dd text-slate-500" d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                            <path class="dd yt" d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                        </svg>
                    </button>
                    <div
                        class="th tm bg-slate-900 pd nm bj"
                        x-show="searchOpen"
                        x-transition:enter="b_ ws wn"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="bf"
                        x-transition:leave="b_ ws wt"
                        x-transition:leave-start="bf"
                        x-transition:leave-end="opacity-0"
                        aria-hidden="true"
                        x-cloak=""
                    ></div>
                    <div
                        id="search-modal"
                        class="th tm nm lw flex ff nn rw justify-center a_ va jn"
                        role="dialog"
                        aria-modal="true"
                        x-show="searchOpen"
                        x-transition:enter="b_ wi wn"
                        x-transition:enter-start="opacity-0 ab"
                        x-transition:enter-end="bf ag"
                        x-transition:leave="b_ wi wn"
                        x-transition:leave-start="bf ag"
                        x-transition:leave-end="opacity-0 ab"
                        x-cloak=""
                    >
                        <div class="bg-white lb ae ox oy rounded bh" @click.outside="searchOpen = false" @keydown.escape.window="searchOpen = false">
                            <form class="cm border-slate-200">
                                <div class="td">
                                    <label for="modal-search" class="tc">Search</label> <input id="modal-search" class="ox cv xj bi fn vl mv mm" type="search" placeholder="Search Anything…" x-ref="searchInput" />
                                    <button class="tp tm tg kr" type="submit" aria-label="Search">
                                        <svg class="o_ sq af dd yt ks iy mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <div class="vj vg">
                                <div class="it wg">
                                    <div class="gp gg yt gb vg in">Recent searches</div>
                                    <ul class="text-sm">
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                    ></path>
                                                </svg>
                                                <span>Form Builder - 23 hours on-demand video</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                    ></path>
                                                </svg>
                                                <span>Access Mosaic on mobile and TV</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                    ></path>
                                                </svg>
                                                <span>Product Update - Q4 2021</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                    ></path>
                                                </svg>
                                                <span>Master Digital Marketing Strategy course</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                    ></path>
                                                </svg>
                                                <span>Dedicated forms for products</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"
                                                    ></path>
                                                </svg>
                                                <span>Product Update - Q4 2021</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="it wg">
                                    <div class="gp gg yt gb vg in">Recent pages</div>
                                    <ul class="text-sm">
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16"><path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z"></path></svg>
                                                <span><span class="gm text-slate-800 ku">Messages</span> - Conversation / … / Mike Mills</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center vs text-slate-800 xh xs rounded kr" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                <svg class="o_ sq dd yt ku kf af rk" viewBox="0 0 16 16"><path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z"></path></svg>
                                                <span><span class="gm text-slate-800 ku">Messages</span> - Conversation / … / Eva Patrick</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td inline-flex" x-data="{ open: false }">
                    <button class="un or flex items-center justify-center hp xr b_ we rounded-full" :class="{ 'hv': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                        <span class="tc">Notifications</span>
                        <svg class="o_ sq" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="dd text-slate-500" d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z"></path>
                            <path
                                class="dd yt"
                                d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z"
                            ></path>
                        </svg>
                        <div class="tp tk tw ui os hq cp c_ rounded-full"></div>
                    </button>
                    <div
                        class="ah nv tp tq tw il kz ub bg-white border border-slate-200 vz rounded bh lw io"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-show="open"
                        x-transition:enter="b_ ws wn a_"
                        x-transition:enter-start="opacity-0 am"
                        x-transition:enter-end="bf ag"
                        x-transition:leave="b_ ws wn"
                        x-transition:leave-start="bf"
                        x-transition:leave-end="opacity-0"
                        x-cloak=""
                    >
                        <div class="gp gg yt gb mo ma va">Notifications</div>
                        <ul>
                            <li class="cm border-slate-200 wb">
                                <a class="block vc va wz" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <span class="block text-sm in">
                                        📣 <span class="gm text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                                    </span>
                                    <span class="block gp gm yt">Feb 12, 2021</span>
                                </a>
                            </li>
                            <li class="cm border-slate-200 wb">
                                <a class="block vc va wz" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <span class="block text-sm in">
                                        📣 <span class="gm text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                                    </span>
                                    <span class="block gp gm yt">Feb 9, 2021</span>
                                </a>
                            </li>
                            <li class="cm border-slate-200 wb">
                                <a class="block vc va wz" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <span class="block text-sm in">
                                        🚀<span class="gm text-slate-800">Say goodbye to paper receipts!</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                                    </span>
                                    <span class="block gp gm yt">Jan 24, 2020</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="td inline-flex" x-data="{ open: false }">
                    <button class="un or flex items-center justify-center hp xr b_ we rounded-full" :class="{ 'hv': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                        <span class="tc">Info</span>
                        <svg class="o_ sq" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="dd text-slate-500" d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                        </svg>
                    </button>
                    <div
                        class="ah nv tp tq tw uw bg-white border border-slate-200 vz rounded bh lw io"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-show="open"
                        x-transition:enter="b_ ws wn a_"
                        x-transition:enter-start="opacity-0 am"
                        x-transition:enter-end="bf ag"
                        x-transition:leave="b_ ws wn"
                        x-transition:leave-start="bf"
                        x-transition:leave-end="opacity-0"
                        x-cloak=""
                    >
                        <div class="gp gg yt gb mo ma vx">Need help?</div>
                        <ul>
                            <li>
                                <a class="gm text-sm text-indigo-500 xu flex items-center vk vx" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 dd text-indigo-300 af mr-2" viewBox="0 0 12 12">
                                        <rect y="3" width="12" height="9" rx="1"></rect>
                                        <path d="M2 0h8v2H2z"></path>
                                    </svg>
                                    <span>Documentation</span>
                                </a>
                            </li>
                            <li>
                                <a class="gm text-sm text-indigo-500 xu flex items-center vk vx" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 dd text-indigo-300 af mr-2" viewBox="0 0 12 12">
                                        <path d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z"></path>
                                    </svg>
                                    <span>Support Site</span>
                                </a>
                            </li>
                            <li>
                                <a class="gm text-sm text-indigo-500 xu flex items-center vk vx" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 dd text-indigo-300 af mr-2" viewBox="0 0 12 12">
                                        <path d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z"></path>
                                    </svg>
                                    <span>Contact us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="oj on hv" />
                <div class="td inline-flex" x-data="{ open: false }">
                    <button class="inline-flex justify-center items-center kr" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                        <img class="un or rounded-full" src="images/user-avatar-32.png" width="32" height="32" alt="User" />
                        <div class="flex items-center lz">
                            <span class="lz r_ text-sm gm ko">{{ auth()->user()->first_name}}</span> <svg class="w-3 h-3 af rq dd yt" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                        </div>
                    </button>
                    <div
                        class="ah nv tp tq tw uw bg-white border border-slate-200 vz rounded bh lw io"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-show="open"
                        x-transition:enter="b_ ws wn a_"
                        x-transition:enter-start="opacity-0 am"
                        x-transition:enter-end="bf ag"
                        x-transition:leave="b_ ws wn"
                        x-transition:leave-start="bf"
                        x-transition:leave-end="opacity-0"
                        x-cloak=""
                    >
                        <div class="mf ma vx rx cm border-slate-200">
                            <div class="gm text-slate-800">{{auth()->user()->first_name}}</div>
                            <div class="gp text-slate-500 gw">{{auth()->user()->roles()->first()->name}}</div>
                        </div>
                        <ul>
                            <li><a class="gm text-sm text-indigo-500 xu flex items-center vk vx" href="{{ url('settings')}}" @click="open = false" @focus="open = true" @focusout="open = false">Settings</a></li>
                            <li>
                                <form action="{{ route('logout')}}" method="post">
                                    @csrf
                                <button type="submit" class="gm text-sm text-indigo-500 xu flex items-center vk vx" @click="open = false" @focus="open = true" @focusout="open = false">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>