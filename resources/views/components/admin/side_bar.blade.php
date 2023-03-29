<a href="{{route('admin.profiles.index')}}" class="btn btn-primary w-50 mb-2">Profile</a>
<a href="{{route('admin.admin-list.index')}}" class="btn btn-primary w-50 mb-2">Admin List</a>
<a href="{{route('admin.category.index')}}" class="btn btn-primary w-50 mb-2">Category</a>
<a href="{{route('admin.post.index')}}" class="btn btn-primary w-50 mb-2">Post</a>
<a href="{{route('admin.trend-post.index')}}" class="btn btn-primary w-50 mb-2">Trend Post</a>
<form action="{{route('logout')}}" method="post">
    @csrf
    <button class="btn btn-primary w-50 mb-2">Logout</button>
</form>
