<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>N-Shopping Admin pannel</title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="{{ asset('css/app.css')}}" rel="stylesheet" />
        <!-- <link href="{{ asset('admin/css/cssof_index.css')}}" rel="stylesheet" /> -->
    </head>

    <body
        class="gl br hp gz"
        :class="{ 'sidebar-expanded': sidebarExpanded }"
        x-data="{ page: 'dashboard-main', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
        x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
        <script>
            if (localStorage.getItem("sidebar-expanded") == "true") {
                document.querySelector("body").classList.add("sidebar-expanded");
            } else {
                document.querySelector("body").classList.remove("sidebar-expanded");
            }
        </script>

        <!-- Page wrapper -->
        <div class="flex sj lw">
            <!-- Sidebar -->
            @include('layouts.admin.sidebar')
            <!-- Content area -->
            <div class="td flex fu au lk l_">
                <!-- Site header -->
                @include('layouts.admin.navbar')

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div> 

        <script src="{{ asset('admin/js/jsof_index.js')}}"></script>
        
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125021779-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "UA-125021779-1", { anonymize_ip: true });
        </script>
    </body>
</html>
