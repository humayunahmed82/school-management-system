@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

{{-- @dd($route); --}}


<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="logo" />
        </a>
    </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item {{ ($route == 'dashboard')? 'active':'' }}">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
                                />
                            </svg>
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item {{ ($prefix == '/users')? 'active':'' }} nav-item-has-children">
                    <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M3.66675 4.58325V16.4999H19.2501V4.58325H3.66675ZM5.50008 14.6666V6.41659H8.25008V14.6666H5.50008ZM10.0834 14.6666V11.4583H12.8334V14.6666H10.0834ZM17.4167 14.6666H14.6667V11.4583H17.4167V14.6666ZM10.0834 9.62492V6.41659H17.4167V9.62492H10.0834Z"
                                />
                            </svg>
                        </span>
                        <span class="text">Manage User</span>
                    </a>
                    <ul id="ddmenu_1" class="collapse dropdown-nav {{ ($prefix == '/users')? 'show':'' }}">
                        <li>
                            <a class="{{ ($route == 'user.view')? 'active':'' }}" href="{{ route('user.view') }}"> View User </a>
                        </li>
                        <li>
                            <a class="{{ ($route == 'users.add')? 'active':'' }}" href="{{ route('users.add') }}"> Add User </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ ($prefix == '/profile')? 'active':'' }} nav-item-has-children">
                    <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M3.66675 4.58325V16.4999H19.2501V4.58325H3.66675ZM5.50008 14.6666V6.41659H8.25008V14.6666H5.50008ZM10.0834 14.6666V11.4583H12.8334V14.6666H10.0834ZM17.4167 14.6666H14.6667V11.4583H17.4167V14.6666ZM10.0834 9.62492V6.41659H17.4167V9.62492H10.0834Z"
                                />
                            </svg>
                        </span>
                        <span class="text">Manage Profile</span>
                    </a>
                    <ul id="ddmenu_2" class="collapse dropdown-nav {{ ($prefix == '/profile')? 'show':'' }}">
                        <li>
                            <a class="{{ ($route == 'profile.view')? 'active':'' }}" href="{{ route('profile.view') }}"> Your Profile </a>
                        </li>
                        <li>
                            <a class="{{ ($route == 'password.view')? 'active':'' }}" href="{{ route('password.view') }}"> Change Password </a>
                        </li>
                    </ul>
                </li>

                <span class="divider"><hr /></span>

                <li class="nav-item {{ ($prefix == '/setups')? 'active':'' }} nav-item-has-children">
                    <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M3.66675 4.58325V16.4999H19.2501V4.58325H3.66675ZM5.50008 14.6666V6.41659H8.25008V14.6666H5.50008ZM10.0834 14.6666V11.4583H12.8334V14.6666H10.0834ZM17.4167 14.6666H14.6667V11.4583H17.4167V14.6666ZM10.0834 9.62492V6.41659H17.4167V9.62492H10.0834Z"
                                />
                            </svg>
                        </span>
                        <span class="text">Setup Management</span>
                    </a>
                    <ul id="ddmenu_3" class="collapse dropdown-nav {{ ($prefix == '/setups')? 'show':'' }}">
                        <li>
                            <a class="{{ ($route == 'student.class.view')? 'active':'' }}" href="{{ route('student.class.view') }}"> Student Class </a>
                        </li>
                        <li>
                            <a class="{{ ($route == 'student.year.view')? 'active':'' }}" href="{{ route('student.year.view') }}"> Student Year </a>
                        </li>
                        <li>
                            <a class="{{ ($route == 'student.group.view')? 'active':'' }}" href="{{ route('student.group.view') }}"> Student Group </a>
                        </li>
                        <li>
                            <a class="{{ ($route == 'student.shift.view')? 'active':'' }}" href="{{ route('student.shift.view') }}"> Student Shift </a>
                        </li>
                        <li>
                            <a class="{{ ($route == 'fee.category.view')? 'active':'' }}" href="{{ route('fee.category.view') }}">Fee Category</a>
                        </li>
                        <li>
                            <a class="{{ ($route == 'fee.amount.view')? 'active':'' }}" href="{{ route('fee.amount.view') }}">Fee Category Amount</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  nav-item-has-children">
                    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M3.66675 4.58325V16.4999H19.2501V4.58325H3.66675ZM5.50008 14.6666V6.41659H8.25008V14.6666H5.50008ZM10.0834 14.6666V11.4583H12.8334V14.6666H10.0834ZM17.4167 14.6666H14.6667V11.4583H17.4167V14.6666ZM10.0834 9.62492V6.41659H17.4167V9.62492H10.0834Z"
                                />
                            </svg>
                        </span>
                        <span class="text">UI Elements </span>
                    </a>
                    <ul id="ddmenu_" class="collapse dropdown-nav">
                        <li>
                            <a href="alerts.html"> Alerts </a>
                        </li>
                        <li>
                            <a href="buttons.html"> Buttons </a>
                        </li>
                        <li>
                            <a href="cards.html"> Cards </a>
                        </li>
                        <li>
                            <a href="typography.html"> Typography </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="tables.html">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M4.58333 3.66675H17.4167C17.9029 3.66675 18.3692 3.8599 18.713 4.20372C19.0568 4.54754 19.25 5.01385 19.25 5.50008V16.5001C19.25 16.9863 19.0568 17.4526 18.713 17.7964C18.3692 18.1403 17.9029 18.3334 17.4167 18.3334H4.58333C4.0971 18.3334 3.63079 18.1403 3.28697 17.7964C2.94315 17.4526 2.75 16.9863 2.75 16.5001V5.50008C2.75 5.01385 2.94315 4.54754 3.28697 4.20372C3.63079 3.8599 4.0971 3.66675 4.58333 3.66675ZM4.58333 7.33341V11.0001H10.0833V7.33341H4.58333ZM11.9167 7.33341V11.0001H17.4167V7.33341H11.9167ZM4.58333 12.8334V16.5001H10.0833V12.8334H4.58333ZM11.9167 12.8334V16.5001H17.4167V12.8334H11.9167Z"
                                />
                            </svg>
                        </span>
                        <span class="text">Tables</span>
                    </a>
                </li>
                <span class="divider"><hr /></span>

                <li class="nav-item">
                    <a href="notification.html">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M9.16667 19.25H12.8333C12.8333 20.2584 12.0083 21.0834 11 21.0834C9.99167 21.0834 9.16667 20.2584 9.16667 19.25ZM19.25 17.4167V18.3334H2.75V17.4167L4.58333 15.5834V10.0834C4.58333 7.24171 6.41667 4.76671 9.16667 3.94171V3.66671C9.16667 2.65837 9.99167 1.83337 11 1.83337C12.0083 1.83337 12.8333 2.65837 12.8333 3.66671V3.94171C15.5833 4.76671 17.4167 7.24171 17.4167 10.0834V15.5834L19.25 17.4167ZM15.5833 10.0834C15.5833 7.51671 13.5667 5.50004 11 5.50004C8.43333 5.50004 6.41667 7.51671 6.41667 10.0834V16.5H15.5833V10.0834Z"
                                />
                            </svg>
                        </span>
                        <span class="text">Notifications</span>
                    </a>
                </li>
            </ul>
        </nav>
  </aside>
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== -->
