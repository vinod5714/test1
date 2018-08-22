<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      
      <!-- search form (Optional) -->
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu List</li>
		
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-link"></i> <span>Service Details</span></a></li>
        <li><a href="{{url('/newbooking')}}"><i class="fa fa-link"></i> <span>new booking</span></a></li>
        <li><a href="{{url('/dwork')}}"><i class="fa fa-link"></i> <span>Daily Worksheet</span></a></li>
        <li><a href="{{url('/mwork')}}"><i class="fa fa-link"></i> <span>Monthly Worksheet</span></a></li>
        <li><a href="{{url('/stocksta')}}"><i class="fa fa-link"></i> <span>Stock Statement</span></a></li>
        
       <li><a href="{{url('/toolsequip')}}"><i class="fa fa-link"></i> <span>Tools and Equip</span></a></li>
       <li><a href="{{url('/review')}}"><i class="fa fa-link"></i> <span>Customer Review</span></a></li>
                               

                                
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-link"></i>Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                
          
		  
		  
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  
  