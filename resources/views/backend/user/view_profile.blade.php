@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Profile</h2>
        </div>
      </div>
      <!-- end col -->
      <div class="col-md-6">
        <div class="breadcrumb-wrapper mb-30">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    Profile
                </li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

<div class="row">
    <div class="col-md-6">

        <div class="card-style settings-card-1 mb-30">
            <div class="title mb-30 d-flex justify-content-between align-items-center">
                <h6>My Profile</h6>
                <a href="{{ route('profile.edit') }}" class="border-0 bg-transparent" data-bs-tooltip="tooltip" data-bs-placement="top" title="Edit Profile"><i class="lni lni-pencil-alt"></i></a>
            </div>
            <div class="profile-info">
                <div class="d-flex align-items-center mb-30">
                    <div class="profile-image">
                        <img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/author.png') }}" alt="{{ $user->name }}" />
                    </div>
                    <div class="profile-meta">
                        <h5 class="text-bold text-dark mb-1">{{ $user->name }}</h5>
                        <p class="text-sm text-gray">{{ $user->usertype }}</p>
                        <p class="text-sm text-gray">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            <div class="title mb-25">
                <h6>Personal Information</h6>
            </div>
            <div class="card border-0 mb-20">
                <div class="card-body p-0">
                   <p class="text-sm">Hi I'm {{ $user->name }}, has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                   <ul class="list-unstyled profile-info-list mt-15">
                        <li class="text-sm mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user wd-16 ht-16 mr-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="tx-medium mr-2">Full Name: </span>{{ $user->name }}
                        </li>
                        <li class="text-sm mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail wd-16 ht-16 mr-2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <span class="tx-medium mr-2">E-mail: </span>{{ $user->email }}
                        </li>
                        <li class="text-sm mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 511.983 511.983" class="feather feather-mail wd-16 ht-16 mr-2"><path d="M444.879,3.117c-4.171-4.156-10.921-4.156-15.093,0l0,0L355.789,77.13l15.077,15.078l73.997-73.998	h0.016C449.035,14.039,449.035,7.289,444.879,3.117z"/><path d="M444.863,48.366L444.863,48.366L444.863,48.366L444.863,48.366L444.863,48.366L399.646,3.149c0,0,0-0.016-0.016-0.016c-4.156-4.156-10.906-4.156-15.077,0c-4.172,4.171-4.172,10.921,0,15.093l0,0l45.217,45.202c0,0.016,0,0.016,0,0.016c4.172,4.171,10.922,4.171,15.093,0C449.02,59.287,449.02,52.522,444.863,48.366z"/><path d="M170.654,396.659v104.669c0,5.89,4.766,10.655,10.656,10.655s10.671-4.766,10.671-10.655V396.659H170.654z"/><g><path d="M181.311,170.659c-64.795,0-117.324,52.529-117.324,117.332c0,64.81,52.529,117.339,117.324,117.339c64.81,0,117.34-52.529,117.34-117.339C298.65,223.188,246.12,170.659,181.311,170.659z M249.199,355.879c-18.14,18.125-42.249,28.109-67.888,28.109c-25.64,0-49.749-9.984-67.873-28.109c-18.14-18.14-28.124-42.248-28.124-67.888	c0-25.647,9.984-49.756,28.124-67.881c18.125-18.14,42.233-28.124,67.873-28.124s49.748,9.984,67.888,28.124c18.125,18.125,28.108,42.233,28.108,67.881C277.306,313.631,267.323,337.739,249.199,355.879z"/><path d="M213.294,479.984h-63.951c-5.891,0-10.672-4.766-10.672-10.656s4.781-10.671,10.672-10.671h63.951c5.891,0,10.672,4.78,10.672,10.671S219.184,479.984,213.294,479.984z"/></g><path d="M369.429,78.537c-22.906-22.905-52.937-34.358-82.967-34.358s-60.061,11.453-82.966,34.358	c-45.811,45.826-45.811,120.121,0,165.932c20.468,20.469,46.608,31.788,73.356,33.976c-0.75-7.57-2.375-14.944-4.828-22.007	c-20.155-3.031-38.764-12.359-53.435-27.046c-18.14-18.141-28.124-42.233-28.124-67.889c0-25.64,9.984-49.748,28.124-67.873	c18.125-18.125,42.233-28.125,67.873-28.125c25.641,0,49.748,10,67.873,28.125c18.14,18.125,28.124,42.233,28.124,67.873c0,25.655-9.984,49.748-28.108,67.889c-16.219,16.202-37.218,25.905-59.811,27.78c1.859,6.797,3.109,13.843,3.703,21.085c25.983-2.609,51.279-13.866,71.186-33.788C415.24,198.658,415.24,124.363,369.429,78.537z"/></svg>
                            <span class="tx-medium mr-2">Gender: </span>{{ $user->gender }}
                        </li>
                        <li class="text-sm mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone wd-16 ht-16 mr-2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <span class="tx-medium mr-2">Phone: </span>{{ $user->mobile }}
                        </li>
                        <li class="text-sm mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin wd-16 ht-16 mr-2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <span class="tx-medium mr-2">Address: </span>{{ $user->address }}
                        </li>
                   </ul>
                </div>
             </div>
        </div>
            <!-- end card -->

    </div>
</div>


@endsection
