<x-admin.layouts.master>
    <div class="col-md-4">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    {{-- @dd($admin->faculty->title); --}}
                    @if ($profile->profile_pic)
                        <img class="profile-user-img
                        img-fluid img-circle"
                            src="{{ asset('storage/profile/' . $profile->profile_pic) }}" alt="User profile picture">
                    @else
                        <img class="profile-user-img
                        img-fluid img-circle"
                            src="{{ asset('storage/profile/user.png') }}" alt="User profile picture">
                    @endif
                </div>
                {{-- @dd($profile->user->name); --}}
                <h3 class="profile-username
                    text-center">{{ $profile->user->name }}</h3>
                <p class="text-muted text-center">{{ $profile->profession }} <br /> {{ $profile->designation }} <br />
                    {{ $profile->organization }}</p>
                <p class="text-muted text-center">{{ $profile->mobile_no }}<br>{{ $profile->email }}</p>
                <p class="text-muted text-center"><strong>Blood Group: {{ $profile->blood_group }}</strong></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible text-white fade show mb-4" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>Successfully!</strong> {{ session('message') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="content">
            <div class="container-fluid px-lg-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="button-row
                                d-flex mt-4">
                                <table style="width: 100%; font-style:normal">
                                    <tbody>
                                        <tr>
                                            <td class="align-middle" style="text-align: right">
                                                @if ($admin->status == config('custom.user_status_approved'))
                                                    <span class="badge badge-sm bg-gradient-success">Approved</span>
                                                @elseif ($admin->status == config('custom.user_status_denied'))
                                                    <span class="badge badge-sm bg-gradient-danger">Rejected</span>
                                                @else
                                                    <form action="{{ route('admin.update-status') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $admin->id }}" />
                                                        <button type="submit"
                                                            class="btn btn-sm bg-gradient-success ms-auto mb-0"
                                                            name="status"
                                                            value="{{ config('custom.user_status_approved') }}">
                                                            <span>Approve</span>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-sm bg-gradient-danger ms-auto mb-0"
                                                            name="status"
                                                            value="{{ config('custom.user_status_denied') }}">
                                                            <span>Reject</span>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3 class="card-title">Profile</h3>
                        </div>
                        <div class="card-body">
                            <h5><i class="fas fa-book mr-1"></i>
                                Basic Info</h5>

                            {{-- <p class="text-muted"> --}}
                            <table style="width: 100%; font-style:normal">
                                <tr>
                                    <td style="width: 25%">Full Name</td>
                                    <td style="width: 85%">{{ $profile->full_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Father's Name</td>
                                    <td style="width: 85%">{{ $profile->father_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Mother's Name</td>
                                    <td style="width: 85%">{{ $profile->mother_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Gender</td>
                                    <td style="width: 85%">{{ $profile->gender }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Date of Birth</td>
                                    <td style="width: 85%">{{ $profile->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Marital Status</td>
                                    <td style="width: 85%">{{ $profile->marital_status }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Membership No</td>
                                    <td style="width: 85%">{{ $profile->membership_no }}</td>
                                </tr>

                            </table>
                            {{-- </p> --}}

                            <hr>

                            <h5><i class="fas fa-book mr-1"></i>
                                Education</h5>

                            <table style="width: 100%; font-style:normal">
                                <tr>
                                    <td style="width: 25%">Faculty Name</td>
                                    <td style="width: 85%">{{ $admin->faculty->title ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Registration No</td>
                                    <td style="width: 85%">{{ $profile->academic_regi_no }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Hall of Residence</td>
                                    <td style="width: 85%">{{ $profile->academic_hall_of_residence }}</td>
                                </tr>

                            </table>

                            <hr>

                            <h5><i class="fas fa-map-marker-alt
                                    mr-1"></i> Location
                            </h5>

                            <table style="width: 100%; font-style:normal">
                                <tr>
                                    <td style="width: 25%">Present Address</td>
                                    <td style="width: 85%">
                                        <table style="width: 100%">
                                            <tr>
                                                <td colspan="3">{{ $profile->present_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Police Station: {{ $profile->present_add_ps }}</td>
                                                <td>District: {{ $profile->present_district }}</td>
                                                <td>Zip Code: {{ $profile->present_add_zip }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Permanent Address</td>
                                    <td style="width: 85%">
                                        <table style="width: 100%">
                                            <tr>
                                                <td colspan="3">{{ $profile->permanent_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Police Station: {{ $profile->permanent_add_ps }}</td>
                                                <td>District: {{ $profile->permanent_district }}</td>
                                                <td>Zip Code: {{ $profile->permanent_add_zip }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Office Address</td>
                                    <td style="width: 85%">
                                        <table style="width: 100%">
                                            <tr>
                                                <td colspan="3">{{ $profile->office_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Police Station: {{ $profile->office_add_ps }}</td>
                                                <td>District: {{ $profile->office_district }}</td>
                                                <td>Zip Code: {{ $profile->office_add_zip }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <hr>
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 80%">
                                        <h5><i class="far fa-file-alt mr-1"></i> Family Info</h5>
                                    </td>
                                </tr>
                            </table>

                            {{-- @if ($relations == 0) --}}
                            {{-- <table style="width: 100%; font-style:normal">
                                <tr>
                                    <td style="width: 25%; font-style:normal">Name</td>
                                    <td style="width: 25%; font-style:normal"></td>
                                    <td style="width: 25%; font-style:normal">Relationship</td>
                                    <td style="width: 25%; font-style:normal"></td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="width: 25%; font-style:normal">Number of Children</td>
                                    <td colspan="3" style="width: 85%; font-style:normal"></td>
                                </tr>
                            </table> --}}
                            {{-- @else --}}
                            <p>Spouse Info</p>
                            <table style="width: 100%; font-style:normal">
                                @foreach ($relations as $relation)
                                    <tr>
                                        <td style="width: 25%; font-style:normal">Name</td>
                                        <td style="width: 25%; font-style:normal">{{ $relation->name }}</td>
                                        <td style="width: 25%; font-style:normal">Gender</td>
                                        <td style="width: 25%; font-style:normal">{{ $relation->gender }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <br />
                            <p>Child Info</p>
                            <table>
                                {{-- @dd($children) --}}
                                @foreach ($children as $child)
                                    <tr>
                                        <td style="width: 25%; font-style:normal">Name</td>
                                        <td style="width: 25%; font-style:normal">{{ $child->name }}</td>
                                        <td style="width: 25%; font-style:normal">Date of Birth</td>
                                        <td style="width: 25%; font-style:normal">{{ $child->dob }}</td>
                                        <td style="width: 25%; font-style:normal">Gender</td>
                                        <td style="width: 25%; font-style:normal">{{ $child->gender }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="1" style="width: 25%; font-style:normal">Number of Children</td>
                                    <td colspan="3" style="width: 85%; font-style:normal">{{ $child_count }}</td>
                                </tr>
                            </table>
                            {{-- @endif --}}
                            <br>
                            <hr>
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 80%">
                                        <h5><i class="far fa-file-alt mr-1"></i> Nominee Info</h5>
                                    </td>
                                </tr>
                            </table>
                            <table style="width: 100%; font-style:normal">
                                <tr>
                                    <td style="width: 25%">Name</td>
                                    <td style="width: 85%">{{ $nominee->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Relation</td>
                                    <td style="width: 85%">{{ $nominee->relation }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Father's Name</td>
                                    <td style="width: 85%">{{ $nominee->fathers_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Mother's Name</td>
                                    <td style="width: 85%">{{ $nominee->mothers_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Gender</td>
                                    <td style="width: 85%">{{ $nominee->gender }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Date of Birth</td>
                                    <td style="width: 85%">{{ $nominee->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Present Address</td>
                                    <td style="width: 85%">{{ $nominee->present_address }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Permanent Address</td>
                                    <td style="width: 85%">{{ $nominee->permanent_address }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Percentage</td>
                                    <td style="width: 85%">{{ $nominee->percentage }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Phone No</td>
                                    <td style="width: 85%">{{ $nominee->phone_no }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            alert(
                "If you didn't update your profile, I cannot add Family Information. First you need to update your profile."
            );
        }
    </script>
</x-admin.layouts.master>
