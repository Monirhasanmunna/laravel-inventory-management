<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>DASHBOARD</h3>
      <ul class="nav side-menu">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>

        <h3>User Management</h3>

        <li class="{{Request::is('user_management/*') ? 'active' : ''}}"><a><i class="fa-solid fa-boxes-stacked"></i> User Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{Request::is('user_management/*') ? 'display: block' : ''}}">
            <li class="{{Request::is('user_management/permission/*') ? 'current-page' : ''}}"><a href="{{route('userManagement.permission.index')}}">Permissions</a></li>
            <li class="{{Request::is('user_management/role/*') ? 'current-page' : ''}}"><a href="{{route('userManagement.role.index')}}">Roles</a></li>
            <li class="{{Request::is('user_management/user/*') ? 'current-page' : ''}}"><a href="{{route('userManagement.user.index')}}">Users</a></li>
          </ul>
        </li>
        

        <h3>ACTIVITIES</h3>

        <li><a><i class="fa-solid fa-calculator"></i> Expenses <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="index.html">Categories</a></li>
            <li><a href="index2.html">Sub Categories</a></li>
            <li><a href="index3.html">Expenses List</a></li>
          </ul>
        </li>
        <li><a><i class="fa-solid fa-bucket"></i> Purchases <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="index.html">Purchases List</a></li>
            <li><a href="index2.html">Return List</a></li>
            <li><a href="index3.html">Dashboard3</a></li>
          </ul>
        </li>
        <li><a><i class="fa-solid fa-bag-shopping"></i> Sales <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="index.html">Quotations List</a></li>
            <li><a href="index2.html">Invoices List</a></li>
            <li><a href="index3.html">Return List</a></li>
          </ul>
        </li>


        <h3>Inventory</h3>

        <li class="{{Request::is('product/*') ? 'active' : ''}}"><a><i class="fa-solid fa-boxes-stacked"></i> Products <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{Request::is('product/*') ? 'display: block' : ''}}">
            <li class="{{Request::is('product/categories/*') ? 'current-page' : ''}}"><a href="{{route('product-category.index')}}">Categories</a></li>
            <li class="{{Request::is('product/sub_categories/*') ? 'current-page' : ''}}"><a href="{{route('product-sub-category.index')}}">Sub Categories</a></li>
            <li><a href="index3.html">Product List</a></li>
            <li><a href="index3.html">Barcode</a></li>
          </ul>
        </li>

        <li><a><i class="fa-solid fa-warehouse"></i> Inventory <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="index.html">View Inventory</a></li>
            <li><a href="index2.html">Inventory Adjustment</a></li>
          </ul>
        </li>
        

      </ul>
    </div>
  </div>