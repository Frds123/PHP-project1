<x-admin.layouts.master>
    <div class="col-md-4">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    {{-- <img class="profile-user-img
                        img-fluid img-circle"
                        src="{{ asset('storage/profiles/'.$profile->image[0]->image) }}"
                        alt="User profile picture"> --}}
                        @if (Auth::user()->profile->profile_pic)
                        <img class="profile-user-img
                        img-fluid img-circle" src="{{ asset('storage/profile/'.Auth::user()->profile->profile_pic)}}"  alt="User profile picture">
                        @else
                        <img class="profile-user-img
                        img-fluid img-circle" src="{{ asset('storage/profile/user.png')}}"  alt="User profile picture">
                        @endif
                 </div>

                <h3 class="profile-username
                    text-center">Nina Mcintire</h3>
                <p class="text-muted text-center">Designation, Office
                    Name</p>
                <p class="text-muted text-center">Contact Number<br>Email</p>

            </div>
        </div>
    </div>
    <div class="col-8 col-lg-8">
        <div class="content">
            <div class="container-fluid px-lg-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="button-row
                                d-flex mt-4">
                                <button class="btn
                                    bg-gradient-dark
                                    ms-auto mb-0"
                                    type="button"
                                    title="Edit"><a href="profileedit.html" style="color: white;">Edit Profile</a></button>
                            </div>
                            <h3 class="card-title">Personal Info</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i>
                                Education</strong>

                            <p class="text-muted">
                                Faculty <br> Registration Number
                                <br> Hall of Residence
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt
                                    mr-1"></i> Location</strong>

                            <p class="text-muted">Present Address<br>Permanent
                                Address<br>Office
                                Address</p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i>
                                Family Info</strong>

                            <p class="text-muted">Spouse Name<br>Number
                                of Children</p>

                            <h5 class="profile-username
                            text-left">Blood Group: B+</h5>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin.layouts.master>
