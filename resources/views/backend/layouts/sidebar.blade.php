<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">Highlights</li>
            <li class="active">
                <a href="{{ route('admin.dashboard.index') }}" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i><span class="nav-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-static-title">Main Components</li>
            <li><a href="{{ route('admin.admins.index') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Admins</span></a> </li>
            <li><a href="{{ route('admin.client-profile.index') }}" aria-expanded="false"><i class="nav-icon ti ti-calendar"></i><span class="nav-title">Our Clients</span></a></li>
            <li><a href="{{ route('admin.client-entry.index') }}" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">Client Entries</span></a></li>
            <li><a href="{{ route('admin.payment.index') }}" aria-expanded="false"><i class="nav-icon ti ti-book"></i><span class="nav-title">Payments</span></a> </li>
            <li><a href="{{ route('admin.publish-receipt.index') }}" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">Publish Receipts</span></a> </li>
            <li><a href="{{ route('admin.contact.index') }}" aria-expanded="false"><i class="nav-icon ti ti-book"></i><span class="nav-title">Contacts</span></a> </li>
            <li class="nav-static-title">Authorization</li>
            <li><a href="{{ route('admin.role-user.index') }}" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">Roles</span></a> </li>
            <li><a href="" aria-expanded="false"><i class="nav-icon ti ti-book"></i><span class="nav-title">Permissions</span></a> </li>

            <li class="sidebar-banner p-4 bg-gradient text-center m-3 d-block rounded">
                <h5 class="text-white mb-1">Lexis Admin</h5>
                <p class="font-13 text-white line-20">This is a restricted panel for the admin only</p>
                <a class="btn btn-square btn-inverse-light btn-xs d-inline-block mt-2 mb-0" href="/"> Site Home</a>
            </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>
<!-- end app-navbar -->
