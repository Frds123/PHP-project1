<x-admin.layouts.master>
    <div class="col-12 col-lg-12">
        <div class="content">
            <div class="container-fluid px-lg-4">
                <div class="row">
                    <div class="card" id="basic-info">
                        @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('nominees.update', $nominee->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method("PATCH")
                            <div class="card-header">
                                <h4 class="card-title">Nominee Informations</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-bolder
                                    mb-0">Nominee
                                    Details</h5>
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
                                                <label class="form-label">Full
                                                    Name</label>

                                                <x-admin.widgets.text-input id="nominee_name" class="form-control" type="text" name="nominee_name"
                                                value="{{$nominee->name ?? null}}" required autofocus />
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
                                                <label class="form-label">Relation</label>
                                                <x-admin.widgets.text-input id="relation" class="form-control" type="text" name="relation"
                                                value="{{$nominee->relation ?? null}}" required autofocus />
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

                                                <x-admin.widgets.text-input id="nominee_father_name" class="form-control" type="text" name="nominee_father_name"
                                                value="{{$nominee->fathers_name ?? null}}" required autofocus />
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
                                                <x-admin.widgets.text-input id="nominee_mother_name" class="form-control" type="text" name="nominee_mother_name"
                                                value="{{$nominee->mothers_name ?? null}}" required autofocus />
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
                                                <label class="form-label">Date of Birth (Y-M-D)</label>
                                                <input name="nominee_dob" id="nominee_dob" class="form-control datetimepicker" type="text" value="{{ $nominee->date_of_birth ?? null }}" data-input>
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
                                                    <select class="form-control" name="nominee_gender"
                                                        id="choices-nominee-gender">
                                                        <option value="">Select
                                                            Gender</option>
                                                        @if (!is_null($nominee->gender))
                                                        <option value="{{ $nominee->gender  ?? null}}" selected>
                                                            {{ $nominee->gender }}</option>
                                                        @endif
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
                                                <label class="form-label">Percentage</label>

                                                <x-admin.widgets.text-input id="percentage" class="form-control" type="text" name="percentage"
                                                value="{{$nominee->percentage ?? null}}" required autofocus />
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
                                                <label class="form-label">Phone No</label>
                                                <x-admin.widgets.text-input id="nominee_phone_no" class="form-control" type="text" name="nominee_phone_no"
                                                value="{{$nominee->nominee_phone_no}}" autofocus />
                                                 <x-input-error :messages="$errors->get('nominee_phone_no')" class="mt-2" />
                                            </div>

      
                                        </div>
                                    </div>
                                </div><br>
                                <div class="profile-pic">
                                    <label class="-label" for="file">
                                        <span class="glyphicon glyphicon-camera"></span>
                                        <span>Uplaod a Nominee Picture</span>
                                    </label>
                                    <input id="file" type="file" name="nominee_picture"
                                        onchange="loadFile(event)" />
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
                                                <x-admin.widgets.text-input id="present_address" class="form-control" type="text" name="present_address"
                                                value="{{$nominee->present_address ?? null}}" required autofocus />
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
                                                <x-admin.widgets.text-input id="permanent_address" class="form-control" type="text" name="permanent_address"
                                                value="{{$nominee->permanent_address ?? null}}" required autofocus />
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layouts.master>
