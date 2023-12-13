<ul class="nav">
            <li class="{{ Request::is('admin_home*') ? 'active' : '' }}">
                <a href="{{ route('admin_home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('payments*') ? 'active' : '' }}">
                <a href="{{ route('payments.index') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>Payments</p>
                </a>
            </li>
            <li class="{{ Request::is('cars*') ? 'active' : '' }}">
                <a href="{{ route('cars.index') }}">
                  <i class="nc-icon nc-spaceship"></i>
                  <p>Car List</p>
                </a>
            </li>
            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                <i class="nc-icon nc-single-02"></i>
                <p>User List</p>
                </a>
            </li>
            <li class="{{ Request::is('drivers*') ? 'active' : '' }}">
                <a href="{{ route('drivers.index') }}">
                <i class="nc-icon nc-tile-56"></i>
                <p>Driver List</p>
                </a>
            </li>
            <li class="{{ Request::is('rentals*') ? 'active' : '' }}">
                <a href="{{ route('rentals.index') }}">
                <i class="nc-icon nc-caps-small"></i>
                <p>Rental List</p>
                </a>
            </li>
</ul>