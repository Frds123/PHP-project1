<x-admin.layouts.master>
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4 pb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Events</h6>
                    </div>
                    <div class="col-lg-6 col-7 d-flex justify-content-end">
                        <a href="{{ route('events.create') }}"><button class="btn btn-success">Create</button></a>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="card px-0 mt-4">
            {{-- Alert Message --}}
            @if (session('message'))
                <div class="alert alert-success alert-dismissible text-white fade show mb-4" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">
                            thumb_up_off_alt
                        </span>
                    </span>
                    <span class="alert-text"><strong>Successfully!</strong> {{ session('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Alert Message --}}
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="memberRequest">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ser No</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                Title</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                Start Date</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                End Date</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 w-15">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $event->title }}</td>
                                <td class="text-center">{{ $event->event_start_date }}</td>
                                <td class="text-center">{{ $event->event_end_date }}</td>
                                <td class="text-center d-flex justify-content-around">
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning btn-sm"> Edit </a>
                                    <form class="ml-2" action="{{ route('events.destroy', $event->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-primary btn-sm"> Delete</button>
                                       </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin.layouts.master>
