<x-admin.layouts.master>
    <div class="col-md-4">
        <!-- relationalinfo Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-relationalinfo">
                <h3 class="relationalinfo-username
                    text-center">Relative's Details</h3>
                {{-- <h3 class="relationalinfo-username
                    text-center">{{$profile->full_name}}</h3>
                <p class="text-muted text-center">{{$profile->mobile_no}}<br>{{$user->email }}</p>
                <p class="text-muted text-center"><strong>Blood Group: {{$profile->blood_group}}</strong></p> --}}
            </div>
        </div> 
    </div>
    <div class="col-8 col-lg-8">
        <div class="content">
            <div class="container-fluid px-lg-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="button-row d-flex mt-4">
                                <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Edit"><a href="{{ route('relationalinfos.edit', ['relationalinfo' => $relationalinfo->id]) }}" style="color: white;">Edit Relationship</a></button>
                            </div>
                            <h5><i class="fas fa-person mr-1"></i>
                                Relational Info</h5>
                            {{-- <h3 class="card-title">Nominee</h3> --}}
                        </div>
                        <div class="card-body">

                            <table style="width: 100%; font-style:normal">
                                <tr>
                                    <td style="width: 25%">Name</td>
                                    <td style="width: 85%">{{$relationalinfo->name}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Relation</td>
                                    <td style="width: 85%">{{$relationalinfo->relation}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Gender</td>
                                    <td style="width: 85%">{{$relationalinfo->gender}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Date of Birth</td>
                                    <td style="width: 85%">{{$relationalinfo->dob}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin.layouts.master>