<x-admin.layouts.master>

    <div class="col-12 col-lg-12">
        <div class="content">
            <div class="container-fluid px-lg-4">
                <div class="row">
                    <div class="card" id="basic-info">
                        <div class="card-body">

                            @if ($user->status == 0)
                                <div class="alert alert-warning alert-dismissible text-white fade show mb-4"
                                    role="alert">
                                    <span class="alert-text">Please fillup this form and contact to this number:
                                        01855-726935 (Abdullah Al Imran) to approve your account</span>
                                </div>
                            @endif

                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible text-white fade show mb-4"
                                    role="alert">
                                    <span class="alert-icon align-middle">
                                        <span class="material-icons text-md">
                                            thumb_up_off_alt
                                        </span>
                                    </span>
                                    <span class="alert-text">{{ session('message') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('profiles.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <h5 class="font-weight-bolder
                                    mb-0">Personal
                                    Informations</h5>
                                <p class="mb-0 text-sm">Mandatory
                                    informations</p>
                                @if ($errors->any())
                                    <div class="alert alert-danger text-white">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="multisteps-form__content">
                                    <div class="profile-pic">
                                        <label class="-label" for="file">
                                            <span class="glyphicon glyphicon-camera"></span>
                                            <span class="text-danger">"Image size must be (286px X 240px) <br>
                                                & image format(jpg,png,jpeg)"</span>
                                        </label>
                                        <input id="file" type="file" name="profile_pic"
                                            onchange="loadFile(event)" />
                                        @if ($user->profile->profile_pic)
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset('storage/profile/' . $user->profile->profile_pic) }}"
                                                width="200" alt="User profile picture">
                                        @else
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset('storage/profile/user.png') }}" width="200"
                                                alt="User profile picture">
                                        @endif
                                        {{-- <img src="{{ asset('storage/profile/' . $user->profile->profile_pic) }}"
                                            id="output" width="200" /> --}}
                                    </div>
                                    <div class="row mt-3">

                                        <div class="col-12 col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Full Name</label>
                                                <x-admin.widgets.text-input id="full_name" class="form-control"
                                                    type="text" name="full_name" value="{{ old('full_name', $user->profile->user->name)}}" autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('full_name')" class="mt-1" />
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label">Mobile Number</label>
                                                <x-admin.widgets.text-input id="mobile_no" class="form-control"
                                                    type="text" name="mobile_no" value="{{ old('mobile_no', $user->profile->mobile_no)}}" autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('mobile_no')" class="mt-1" />
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Father
                                                    Name</label>

                                                <x-admin.widgets.text-input id="father_name" class="form-control"
                                                    type="text" name="father_name" value="{{ old('father_name', $user->profile->father_name)}}" autofocus />
                                            </div>
                                        </div>
                                        <div
                                            class="col-12
                                            col-sm-6
                                            mt-3
                                            mt-sm-0">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Mother Name</label>
                                                <x-admin.widgets.text-input id="mother_name" class="form-control"
                                                    type="text" name="mother_name" value="{{ old('mother_name',  $user->profile->mother_name)}}" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Email</label>
                                                <x-admin.widgets.text-input id="email" class="form-control"
                                                    type="email" name="email" value="{{ old('email', $user->profile->user->email)}}" autofocus />
                                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-dynamic">
                                                <div class="col-5">
                                                    <label class="form-label">Blood Group</label>
                                                </div>
                                                <div class="col-7">
                                                    <select class="form-control" name="blood_group"
                                                        id="choices-bloodgroup">

                                                        @if (!is_null($user->profile->blood_group))
                                                            <option value="{{ $user->profile->blood_group }}" selected>
                                                                {{ old('blood_group', $user->profile->blood_group )}}</option>
                                                        @endif
                                                        <option value="{{ old('blood_group')}}">{{ old('blood_group')?? "Select Blood Group"}}
                                                        </option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('blood_group')" class="mt-1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label">Date of Birth (D-M-Y)</label>
                                                <input name="date_of_birth" class="form-control datetimepicker"
                                                    value="{{ old('date_of_birth', $user->profile->date_of_birth ?? null )}}"
                                                    type="text" data-input>
                                            </div>
                                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-1" />
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-dynamic">
                                                <div class="col-5">
                                                    <label class="form-label">Gender</label>
                                                </div>
                                                <div class="col-7">
                                                    <select class="form-control" name="gender" id="choices-gender">
                                                        @if (!is_null($user->profile->gender))
                                                            <option value="{{ $user->profile->gender }}" selected>
                                                                {{ old('gender', $user->profile->gender )}}</option>
                                                        @endif
                                                        <option value="{{ old('gender')}}">{{ old('gender')?? "Select Gender"}}</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('gender')" class="mt-1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <div class="col-5">
                                                    <label class="form-label">Marital Status</label>
                                                </div>
                                                <div class="col-7">
                                                    <select class="form-control" name="marital_status"
                                                        id="choices-marital_status">
                                                        @if (!is_null($user->profile->marital_status))
                                                            <option value="{{ $user->profile->marital_status }}">
                                                                {{ old('marital_status', $user->profile->marital_status) }}</option>
                                                        @endif
                                                        <option value="{{ old('marital_status')}}">{{ old('marital_status')?? "Select Marital
                                                            Status"}}</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('marital_status')" class="mt-1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h5 class="font-weight-bolder
                                    mb-0">Occupation
                                    Informations</h5>
                                <p class="mb-0 text-sm">Mandatory
                                    informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row
                                        mt-3">
                                        <div class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Profession</label>
                                                <x-admin.widgets.text-input id="profession" class="form-control"
                                                    type="text" name="profession" value="{{ old('profession', $user->profile->profession)}}" autofocus />
                                            </div>
                                        </div>
                                        <div
                                            class="col-12
                                            col-sm-6
                                            mt-3
                                            mt-sm-0">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <x-admin.widgets.lebel name="designation" />
                                                <x-admin.widgets.text-input id="designation" class="form-control"
                                                    type="text" name="designation" value="{{ old('designation', $user->profile->designation)}}" autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('designation')" class="mt-1" />
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Organization</label>
                                                <x-admin.widgets.text-input id="organization" class="form-control"
                                                    type="text" name="organization" value="{{ old('organization', $user->profile->organization)}}" autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('organization')" class="mt-1" />
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Office
                                                    Address
                                                </label>
                                                <x-admin.widgets.text-input id="office_address" class="form-control"
                                                    type="text" name="office_address" value="{{ old('office_address', $user->profile->office_address)}}"
                                                    autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Police
                                                    Station</label>
                                                <x-admin.widgets.text-input id="office_add_ps" class="form-control"
                                                    type="text" name="office_add_ps" value="{{ old('office_add_ps', $user->profile->office_add_ps)}}"
                                                    autofocus />
                                            </div>
                                        </div>
                                        <div
                                            class="col-6
                                            col-sm-4
                                            mt-3
                                            mt-sm-0">
                                            <select class="form-control" name="office_district"
                                                id="choices-office-district">
                                                <option value="{{ old('office_district')}}" selected>{{ old('office_district')?? "Select District"}}</option>
                                                @if (!is_null($user->profile->office_district))
                                                    <option value="{{ $user->profile->office_district }}" selected>
                                                        {{ old('office_district', $user->profile->office_district )}}</option>
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('office_district')" class="mt-1" />
                                        </div>
                                        <div
                                            class="col-6
                                            col-sm-2
                                            mt-3
                                            mt-sm-0">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Zip</label>
                                                <x-admin.widgets.text-input id="office_add_zip" class="form-control"
                                                    type="text" name="office_add_zip" value="{{ old('office_add_zip', $user->profile->office_add_zip )}}"
                                                    autofocus />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h5 class="font-weight-bolder
                                    mb-0">Academic
                                    Informations</h5>
                                <p class="mb-0 text-sm">Please
                                    provide your
                                    Academic
                                    Informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row
                                        mt-3">
                                        <div
                                            class="col-12
                                        col-sm-12
                                        mt-3
                                        mt-sm-0">
                                            <select class="form-control" name="faculty_id" id="faculty">
                                                <option value="" disabled>Select
                                                    Faculty</option>
                                                @if (!is_null($user->faculty_id))
                                                    <option value="{{ $user->faculty_id }}" Selected autofocus>
                                                        {{  $user->faculty->title }}</option>
                                                @endif
                                                @foreach ($faculties as $faculty)
                                                    <option value="{{ $faculty->id }}">{{ $faculty->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('faculty_id')" class="mt-1" />
                                        </div>
                                        <div class="col-12
                                            mt-3">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Registration
                                                    Number
                                                </label>
                                                <x-admin.widgets.text-input id="academic_regi_no" class="form-control"
                                                    type="text" name="academic_regi_no" value="{{ old('academic_regi_no', $user->profile->academic_regi_no)}}"
                                                    autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('academic_regi_no')" class="mt-1" />
                                        </div>
                                        <div class="col-12
                                            mt-3">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Hall
                                                    of
                                                    Residence
                                                </label>
                                                <x-admin.widgets.text-input id="academic_hall_of_residence"
                                                    class="form-control" type="text"
                                                    name="academic_hall_of_residence" value="{{ old('academic_hall_of_residence', $user->profile->academic_hall_of_residence)}}" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>


                                <h5 class="font-weight-bold
                                    mb-0">Address</h5>
                                <p class="mb-0 text-sm">Tell
                                    us where are you
                                    living</p>
                                <div class="multisteps-form__content">
                                    <div class="row
                                        mt-3">
                                        <div class="col">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Present
                                                    Address
                                                </label>
                                                <x-admin.widgets.text-input id="present_address" class="form-control"
                                                    type="text" name="present_address" value="{{ old('present_address', $user->profile->present_address)}}"
                                                    autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('present_address')" class="mt-1" />
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Police
                                                    Station</label>
                                                <x-admin.widgets.text-input id="present_add_ps" class="form-control"
                                                    type="text" name="present_add_ps" value="{{ old('present_add_ps', $user->profile->present_add_ps)}}"
                                                    autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('present_add_ps')" class="mt-1" />
                                        </div>
                                        <div
                                            class="col-6
                                            col-sm-4
                                            mt-3
                                            mt-sm-0">
                                            <select class="form-control" name="present_district"
                                                id="choices-present-district">
                                                <option value="{{ old('present_district')}}" selected>{{ old('present_district')?? "Select
                                                    District"}}</option>
                                                @if (!is_null($user->profile->present_district))
                                                    <option value="{{ $user->profile->present_district }}" selected>
                                                        {{ old('present_district', $user->profile->present_district) }}</option>
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('present_district')" class="mt-1" />
                                        </div>
                                        <div
                                            class="col-6
                                            col-sm-2
                                            mt-3
                                            mt-sm-0">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Zip</label>
                                                <x-admin.widgets.text-input id="present_add_zip" class="form-control"
                                                    type="text" name="present_add_zip" value="{{ old('present_add_zip', $user->profile->present_add_zip)}}"
                                                    autofocus />
                                            </div>
                                            <x-input-error :messages="$errors->get('present_add_zip')" class="mt-1" />
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Permannt
                                                    Address
                                                </label>
                                                <x-admin.widgets.text-input id="permanent_address"
                                                    class="form-control" type="text" name="permanent_address"
                                                    value="{{ old('permanent_address', $user->profile->permanent_address)}}" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row
                                        mt-3">
                                        <div class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Police
                                                    Station</label>
                                                <x-admin.widgets.text-input id="permanent_add_ps" class="form-control"
                                                    type="text" name="permanent_add_ps" value="{{ old('permanent_add_ps', $user->profile->permanent_add_ps)}}"
                                                    autofocus />
                                            </div>
                                        </div>
                                        <div
                                            class="col-6
                                            col-sm-4
                                            mt-3
                                            mt-sm-0">
                                            <select class="form-control" name="permanent_district"
                                                id="choices-permanent-district">
                                                <option value="{{ old('permanent_district')}}" selected>{{ old('permanent_district')?? "Select
                                                    District"}}</option>
                                                @if (!is_null($user->profile->permanent_district))
                                                    <option value="{{ $user->profile->permanent_district }}" selected>
                                                        {{ old('permanent_district', $user->profile->permanent_district) }}</option>
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('permanent_district')" class="mt-1" />
                                        </div>
                                        <div
                                            class="col-6
                                            col-sm-2
                                            mt-3
                                            mt-sm-0">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Zip</label>
                                                <x-admin.widgets.text-input id="permanent_add_zip"
                                                    class="form-control" type="text" name="permanent_add_zip"
                                                    value="{{ old('permanent_add_zip', $user->profile->permanent_add_zip)}}" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-dark ms-auto -0" type="submit"
                                        title="Save">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css')
    @endpush
    @push('js')
    @endpush
</x-admin.layouts.master>
