</div>
<x-admin.layouts.master>
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                <i class="material-icons opacity-10"></i>
            </div>
            <h6 class="mb-0">Committee</h6>
        </div>
        <div class="card-body pt-2">
            <table style="width: 100%; text-align: center">
                <tr>
                    <td style="width: 100%"><h3>Committee Name: {{$committee->committee_name}}</h3></td>
                </tr>
                <tr>
                    <td style="width: 100%"><br></td>
                </tr>
                <tr>
                    <td style="width: 100%"><img src="{{ asset('storage/committee/' . $committee->image->image) }}"
                        alt="user1"></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 100%">
                            <a href="{{ route('committee.index') }}"><button class="btn btn-success">Committee List</button></a>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</x-admin.layouts.master>
