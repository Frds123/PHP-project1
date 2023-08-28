<x-admin.layouts.master>
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                <i class="material-icons opacity-10"></i>
            </div>
            <h6 class="mb-0">Event</h6>
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
            <form action="{{ route('events.update', $event->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div id="" class="data">
                    {{-- <h6></h6> --}}
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Title</label>
                                <x-admin.widgets.text-input type="text" name="title" class="form-control" id="" value="{{ $event->title ?? '' }}" required autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            {{-- <div class="input-group input-group-dynamic">
                                <label class="form-label">Description</label>
                                <x-admin.widgets.text-input type="text" name="description" class="form-control" id="" value="{{ $event->description ?? '' }}" required autofocus />
                            </div> --}}
                            <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                                <div class=" input-group-dynamic">
                                <label class="form-label">Description</label>
                                <textarea name="description"  id="myeditorinstance">{{ $event->description ?? '' }}</textarea>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Start Date</label>
                                <input type="date" name="event_start_date" class="form-control datetimepicker" id="" value="{{ $event->event_start_date ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <div class=""input-group input-group-dynamic>
                            <label class="form-label">End Date</label>
                                <input type="date" name="event_end_date" class="form-control datetimepicker" id="" value="{{ $event->event_end_date ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <label class="form-label">Image <span>(Max-width X Max-height = 1116 X 742)</label>
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
    @push('scripts')
<script src="{{ asset('ui/admin-ui/assets') }}/js/tinymce.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'powerpaste advcode table lists checklist',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script>
@endpush
</x-admin.layouts.master>
