<div class="td">
    <!-- Content -->
    <div class="va jn teb vf ox uz ri uq">
        <!-- Page header -->
        <div class="_u _w _g rw j_">
            <!-- Left: Title -->
            <div class="rw kj">
                <h1 class="gc zc text-slate-800 font-bold">$47,347.09</h1>
            </div>

            <!-- Right: Actions -->
            <div class="sx fr _p fc _b fp">
                <div class="hidden _s">
                    <form class="td">
                        <label for="action-search" class="tc">Search</label> <input id="action-search" class="tn mr xk" type="search" placeholder="Search…" />
                        <button class="tp tm tg kr" type="submit" aria-label="Search">
                            <svg class="o_ sq af dd yt ks ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                <button class="btn hd wq ye">Export Transactions</button>
            </div>
        </div>

        <div class="ic">
            <span>Transactions from </span>
            <div class="td inline-flex" x-data="{ open: false }">
                <button class="inline-flex justify-center items-center kr" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                    <div class="flex items-center lz">
                        <span class="lz gm text-indigo-500 ka">My Business Account</span>
                        <svg class="w-3 h-3 af rq dd text-indigo-400" viewBox="0 0 12 12">
                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                        </svg>
                    </div>
                </button>
                <div
                    class="ah nv tp tq tb uw bg-white border border-slate-200 vz rounded bh lw io"
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
                    <ul>
                        <li>
                            <a class="gm text-sm gz xl flex items-center vk vx" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Business Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="ic">
            <ul class="flex flex-wrap -m-1">
                <li class="m-1">
                    <button wire:click="filter('%')" class="inline-flex items-center justify-center text-sm gm gj rounded-full vx vk border ck bd hd ye we wi">View All</button>
                </li>
                <li class="m-1">
                    <button wire:click="filter('completed')" class="inline-flex items-center justify-center text-sm gm gj rounded-full vx vk border border-slate-200 hover--border-slate-300 bd bg-white text-slate-500 we wi">Completed</button>
                </li>
                <li class="m-1">
                    <button wire:click="filter('pending')" class="inline-flex items-center justify-center text-sm gm gj rounded-full vx vk border border-slate-200 hover--border-slate-300 bd bg-white text-slate-500 we wi">Pending</button>
                </li>
                <li class="m-1">
                    <button wire:click="filter('canceled')" class="inline-flex items-center justify-center text-sm gm gj rounded-full vx vk border border-slate-200 hover--border-slate-300 bd bg-white text-slate-500 we wi">Canceled</button>
                </li>
            </ul>
        </div>

        <!-- Table -->
        <div class="bg-white">
            <div x-data="handleSelect">
                <div class="lx">
                    <table class="ac ox" @click.stop="$dispatch('set-transactionopen', true)">
                        <thead class="gp gg gb text-slate-500 cg cm border-slate-200">
                            <tr>
                                <th class="vg wv ww vl ct"><div class="gg go">Transaction id</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Email</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Mayment Mthod</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Currency</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Payment Fee</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Total Payed</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Total Received</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Payed At</div></th>
                                <th class="vg wv ww vl ct"><div class="gg go">Status</div></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm lh ld cm border-slate-200">
                            @foreach ($transactions as $transaction )
                            <tr class="aq">
                                <td class="vg wv ww vl ct qa">{{ $transaction->transaction_id}}</td>
                                <td class="vg wv ww vl ct"><div class="go">{{ $transaction->payer_email }}</div></td>
                                <td class="vg wv ww vl ct"><div class="go">{{ $transaction->payment_method }}</div></td>
                                <td class="vg wv ww vl ct"><div class="go">{{ $transaction->currency }}</div></td>
                                <td class="vg wv ww vl ct"><div class="go">{{ $transaction->payment_fee }}</div></td>
                                <td class="vg wv ww vl ct"><div class="go">{{ $transaction->total }}</div></td>
                                <td class="vg wv ww vl ct"><div class="go">{{ $transaction->total - $transaction->payment_fee }}</div></td>
                                <td class="vg wv ww vl ct oj"><div class="ga be gm">{{ $transaction->created_at }}</div></td>
                                <td class="vg wv ww vl ct">
                                    <div class="go" >
                                        <select wire:model="statusUpdate" name="statusUpdate" id="">
                                            <option {{$transaction->status == 'pending'?'selected':''}} value="pending">Pending</option>
                                            <option {{$transaction->status == 'completed'?'selected':''}} value="completed">Completed</option>
                                            <option {{$transaction->status == 'Verified'?'selected':''}} value="verified">Verified</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("handleSelect", () => ({
                    selectall: !1,
                    selectAction() {
                        (countEl = document.querySelector(".table-items-action")),
                            countEl &&
                                ((checkboxes = document.querySelectorAll("input.table-item:checked")),
                                (document.querySelector(".table-items-count").innerHTML = checkboxes.length),
                                checkboxes.length > 0 ? countEl.classList.remove("hidden") : countEl.classList.add("hidden"));
                    },
                    toggleAll() {
                        (this.selectall = !this.selectall),
                            (checkboxes = document.querySelectorAll("input.table-item")),
                            [...checkboxes].map((e) => {
                                e.checked = this.selectall;
                            }),
                            this.selectAction();
                    },
                    uncheckParent() {
                        (this.selectall = !1), (document.getElementById("parent-checkbox").checked = !1), this.selectAction();
                    },
                }));
            });
        </script>

        <!-- Pagination -->
        <div class="ie">
            <div class="flex fu _d _g _w">
                <nav class="rw kj km" role="navigation" aria-label="Navigation">
                    <ul class="flex justify-center">
                        <li class="ml-3 first--ml-0"><a class="btn bg-white border-slate-200 yd az" href="#0" disabled="disabled">&lt;- Previous</a></li>
                        <li class="ml-3 first--ml-0"><a class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" href="#0">Next -&gt;</a></li>
                    </ul>
                </nav>
                <div class="text-sm text-slate-500 gu jo">Showing <span class="gm gz">1</span> to <span class="gm gz">10</span> of <span class="gm gz">467</span> results</div>
            </div>
        </div>
    </div>
    @if($selected)
    <!-- Transaction Panel -->
    <div wire:click="$set('selected',0)" class="tp tm kv ny a_ bq wn wi" :class="transactionOpen ? 'translate-x-0' : 'aw'" @click.outside="transactionOpen = false" @keydown.escape.window="transactionOpen = false" x-cloak="">
        <div class="tv np hw l_ lk ta af cw border-slate-200 ox _c om">
            <button class="tp tk tw ir ib kr vs" @click="transactionOpen = false">
                <svg class="o_ sq dm ki" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m7.95 6.536 4.242-4.243a1 1 0 1 1 1.415 1.414L9.364 7.95l4.243 4.242a1 1 0 1 1-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 0 1-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 0 1 1.414-1.414L7.95 6.536Z"
                    ></path>
                </svg>
            </button>
            
            <div class="vf va teb">
                <div class="at ri teo">
                    <div class="text-slate-800 gg gu rx">Bank Transfer</div>
                    <div class="text-sm gu gw">22/01/2022, 8:56 PM</div>
                    <div class="bw sp">
                        <div class="bg-white cl v_ gr gu">
                            <div class="it gu"><img class="inline-flex ua oa rounded-full sd" src="{{ asset('images/transactions-image-04.svg')}}" width="48" height="48" alt="Transaction 04" /></div>
                            <div class="gc gg yf rx">+$2,179.36</div>
                            <div class="text-sm gm text-slate-800 it">Acme LTD UK</div>
                            <div class="gp inline-flex gm hp text-slate-500 rounded-full gu vm vk">Pending</div>
                        </div>
                        <div class="flex fh items-center" aria-hidden="true">
                            <svg class="uf oh db" xmlns="http://www.w3.org/2000/svg"><path d="M0 20c5.523 0 10-4.477 10-10S5.523 0 0 0h20v20H0Z"></path></svg>
                            <div class="al ox oh bg-white flex fu justify-center"><div class="of ox cg cx border-slate-200"></div></div>
                            <svg class="uf oh db ak" xmlns="http://www.w3.org/2000/svg"><path d="M0 20c5.523 0 10-4.477 10-10S5.523 0 0 0h20v20H0Z"></path></svg>
                        </div>
                        <div class="bg-white cc vi gi text-sm le">
                            <div class="flex fh lf"><span class="gw">IBAN:</span> <span class="gm be ga">IT17 2207 1010 0504 0006 88</span></div>
                            <div class="flex fh lf"><span class="gw">BIC:</span> <span class="gm be ga">BARIT22</span></div>
                            <div class="flex fh lf"><span class="gw">Reference:</span> <span class="gm be ga">Freelance Work</span></div>
                            <div class="flex fh lf"><span class="gw">Emitter:</span> <span class="gm be ga">Acme LTD UK</span></div>
                        </div>
                    </div>
                    <div class="ir">
                        <div class="text-sm gg text-slate-800 in">Receipts</div>
                        <form class="rounded hp border cx hs gu v_ vf">
                            <svg class="inline-flex o_ sq dm it" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 4c-.3 0-.5.1-.7.3L1.6 10 3 11.4l4-4V16h2V7.4l4 4 1.4-1.4-5.7-5.7C8.5 4.1 8.3 4 8 4ZM1 2h14V0H1v2Z"></path>
                            </svg>
                            <label for="upload" class="block text-sm text-slate-500 gw">We accept PNG, JPEG, and PDF files.</label> <input class="tc" id="upload" type="file" />
                        </form>
                    </div>
                    <div class="ir">
                        <div class="text-sm gg text-slate-800 in">Notes</div>
                        <form><label class="tc" for="notes">Write a note</label> <textarea id="notes" class="tr ox xk" rows="4" placeholder="Write a note…"></textarea></form>
                    </div>
                    <div class="flex items-center lo ir">
                        <div class="ul">
                            <button class="btn ox border-slate-200 hover--border-slate-300 gz">
                                <svg class="o_ sq dd yt af ak" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 4c-.3 0-.5.1-.7.3L1.6 10 3 11.4l4-4V16h2V7.4l4 4 1.4-1.4-5.7-5.7C8.5 4.1 8.3 4 8 4ZM1 2h14V0H1v2Z"></path>
                                </svg>
                                <span class="r_">Download</span>
                            </button>
                        </div>
                        <div class="ul">
                            <button class="btn ox border-slate-200 hover--border-slate-300 yi">
                                <svg class="o_ sq dd af" viewBox="0 0 16 16">
                                    <path
                                        d="M7.001 3h2v4h-2V3Zm1 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM15 16a1 1 0 0 1-.6-.2L10.667 13H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1ZM2 11h9a1 1 0 0 1 .6.2L14 13V2H2v9Z"
                                    ></path>
                                </svg>
                                <span class="r_">Report</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @endif
</div>
