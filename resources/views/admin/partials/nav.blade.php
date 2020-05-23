<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">MENU</li>
	<!-- Optionally, you can add icons to the links -->
	{{-- <li {{request()->is('admin') ? 'class=active':''}}> --}}
	<li class="{{setActiveRoute('dashboard')}}">
		<a href="{{route('dashboard')}}"><i class="fa fa-home"></i> <span>HOME</span></a>
	</li>
	{{-- <li class="treeview {{request()->is('admin/posts*') ? 'active':''}}"> --}}
	<li class="treeview {{setActiveRoute('admin.posts.index')}}">
		<a href="#"><i class="fa fa-bars"></i> <span>BLOG</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			{{-- @can('view', new App\Post) --}}
				{{-- <li {{request()->is('admin/posts') ? 'class=active':''}}> --}}
				<li class="{{setActiveRoute('admin.posts.index')}}">
					<a href="{{route('admin.posts.index')}}"><i class="fa fa-eye"></i>&thinsp;All Posts</a>
				</li>
			{{-- @endcan --}}
			@can('create', new App\Post)
				<li>
					@if(request()->is('admin/posts/*'))
						<a href="{{route('admin.posts.index','#create')}}" title="Create Post"><i class="fa fa-pencil"></i>&thinsp;Create Post</a>
					@else
						<a href="event.preventDefault();" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>&thinsp;Create Post</a>
					@endif
				</li>
			@endcan
		</ul>
	</li>
	<!-- Sidebar Menu -->
	@can('view', new App\User)
		{{-- <li class="treeview {{request()->is('admin/posts*') ? 'active':''}}"> --}}
		<li class="treeview {{setActiveRoute(['admin.users.index','admin.users.create'])}}">
			<a href="#"><i class="fa fa-address-book"></i> <span>Users</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				{{-- <li {{request()->is('admin/posts') ? 'class=active':''}}> --}}
				<li class="{{setActiveRoute('admin.users.index')}}">
					<a href="{{route('admin.users.index')}}"><i class="fa fa-eye"></i>&thinsp;All Users</a>
				</li>
				<li class="{{setActiveRoute('admin.users.create')}}">
					<a href="{{route('admin.users.create')}}" title="Create User"><i class="fa fa-pencil"></i>&thinsp;Create User</a>
				</li>
			</ul>
		</li>
	@else
		<li class="{{setActiveRoute(['admin.users.show', 'admin.users.edit'])}}">
			<a href="{{route('admin.users.show', auth()->user())}}"><i class="fa fa-user"></i> <span>Profile</span></a>
		</li>
	@endcan
	<!-- /.sidebar-menu -->
	@can('view', new \Spatie\Permission\Models\Role)
		<li class="{{setActiveRoute(['admin.roles.index','admin.roles.edit'])}}">
			<a href="{{route('admin.roles.index')}}"><i class="fa fa-users"></i> <span>Roles</span></a>
		</li>
	@endcan
	@can('view', new \Spatie\Permission\Models\Permission)
		<li class="{{setActiveRoute(['admin.permissions.index','admin.roles.edit'])}}">
			<a href="{{route('admin.permissions.index')}}"><i class="fa fa-users"></i> <span>Permissions</span></a>
		</li>
	@endcan
</ul>
<!-- /.sidebar-menu -->
<!----------------------------------------------------------------------------------------->
