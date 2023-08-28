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
            @if ($errors->any())
            <div class="alert alert-danger text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('committee.update', $committee->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div id="" class="data">
                    {{-- <h6></h6> --}}
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Committee Name</label>
                                <x-admin.widgets.text-input type="text" name="committee_name" class="form-control" id="" value="{{ $committee->committee_name ?? '' }}" required autofocus />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <label class="form-label">PDF <span>(Max size 5MB file type must be PDF)</span></label>
                            <div class="input-group input-group-dynamic">
                                <input type="file" name="image" class="form-control border" id="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Save">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layouts.master>
