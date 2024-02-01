<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li ><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> </a>
            <ul <?php if (preg_match("/user/i", '$url')){ ?> style="display: block;" <?php } ?>>
                <li <?php if (preg_match("/add/i", '$url')){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add')}}">Add User</a></li>
                <li <?php if (preg_match("/list/i", '$url')){ ?> class="active" <?php } ?>><a href="{{ url('')}}">View Users</a></li>
            </ul>
        </li>
    </ul>
</div>

