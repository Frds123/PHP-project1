<x-admin.layouts.master>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <ul class="nav flex-column bg-white
                    border-radius-lg p-3">
                    <li class="nav-item">
                        <a class="nav-link text-dark
                            d-flex" data-scroll=""
                            href="profile.html">
                            <i class="material-icons
                                text-lg me-2">person</i>
                            <span class="text-sm">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark
                            d-flex" data-scroll=""
                            href="#basic-info">
                            <i class="material-icons
                                text-lg me-2">info</i>
                            <span class="text-sm">Basic
                                Info</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="col-9 col-lg-9">
        <div class="content">
            <div class="container-fluid px-lg-4">
                <div class="row">
                    <form action="{{ route('profiles.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('POST')
                        <div class="card" id="basic-info">
                            <div class="card-header">
                                <h4 class="card-title">Basic Information</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-bolder
                                    mb-0">Personal
                                    Informations</h5>
                                <p class="mb-0 text-sm">Mandatory
                                    informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row
                                        mt-3">
                                        <div class="col-12 col-sm-6">
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label class="form-label">Profile Photo</label>
                                            <div class="input-group input-group-dynamic">
                                                <input type="file" name="profile_pic"
                                                    class="form-control border dropzone" id="profile_pic">
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
                                                <label class="form-label">Full
                                                    Name</label>

                                                <x-admin.widgets.text-input id="full_name" class="form-control"
                                                    type="text" name="full_name" :value="$user->name" required
                                                    autofocus />
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
                                                <label class="form-label">Mobile
                                                    Number</label>
                                                <x-admin.widgets.text-input id="mobile_no" class="form-control"
                                                    type="text" name="mobile_no" :value="old('mobile_no')" required
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
                                                <label class="form-label">Father
                                                    Name</label>

                                                <x-admin.widgets.text-input id="father_name" class="form-control"
                                                    type="text" name="father_name" :value="old('father_name')" required
                                                    autofocus />
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
                                                <label class="form-label">Mother
                                                    Name</label>
                                                <x-admin.widgets.text-input id="mother_name" class="form-control"
                                                    type="text" name="mother_name" :value="old('mother_name')" required
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
                                                <label class="form-label">Email</label>
                                                <x-admin.widgets.text-input id="email" class="form-control"
                                                    type="email" name="email" :value="$user->email" required
                                                    autofocus />
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
                                                <div class="col-5">
                                                    <label class="form-label">Blood
                                                        Group</label>
                                                </div>
                                                <div class="col-7">
                                                    <select class="form-control" name="blood_group"
                                                        id="choices-bloodgroup">
                                                        <option value="">Select
                                                            Blood
                                                            Group</option>
                                                    </select>
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
                                                <label class="form-label">Date of Birth</label>
                                                <input name="date_of_birth (Y-M-D)" class="form-control datetimepicker"
                                                    type="text" data-input>
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
                                                <div class="col-5">
                                                    <label class="form-label">Gender</label>
                                                </div>
                                                <div class="col-7">
                                                    <select class="form-control" name="gender" id="choices-gender">
                                                        <option value="">Select
                                                            Gender</option>
                                                    </select>
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
                                                        <option value="">Select
                                                            Marital Status</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-12
                                            col-sm-6
                                            mt-3
                                            mt-sm-0">
                                           
                                        </div>
                                    </div>
                                    <!-- <div class="row
                                        mt-3">
                                        <div
                                            class="col-12
                                            col-sm-6">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label
                                                    class="form-label">Date of Birth</label>
                                                    <input
                                                    class="form-control
                                                    datetimepicker"
                                                    type="text"
                                                    data-input>
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
                                            </div>
                                        </div>
                                    </div> -->
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
                                                    type="text" name="profession" :value="old('profession')" required
                                                    autofocus />
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
                                                <label class="form-label">Designation</label>
                                                <x-admin.widgets.text-input id="designation" class="form-control"
                                                    type="text" name="designation" :value="old('designation')" required
                                                    autofocus />
                                            </div>
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
                                                    type="text" name="organization" :value="old('organization')" required
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
                                                <label class="form-label">Place of Joining</label>
                                                <x-admin.widgets.text-input id="place_of_joning" class="form-control"
                                                    type="text" name="place_of_joning" :value="old('place_of_posting')" required
                                                    autofocus />
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
                                                <label class="form-label">Place of Posting</label>
                                                <x-admin.widgets.text-input id="place_of_posting" class="form-control"
                                                    type="text" name="place_of_posting" :value="old('place_of_posting')" required
                                                    autofocus />
                                            </div>
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
                                                    type="text" name="office_address" :value="old('office_address')" required
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
                                                    type="text" name="office_add_ps" :value="old('office_add_ps')" required
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
                                                <option value="" selected="">Select
                                                    District</option>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Chottogram">Chottogram</option>
                                            </select>
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
                                                    type="text" name="office_add_zip" :value="old('office_add_zip')" required
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
                                        <div class="col-12">
                                            <div
                                                class="input-group
                                                input-group-dynamic">
                                                <label class="form-label">Faculty
                                                </label>
                                                <x-admin.widgets.text-input id="faculty_id" class="form-control"
                                                    type="text" name="faculty_id" :value="old('faculty_id')" required
                                                    autofocus />
                                            </div>
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
                                                    type="text" name="academic_regi_no" :value="old('academic_regi_no')" required
                                                    autofocus />
                                            </div>
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
                                                    name="academic_hall_of_residence" :value="old('academic_hall_of_residence')" required
                                                    autofocus />
                                            </div>
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
                                                <x-admin.widgets.text-input id="academic_postgraduate_from"
                                                    class="form-control" type="text"
                                                    name="academic_postgraduate_from" :value="old('academic_postgraduate_from')" required
                                                    autofocus />
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
                                                    type="text" name="present_address" :value="old('present_address')" required
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
                                                <x-admin.widgets.text-input id="present_add_ps" class="form-control"
                                                    type="text" name="present_add_ps" :value="old('present_add_ps')" required
                                                    autofocus />
                                            </div>
                                        </div>
                                        <div
                                            class="col-6
                                            col-sm-4
                                            mt-3
                                            mt-sm-0">
                                            <select class="form-control" name="present_district"
                                                id="choices-present-district">
                                                <option value="" selected="">Select
                                                    District</option>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Chottogram">Chottogram</option>
                                            </select>
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
                                                    type="text" name="present_add_zip" :value="old('present_add_zip')" required
                                                    autofocus />
                                            </div>
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
                                                    :value="old('permanent_address')" required autofocus />
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
                                                    type="text" name="permanent_add_ps" :value="old('permanent_add_ps')" required
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
                                                <option value="Select-District" selected="">Select
                                                    District</option>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Chottogram">Chottogram</option>
                                            </select>
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
                                                    :value="old('permanent_add_zip')" required autofocus />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="button-row
                                    d-flex
                                    mt-4">
                                    <button
                                        class="btn
                                        bg-gradient-dark
                                        ms-auto
                                        mb-0"
                                        type="submit" title="Save">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layouts.master>
