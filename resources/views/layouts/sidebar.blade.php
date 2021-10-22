<ul class="nav navbar-nav">
    <li class="active">
        <a href="{{route('home')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
    </li>
    <li class="menu-title">Data Management</li>
    <li>
        <a href="{{ route('users.index') }}">
            <i class="menu-icon fas fa-users"></i>Users 
        </a>
    </li>
    <li>
        <a href="{{ route('categories.index') }}">
        <i class="menu-icon fas fa-bars"></i>Categories 
        </a>
    </li>
    <li>
        <a href="{{ route('products.index') }}">
        <i class="menu-icon fas fa-archive"></i>Products 
        </a>
    </li>
    <li>
        <a href="{{ route('news.index') }}">
        <i class="menu-icon fas fa-newspaper"></i> News 
        </a>
    </li>
    <li>
        <a href="{{ route('coupons.index') }}">
        <i class="menu-icon fas fa-tags"></i> Coupons 
        </a>
    </li>
    <li class="menu-title">Customers Management</li>
    <li>
        <a href="{{ route('customusers.index') }}">
        <i class="menu-icon fas fa-users"></i> Customers Account 
        </a>
    </li>
    <li>
        <a href="{{route('orders.index')}}">
        <i class="menu-icon fas fa-chart-bar"></i> Orders  
        </a>
    </li>
    <li>
        <a href="{{route('rating.index')}}">
        <i class="menu-icon fas fa-star"></i> Rating  
        </a>
    </li>
     <li>
        <a href="{{route('comments.index')}}">
        <i class="menu-icon fas fa-comments"></i> Comment  
        </a>
    </li>
    
  
</ul>