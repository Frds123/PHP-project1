<x-admin.layouts.master>
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4 overflow-hidden">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h5>Member List</h5>
                    </div>
                    <div class="col-lg-6 col-7 d-flex justify-content-end ">
                        <!-- <a class="btn btn-warning" href="{{ route('export-memberlists') }}">Export
                            Member Info list</a> -->
                    </div>
                </div>
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
                <br />
            </div>
            @can('index-approval_table')
                {{-- <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Member List</h6>
                        </div>
                    </div>
                </div> --}}
                <br>
                {{-- <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active position-relative" id="nav-mem_req-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-mem_req" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Member Request<span
                                class="position-absolute top-0 start-10 translate-middle badge rounded-pill bg-danger">{{ $count }}+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>

                    </div>
                </nav> --}}
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-mem_req" role="tabpanel"
                        aria-labelledby="nav-mem_req-tab">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="memberRequest">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name & Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                                Phone Number</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                                Requesting Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                                Approval Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 w-15">
                                                Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            @if ($user->profile->profile_pic)
                                                                <img class="avatar avatar-sm me-3 border-radius-lg"
                                                                    src="{{ asset('storage/profile/' . $user->profile->profile_pic) }}"
                                                                    alt="Prifle Picture">
                                                            @else
                                                                <img class="avatar avatar-sm me-3 border-radius-lg"
                                                                    src="{{ asset('storage/profile/user.png') }}"
                                                                    alt="Prifle Picture">
                                                            @endif
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $user->email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $user->profile->mobile_no }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($user->status == config('custom.user_status_pending'))
                                                        <a href="#">
                                                            <span
                                                                class="badge badge-sm bg-gradient-secondary">Pending</span>
                                                        </a>
                                                    @elseif ($user->status == config('custom.user_status_approved'))
                                                        <a href="#">
                                                            <span class="badge badge-sm bg-gradient-success">Approved</span>
                                                        </a>
                                                    @else
                                                        <a href="#">
                                                            <span class="badge badge-sm bg-gradient-danger">Rejected</span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $user->created_at ? date('d M Y h:m:s A', strtotime($user->created_at)) : null }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $user->status_updated_at ? date('d M Y h:m:s A', strtotime($user->status_updated_at)) : null }}</span>
                                                </td>

                                                <td class="align-middle text-center  d-flex justify-content-around">
                                                    <a href="{{ route('admin.show', $user->id) }}"><span
                                                            class="btn btn-sm btn-warning btn-sm">View</span>
                                                    </a>
                                                    <form class="ml-2" action="{{ route('admin.destroy', $user->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are you sure?')"
                                                            class="btn btn-sm btn-primary btn-sm">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-admin.layouts.master>
