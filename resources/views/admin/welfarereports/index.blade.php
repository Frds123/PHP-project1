<x-admin.layouts.master>
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Welfare Report</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0" id="authorReport">
            <thead>
                <tr>
                    <th colspan="8" style="padding-left: 75%">
                        <a class="btn btn-warning" href="{{ route('export-welfarereports') }}">Export
                                    Payment Info for Welfare</a>
                    </th>
                </tr>
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
              @php
                $sl=0   
              @endphp
              @foreach ($payments as $payment)
              @if ($payment->payment_status == 'welfare_registration')
                  <tr>
                      <td class="align-middle text-center">{{ ++$sl }}</td>
                      <td>
                          <div class="d-flex px-2 py-1">
                              <div>
                                  <img src="{{ asset('storage/profile/' . $payment->user->profile->image?->image) }}"
                                      class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
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
              @endif
              @endforeach

          </tbody>
          </table>
        </div>
      </div>
    </div>    
</x-admin.layouts.master>