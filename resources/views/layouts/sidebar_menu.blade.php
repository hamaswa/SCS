<ul class="sidebar-menu" data-widget="tree">
    <!-- Optionally, you can add icons to the links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>

    @else
        @if(request()->user()->hasRole("admin3"))
            <li class="nav-item">
                <a class="nav-link" href="{{ route("register.create") }}">Add User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("users.index") }}">Users</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route("aafields.index") }}">Dropdown Options</a>
            </li>
        @endif
        @if(request()->user()->hasRole("processor") or request()->user()->hasRole("maker"))
            <li class="nav-item">
                <a class="nav-link" href="{{ route("pipeline.index") }}">WIP</a>
            </li>
            <li class="treeview">
                <a href="#"><span> Pipeline</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("aadata.index") }}">New AA</a>
                    </li>


                </ul>
            </li>

        @endif
        @if(request()->user()->hasRole("data_entry"))
            <li class="nav-item">
                <a class="nav-link" href="{{ route("housingloan.index") }}">Facility Info</a>
            </li>
        @endif
        @if(!request()->user()->hasRole("admin1") and !request()->user()->hasRole("admin1") and !request()->user()->hasRole("admin1"))
            <li class="nav-item">
                <a class="nav-link" href="{{ route("members.index") }}">Group Structure</a>
            </li>
        @endif
        @if(request()->user()->hasRole("maker"))
            <li class="treeview">
                <a href="#"><span> Maker</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("maker.index") }}">Maker</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("new_aa") }}">New AA</a>
                    </li>
                </ul>
            </li>
        @endif

            @if(request()->user()->hasRole("uploader"))
                <li class="treeview">
                    <a href="#"><span> Uploader</span>
                        <span class="pull-right-container"> <i
                                    class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("uploader_la.index") }}">Loan
                                Applications</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(request()->user()->hasRole("requestor"))
                <li class="treeview">
                    <a href="#"><span> Requestor</span>
                        <span class="pull-right-container"> <i
                                    class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("requestor.index") }}">Request Case</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(request()->user()->hasRole("checker"))
                <li class="treeview">
                    <a href="#"><span> Checker</span>
                        <span class="pull-right-container"> <i
                                    class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("checker.index") }}">WIP</a>
                            <a class="nav-link" href="{{ route("checker.workinprogress") }}">Group List</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(request()->user()->hasRole("processor"))
                <li class="treeview">
                    <a href="#"><span> Processor</span>
                        <span class="pull-right-container"> <i
                                    class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("processor.index") }}">WIP</a>
                            <a class="nav-link" href="{{ route("processor.workinprogress") }}">Group List</a>
                        </li>
                    </ul>
                </li>
            @endif




    @endguest

</ul>
