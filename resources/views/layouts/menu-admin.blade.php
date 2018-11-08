<ul class="sidebar-menu">
 
        <li class="treeview"><a href="{{url('/')}}"><i class="fa fa-tachometer"></i>Dashboard</a></li>
       
  
        @can('isAdmin')
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-user-circle-o pull-right"></i>
            </span>
          </a>
        
            <ul class="treeview-menu">
            <li><a href="{{url('user/create')}}">New User</a></li>
            <li><a href="{{url('/user')}}">All Users</a></li>
          </ul>
          
        </li>
        @endcan

          <li class="treeview">
          <a href="#"><i class="fa fa-briefcase"></i> <span>Employee</span>
            <span class="pull-right-container">
              <i class="fa fa-briefcase-o pull-right"></i>
            </span>
          </a>
        
            <ul class="treeview-menu">
            <li><a href="{{url('/employee')}}">Employee list</a></li>
            <li><a href="{{url('/present')}}">Present</a></li>
            
            
          </ul>
          
        </li>
        

          <li class="treeview">
          <a href="#"><i class="fa fa-exchange"></i> <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-user-circle-o pull-right"></i>
            </span>
          </a>
        
            <ul class="treeview-menu">
            <li><a href="{{url('/transactions')}}">All Transactions</a></li>
            
          </ul>
          
        </li>

         <li class="treeview">
          <a href="#"><i class="fa fa-hand-o-right"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-user-circle-o pull-right"></i>
            </span>
          </a>
        
            <ul class="treeview-menu">
            <li><a href="{{url('trainer/create')}}">Add New</a></li>
            <li><a href="{{url('/trainers')}}">All products</a></li>
            <li><a href="{{url('/trainer/report')}}">Manage</a></li>
          </ul>
          
        </li>

</ul>