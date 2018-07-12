<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('public/img/') }}/YUSUF.jpg" class="img-circle" alt="User Image">
                {{--<img src="{{ url('/') }}/public/img/{{$uData->pic}}" width="80px" height="80px" class="img-circle" />--}}
            </div>
            <div class="pull-left info">
                <p>Mahbub Nayeem</p>
                <a href="#"><i class="fa fa-circle text-success"></i></a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">

                    <li class="#"><a href="/finalProject"><i class="fa fa-circle-o"></i>Home</a></li>
                    <li class="#"><a href="/finalProject/posts"><i class="fa fa-circle-o"></i>Post</a></li>
                    <li><a href="/finalProject/admin/categories"><i class="fa fa-circle-o"></i> Categories</a></li>
                    <li><a href="{{ route('admin.tags.index') }}"><i class="fa fa-circle-o"></i> Tag</a></li>
                    {{--<li><a href="{{url('/admin/users')}}"><i class="fa fa-circle-o"></i> Users</a></li>--}}

            </li>







        </ul>
    </section>
    <!-- /.sidebar -->
</aside>