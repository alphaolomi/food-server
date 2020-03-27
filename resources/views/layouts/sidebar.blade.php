<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                {{-- <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div> --}}
                <span class="font-weight-bold">{{ config('app.name', 'Laravel') }}</span>

            </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-th-large"></i> Foods <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li >
                            <a href="{{ route('foods.index') }}"> List </a>
                        </li>
                        <li>
                            <a href="{{ route('foods.create') }}"> Add Food </a>
                        </li>
                    </ul>
                </li>

{{--               <li>--}}
{{--                    <a href="forms.html">--}}
{{--                        <i class="fa fa-pencil-square-o"></i> Forms </a>--}}
{{--                </li>--}}

            </ul>
        </nav>
    </div>
    <footer class="sidebar-footer">
        <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <a href=""><i class="fa fa-cog"></i> Admin </a>
            </li>
        </ul>
    </footer>
</aside>
