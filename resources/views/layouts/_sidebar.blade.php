<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar" style="height: 150vh; overflow-y: auto; position:fixed">
    <div class="sidebar-brand  d-md-flex">
      <h4>DarMatrix Viwanja</h4>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="{{route('index')}}">
          <svg class="nav-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('projects')}}">
              <svg class="nav-icon"></svg>
             Projects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('viewCustomers')}}">
              <svg class="nav-icon"></svg>
              Customers
            </a>
          </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user')}}">
          <svg class="nav-icon"></svg>
          Users
        </a>
      </li>
      {{-- <li class="nav-group"><a class="nav-link nav-group-toggle">
        <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
        </svg> Settings</a>
        <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"></span> Payment Methods</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('roles')}}"><span class="nav-icon"></span> Roles</a></li>
        </ul>
      </li> --}}
      <li class="nav-group"><a class="nav-link nav-group-toggle">
        <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
        </svg> Reports</a>
        <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{route('customer_report.show')}}"><span class="nav-icon"></span> Customers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('project_report.show')}}"><span class="nav-icon"></span> Projects</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('plot_report.show')}}"><span class="nav-icon"></span> Plots</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('payment_report.show')}}"><span class="nav-icon"></span> Payments</a></li>

        </ul>
 </li>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
        </svg> Settings</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="{{route('roles')}}"><span class="nav-icon"></span> Roles</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('paymentMethod')}}"><span class="nav-icon"></span>Payment Method</a></li>
      </ul>
    </li>

    </ul>
  </div>
