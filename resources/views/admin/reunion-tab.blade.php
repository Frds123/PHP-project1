<div class="card-body px-0 pb-2">
    <div class="table-responsive">
        <table class="table align-items-center mb-0" id="reunionPayment">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ser No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        User</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        Registration Type</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        Deposite Amount</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        Grand Amount</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        Requesting Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        Approval/Rejected Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                @if($payments->where('payment_status', 'reunion_registration'))
                    @foreach ($payments->where('payment_status', 'reunion_registration') as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                            @if ($payment->user->profile->profile_pic)
                                            <img class="avatar avatar-sm me-3 border-radius-lg"
                                             src="{{ asset('storage/profile/'.$payment->user->profile->profile_pic)}}" alt="Prifle Picture">
                                            @else
                                            <img class="avatar avatar-sm me-3 border-radius-lg"
                                            src="{{ asset('storage/profile/user.png')}}" alt="Prifle Picture">
                                            @endif
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $payment->user->name }}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ $payment->user->email }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                @if ($payment->payment_status == 'reunion_registration')
                                    <span class="text-dark text-sm font-weight-bold">Reunion</span>
                                @else
                                    <span class="text-dark text-sm font-weight-bold">Welfare</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $payment->deposit_total_amount ?? 0 }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $payment->grand_total_amount ?? 0 }}</span>
                            </td>
                            <td class="align-middle text-center">
                                @if ($payment->is_approved == 0)
                                    <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                                @elseif ($payment->is_approved == 1)
                                    <span class="badge badge-sm bg-gradient-success">Approved</span>
                                @else
                                    <span class="badge badge-sm bg-gradient-danger">Reject</span>
                                @endif
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $payment->created_at ? date('d M Y h:m:s A', strtotime($payment->created_at)) : '' }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $payment->approved_at ? date('d M Y h:m:s A', strtotime($payment->approved_at)) : '' }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('payment.show', $payment->id) }}">
                                    <span class="badge badge-sm bg-gradient-warning">View</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
