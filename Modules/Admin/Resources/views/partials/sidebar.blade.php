<section class="menu-nav flex flex-direction-column align-items-center">
    <div class="menu-header flex align-items-center justify-content-space-between">
        <a href="{{ route('admin.dashboard') }}">DCms</a>
        <i class="fa fa-toggle-on toggle-menu" aria-hidden="true"></i>
    </div>
    <ul class="menu-items flex flex-direction-column justify-content-center">
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#"><i class="fa fa-user"></i>
                <span>Admin
                    <i class="fa fa-angle-right arrowRight"></i>
                </span>
            </a>
            <ul class="menu-item-collapse">
                <li><a href="{{ route('admin.admins.index') }}">List</a></li>
                <li><a href="{{ route('admin.admins.create') }}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#"><i class="fa fa-users"></i> <span>Roles</span></a>
        </li>
        <li class="menu-item">
            <a href="#"><i class="fa fa-article"></i>
                <span>Blog
                    <i class="fa fa-angle-right arrowRight"></i>
                </span>
            </a>
            <ul class="menu-item-collapse">
                <li><a href="{{ route('admin.admins.index') }}">Article</a></li>
                <li><a href="{{ route('admin.admins.create') }}">Category</a></li>
                <li><a href="{{ route('admin.admins.create') }}">Tag</a></li>
            </ul>
        </li>
    </ul>
    {!! $sidebar !!}
</section>
