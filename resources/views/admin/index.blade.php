<x-admin.layouts.master>
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4 overflow-hidden">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h5>Welcome to Dashboard!</h5>
                    </div>
                </div>
                <br />
            </div>
            @can('index-approval_table')
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Approval Table</h6>
                        </div>
                    </div>
                </div>
                <br>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-mem_req-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-mem_req" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true"><span
                                class="position-absolute translate-middle badge rounded-pill bg-danger">{{ $count }}+
                                <span class="visually-hidden">unread messages</span>
                            </span> <span>Member Request</span>
                        </button>

                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-reunion_pay_req" type="button" role="tab"
                            aria-controls="nav-reunion_pay_req" aria-selected="false"><span
                                class="position-absolute translate-middle badge rounded-pill bg-danger">{{ $reUnionPayRPending }}+
                                <span class="visually-hidden">unread messages</span>
                            </span>Reunion Payment Request
                        </button>

                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-welfare_pay_req" type="button" role="tab"
                            aria-controls="nav-welfare_pay_req" aria-selected="false"><span
                                class="position-absolute translate-middle badge rounded-pill bg-danger">{{ $welfarefPayRPending }}+
                                <span class="visually-hidden">unread messages</span>
                            </span><span class=""> Welfare Payment Request</span>
                        </button>
                    </div>
                </nav>
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
                                                Approval/Rejected Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
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

                                                <td class="align-middle text-center">
                                                    <a href="{{ route('admin.show', $user->id) }}">
                                                        <span class="badge badge-sm bg-gradient-warning">View</span>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-reunion_pay_req" role="tabpanel"
                        aria-labelledby="nav-reunion_pay_req-tab">
                        @include('admin.reunion-tab')
                    </div>
                    <div class="tab-pane fade" id="nav-welfare_pay_req" role="tabpanel"
                        aria-labelledby="nav-welfare_pay_req-tab">
                        @include('admin.welfare-tab')
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-admin.layouts.master>
