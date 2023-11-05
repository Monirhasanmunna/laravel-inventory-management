<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      @can('dashboard')
      <h3>DASHBOARD</h3>
      @endcan
      <ul class="nav side-menu">

        @can('dashboard')
           <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>  
        @endcan
       

        @can('user_management')
        <h3>User Management</h3>
        <li class="{{Request::is('user_management/*') ? 'active' : ''}}"><a><i class="fa-solid fa-boxes-stacked"></i> User Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{Request::is('user_management/*') ? 'display: block' : ''}}">

            @can('user_management.permissions')
            <li class="{{Request::is('user_management/permission/*') ? 'current-page' : ''}}"><a href="{{route('userManagement.permission.index')}}">Permissions</a></li>
            @endcan

            @can('user_management.roles')
            <li class="{{Request::is('user_management/role/*') ? 'current-page' : ''}}"><a href="{{route('userManagement.role.index')}}">Roles</a></li>
            @endcan

            @can('user_management.users')
            <li class="{{Request::is('user_management/user/*') ? 'current-page' : ''}}"><a href="{{route('userManagement.user.index')}}">Users</a></li>
            @endcan
          </ul>
        </li>
        @endcan

        <h3>ACTIVITIES</h3>

        @can('expenses')
        <li class="{{Request::is('expense/*') ? 'active' : ''}}"><a><i class="fa-solid fa-calculator"></i> Expenses <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{Request::is('expense/*') ? 'display: block' : ''}}">

            @can('expenses.categories')
            <li class="{{Request::is('expense/categories/*') ? 'current-page' : ''}}"><a href="{{route('expense.categories.index')}}">Categories</a></li>
            @endcan

            @can('expenses.sub_categories')
            <li class="{{Request::is('expense/sub_categories/*') ? 'current-page' : ''}}"><a href="{{route('expense.sub_categories.index')}}">Sub Categories</a></li>
            @endcan

            @can('expenses.list')
            <li class="{{Request::is('expense/expenses/*') ? 'current-page' : ''}}"><a href="{{route('expense.expenses.index')}}">Expenses List</a></li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('purchase')
        <li class="{{Request::is('purchase/*') ? 'active' : ''}}"><a><i class="fa-solid fa-bucket"></i> Purchases <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{Request::is('purchase/*') ? 'display: block' : ''}}">

            @can('purchase.list')
            <li class="{{Request::is('purchase/*') ? 'current-page' : ''}}"><a href="{{route('purchase.index')}}">Purchases List</a></li>
            @endcan

            @can('purchase.return.list')
            <li><a href="index2.html">Return List</a></li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('sales')
        <li><a><i class="fa-solid fa-bag-shopping"></i> Sales <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            @can('sales.quatations.list')
            <li><a href="index.html">Quotations List</a></li>
            @endcan

            @can('sales.invoices.list')
            <li><a href="index2.html">Invoices List</a></li>
            @endcan

            @can('sales.return.list')
            <li><a href="index3.html">Return List</a></li>
            @endcan
          </ul>
        </li>
        @endcan


        <h3>Cashbook</h3>

        @can('products')
        <li class="{{Request::is('cashbook/*') ? 'active' : ''}}"><a><i class="fa-solid fa-boxes-stacked"></i> Cashbook <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{Request::is('cashbook/*') ? 'display: block' : ''}}">

            @can('cashbook.accounts')
            <li class="{{Request::is('cashbook/accounts/*') ? 'current-page' : ''}}"><a href="{{route('accounts.index')}}">Accounts</a></li>
            @endcan

            @can('cashbook.balance.adjustment')
            <li class="{{Request::is('cashbook/balance/*') ? 'current-page' : ''}}"><a href="{{route('balance.index')}}">Balance Adjustments</a></li>
            @endcan

            @can('cashbook.balance.transfer')
            <li class="{{Request::is('cashbook/balance-transfer*') ? 'current-page' : ''}}"><a href="{{route('balance-transfer.index')}}">Balance Transfer</a></li>
            @endcan

            @can('cashbook.transaction.history')
            <li class="{{Request::is('cashbook/transaction*') ? 'current-page' : ''}}"><a href="{{route('transaction.index')}}">Transaction History</a></li>
            @endcan
            
          </ul>
        </li>
        @endcan


        <h3>Inventory</h3>

        @can('products')
        <li class="{{Request::is(['product/*','/categories/*','/sub_categories/*']) ? 'active' : ''}}"><a><i class="fa-solid fa-boxes-stacked"></i> Products <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{Request::is('product/*') ? 'display: block' : ''}}">

            @can('product.categories')
            <li class="{{Request::is('/categories/*') ? 'current-page' : ''}}"><a href="{{route('product-category.index')}}">Categories</a></li>
            @endcan

            @can('product.sub.categories')
            <li class="{{Request::is('/sub_categories/*') ? 'current-page' : ''}}"><a href="{{route('product-sub-category.index')}}">Sub Categories</a></li>
            @endcan

            @can('product.list')
            <li class="{{Request::is('product/*') ? 'current-page' : ''}}"><a href="{{route('product.index')}}">Product List</a></li>
            @endcan

            @can('product.barcode')
            <li><a href="index3.html">Barcode</a></li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('inventory')
        <li><a><i class="fa-solid fa-warehouse"></i> Inventory <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @can('inventory.view_inventory')
            <li><a href="index.html">View Inventory</a></li>
            @endcan
            @can('inventory.adjustment')
            <li><a href="index2.html">Inventory Adjustment</a></li>
            @endcan
          </ul>
        </li>
        @endcan


        @can('supplier')
        <h3>People</h3>
        <li class="{{Request::is('suppliers/*') ? 'current-page' : ''}}"><a href="{{route('suppliers.index')}}"><i class="fa-solid fa-people-carry-box"></i> Suppliers</a></li>  
        @endcan
        

        @can('setup')
        <h3>Accounts</h3>
        <li class="{{Request::is('setup/*') ? 'current-page' : ''}}"><a href="{{route('setup.index')}}"><i class="fas fa-cogs"></i> Setup</a></li>  
        @endcan

      </ul>
    </div>
  </div>