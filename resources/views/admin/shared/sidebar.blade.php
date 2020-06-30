<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class="text-center">Hi {{ Auth::user()->name }} </h3>
    </div>
    <ul class="list-unstyled components">
        <!-- <p>Order Drink</p> -->

        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">USER</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('role.index')}}">Role</a>
                </li>
                <li>
                    <a href="{{route('user.index')}}">User Admin</a>
                    <a href="{{route('userclient.index')}}">User Client</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">PRODUCT</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{route('category.index')}}">Categories</a>
                </li>
                <li>
                    <a href="{{route('brand.index')}}">Brand</a>
                </li>
                <li>
                    <a href="{{route('tag.index')}}">Tag</a>
                </li>
                <li>
                    <a href="{{route('product.index')}}">Product</a>
                </li>
                <li>
                    <a href="{{route('product_detail.index')}}">Product detail</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('about.index')}}">ABOUT</a>
        </li>
    </ul>
</nav>