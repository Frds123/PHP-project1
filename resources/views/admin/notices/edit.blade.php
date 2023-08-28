<x-admin.layouts.master>
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                <i class="material-icons opacity-10"></i>
            </div>
            <h6 class="mb-0">Notices Update</h6>
        </div>
        <div class="card-body pt-2">
            {{-- @dd($notice); --}}
            <form action="{{ route('notices.update',$notice->id )}}" method="POST">
                @csrf
                @method('PUT')
                <div id="reunion_registration" class="data">
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Title</label><br>
                                <x-admin.widgets.text-input id="title" class="form-control" type="text" name="title" value="{{ $notice->title ?? '' }}" required autofocus />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layouts.master>
