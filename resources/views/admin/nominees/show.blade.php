<x-admin.layouts.master>
    <div class="col-md-4">
        <!-- nominee Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-nominee">
                <h3 class="nominee-username
                    text-center">Nominee Details</h3>
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
                                    title="Edit"><a href="{{ route('nominees.edit', ['nominee' => $nominee->id]) }}" style="color: white;">Edit nominee</a></button>
                            </div>
                            {{-- <h3 class="card-title">Nominee</h3> --}}
                        </div>
                        <div class="card-body">
                            <h5><i class="fas fa-book mr-1"></i>
                                Nominee's Info</h5>

                            <table style="width: 100%; font-style:normal">
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/nominee/' . $nominee->nominee_picture) }}"
                                        id="output" width="200" /></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Name</td>
                                    <td style="width: 85%">{{$nominee->name}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Relation</td>
                                    <td style="width: 85%">{{$nominee->relation}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Father's Name</td>
                                    <td style="width: 85%">{{$nominee->fathers_name}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Mother's Name</td>
                                    <td style="width: 85%">{{$nominee->mothers_name}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Gender</td>
                                    <td style="width: 85%">{{$nominee->gender}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Date of Birth</td>
                                    <td style="width: 85%">{{$nominee->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Present Address</td>
                                    <td style="width: 85%">{{$nominee->present_address}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Permanent Address</td>
                                    <td style="width: 85%">{{$nominee->permanent_address}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Percentage</td>
                                    <td style="width: 85%">{{$nominee->percentage}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Phone No</td>
                                    <td style="width: 85%">{{$nominee->phone_no}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin.layouts.master>