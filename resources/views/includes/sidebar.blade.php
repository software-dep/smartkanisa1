<ul class="app-menu">
    <li><a class="app-menu__item active" href="{{ url('/home') }}"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Church Unit</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            @can('isParoko')
            <li><a class="treeview-item" href="{{route('Parokia.index')}}"><i class="icon fa fa-circle-o"></i> Parokia</a></li>
            <li><a class="treeview-item" href="{{route('Vigango.index')}}"><i class="icon fa fa-circle-o"></i> Kigango</a></li>
            <li><a class="treeview-item" href="{{route('Mitaa.index')}}"><i class="icon fa fa-circle-o"></i> Mtaa</a></li>
            <li><a class="treeview-item" href="{{route('Jumuiya.index')}}"><i class="icon fa fa-circle-o"></i> Jumuiya</a></li>
            @endcan
            <li><a class="treeview-item" href="{{route('Family.index')}}"><i class="icon fa fa-circle-o"></i> Familia</a></li>

        </ul>
    </li>


    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Church Members</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('Member.index')}}"><i class="icon fa fa-circle-o"></i> Add New Member</a></li>
            <li><a class="treeview-item" href="{{route('Member.create')}}"><i class="icon fa fa-circle-o"></i> All Members</a></li>
        </ul>
    </li>




    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Church Donations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
           @cannot('isDataEntry')
            <li><a class="treeview-item" href="{{route('Donation.index')}}"><i class="icon fa fa-circle-o"></i> Manage Donations</a></li>
            @endcannot  
            <li><a class="treeview-item" href="{{route('Member-Donation.index')}}"><i class="icon fa fa-circle-o"></i> Member-Donations</a></li>
            <li><a class="treeview-item" href="{{route('Family-Donation.index')}}"><i class="icon fa fa-circle-o"></i> Family-Donations</a></li>
            <li><a class="treeview-item" href="{{route('Jumuiya-Donation.index')}}"><i class="icon fa fa-circle-o"></i> Jumuiya-Donations</a></li>
            <li><a class="treeview-item" href="{{route('Street-Donation.index')}}"><i class="icon fa fa-circle-o"></i> Mitaa-Donations</a></li>
            <li><a class="treeview-item" href="{{route('Kigango-Donation.index')}}"><i class="icon fa fa-circle-o"></i> Vigango-Donations</a></li>
        </ul>
    </li>

@cannot('isDataEntry')
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{url('Donations_report')}}"><i class="icon fa fa-circle-o"></i>Donations Report</a></li>
        <li><a class="treeview-item" href="{{route('matoleo_report.index')}}"><i class="icon fa fa-circle-o"></i> Matoleo Report</a></li>
        <li><a class="treeview-item" href="{{url('member_report')}}"><i class="icon fa fa-circle-o"></i> Members Report</a></li>
        </ul>
    </li>
 @endcannot   


 @cannot('isDataEntry')
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Matoleo</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('matoleo.index')}}"><i class="icon fa fa-circle-o"></i>Manage Matoleo</a></li>
            {{--
            <li><a class="treeview-item" href="{{url('member_report')}}"><i class="icon fa fa-circle-o"></i> Members Report</a></li>
            --}}
        </ul>
    </li>
  @endcannot  

  @can('isParoko')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">System Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('User.create')}}"><i class="icon fa fa-circle-o"></i>Add User</a></li>
                <li><a class="treeview-item" href="{{route('User.index')}}"><i class="icon fa fa-circle-o"></i> All users</a></li>
            </ul>
        </li>
   @endcan


   <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-phone"></i><span class="app-menu__label">Contacts</span><i
                class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{url('contact')}}"><i class="icon fa fa-circle-o"></i>Leaders Contact</a></li>
            <li><a class="treeview-item" href="{{url('add_contact')}}"><i class="icon fa fa-circle-o"></i>Add Leaders Info</a></li>
 
    </ul>
    </li>
</ul>