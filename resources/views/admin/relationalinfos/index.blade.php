<x-admin.layouts.master>
    <div class="col-12 col-lg-12">
        <div class="content">
            <div class="container-fluid px-lg-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Relational Info</h3>
                            <div class="button-row
                                d-flex mt-4">
                                <button class="btn
                                    bg-gradient-dark
                                    ms-auto mb-0"
                                    type="button"
                                    title="Edit"><a href="{{ route('relationalinfos.create') }}" style="color: white;">Add Relational Info</a></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table style="width: 100%; font-style:normal; text-align: center">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Name</th>
                                        <th>Relationship</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sl=0 @endphp
                                    @foreach($relations as $relation)
                                    <tr>
                                        <td style="width: 10%; font-style:normal">{{++$sl}}</td>
                                        <td style="width: 25%; font-style:normal">{{$relation->name}}</td>
                                        <td style="width: 15%; font-style:normal">{{$relation->relation}}</td>
                                        <td style="width: 15%; font-style:normal">{{$relation->gender}}</td>
                                        <td style="width: 15%; font-style:normal">{{$relation->dob}}</td>
                                        <td>
                                            <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Edit"><a href="{{ route('relationalinfos.edit', $relation->id) }}" style="color: white;">Edit</a></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin.layouts.master>