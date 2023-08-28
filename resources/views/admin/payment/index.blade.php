<x-admin.layouts.master>
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4 pb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    
                    <div class="col-lg-6 col-7">
                        <h6>Payment</h6>
                    </div>
                    <div class="col-lg-6 col-7 d-flex justify-content-end">
                        <a href="{{ route('payment.create') }}"><button class="btn btn-success">Create</button></a>
                    </div>

                   
                </div>
                <div class="col-lg-3">
                        <a href="{{ url('/example1') }}"><button class="btn btn-success">Live Payment</button></a>
                    </div>
            </div>
            <br>
        </div>
        <div class="card px-0 mt-4">
            {{-- Alert Message --}}
            @if (session('message'))
                <div class="alert alert-success alert-dismissible text-white fade show mb-4" role="alert">
                    <span class="alert-icon align-middle">
                    </span>
                    <span class="alert-text"><strong>Success! </strong>{{ session('message') }}</span>
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
                                Approval Date</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

</x-admin.layouts.master>
