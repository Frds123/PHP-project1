<x-admin.layouts.master>
    <div class="col-12 col-lg-12">
        <div class="content">
            <div class="container-fluid px-lg-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="button-row d-flex mt-2">
                                <h5><i class="fas fa-book mr-1"></i>
                                    Payment Info
                                </h5>
                                <button class="btn bg-gradient-dark ms-auto mb-0"type="button"title="Back">
                                    <a href="{{ route('payment.index') }}" style="color: white;">Back</a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6>Payment Purpose : <span class="text-info font-weight-bold">{{ ucfirst(str_replace('_registration', '', $payment->payment_status)) }}</span></h6>
                            <table style="width: 100%; font-style:normal">
                                <tr>
                                    <th style="width: 20%">Alumni</th>
                                    <td style="width: 25%">{{ $payment->alumni }}</td>
                                    <th style="width: 20%">Payment Approval Status</th>

                                  
                                   <td style="width: 25%">
                                   
                                    @if ($payment->is_approved == 0)
                                        <form action="{{ route('payment.update-status') }}" method="post">@csrf
                                            <input type="hidden" name="id" value="{{ $payment->id }}">
                                            @can('btn')
                                            <button type="submit" class="btn btn-sm btn-success text-xs" name="is_approved" value="1">
                                               <i class="fa fa-check"></i> Approved
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-danger text-xs" name="is_approved" value="2">
                                                <i class="fa fa-times"></i> Reject
                                            </button>
                                            @endcan
                                        </form>
                                   
                                    @elseif ($payment->is_approved == 2)
                                    
                                        <span class="text-danger text-sm font-weight-bold">Reject</span>
                                    @else
                                        <span class="text-success text-sm font-weight-bold d-block">Approved</span>
                                     
                                        <span class="text-success text-xs font-weight-bold">{{ date("d M Y h:m:s A", strtotime($payment->approved_at)) ?? null }}</span>
                                    @endif
                                </td> 
                                  
                                   
                                </tr>
                                <tr>
                                    <th style="width: 20%">Grand Total Amount</th>
                                    <td style="width: 25%">{{ $payment->grand_total_amount }}</td>
                                    <th style="width: 20%">Payment Method</th>
                                    <td style="width: 25%">{{ ucfirst($payment->payment_type) }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">Deposit Total Amount</th>
                                    <td style="width: 25%">{{ $payment->deposit_total_amount }}</td>
                                    <th style="width: 20%">Payment Date</th>
                                    <td style="width: 25%">{{ date("d M Y h:m:s A", strtotime($payment->payment_date)) ?? null }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">Voucher No</th>
                                    <td style="width: 25%">{{ $payment->voucher_no }}</td>
                                    <th style="width: 20%">Voucher Date</th>
                                    <td style="width: 25%">{{ date("d M Y h:m:s A", strtotime($payment->voucher_date)) ?? null }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">Deposit From Branch</th>
                                    <td style="width: 25%">{{ $payment->deposit_from_branch_code }}</td>
                                    <th style="width: 20%">Payment Description</th>
                                    <td style="width: 25%">{{ $payment->payment_description }}</td>
                                </tr>
                                @if (!is_null($payment->reunion_info_json))
                                    @php
                                        $reunionInfo = json_decode($payment->reunion_info_json, true);
                                    @endphp
                                    <tr>
                                        <th colspan="2">
                                            <h6><span class="text-dark font-weight-semibold">Relation Info</span></h6>
                                            @if (count($reunionInfo['spouse']))
                                                <h6><span class="text-dark text-sm font-weight-semibold">Spouse</span></h6>
                                                @foreach ($reunionInfo['spouse'] as $id => $spouseInfo)
                                                    <span class="d-block">Name : <span class="text-dark font-weight-bold">{{ $spouseInfo['name'] }}</span></span>
                                                @endforeach
                                            @endif
                                            @if (!is_null($reunionInfo['guest']))
                                                <h6><span class="text-dark text-sm font-weight-semibold">Guest : {{ $reunionInfo['guest'] }}</span></h6>
                                            @endif
                                        </th>
                                        <th colspan="2">
                                            @if (count($reunionInfo['childrens']))
                                                <h6><span class="text-dark text-sm font-weight-semibold">Childrens</span></h6>
                                                <ol>
                                                    @foreach ($reunionInfo['childrens'] as $id => $childrenInfo)
                                                        <li>
                                                            <span class="d-block">Name : <span class="text-dark font-weight-bold">{{ $childrenInfo['name'] }}</span></span>
                                                            <span class="d-block">Age : <span class="text-dark font-weight-bold">{{ $childrenInfo['age'] }}</span></span>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </th>
                                    </tr>
                                @endif
                                @if (!is_null($payment->welfare_info_json))
                                    @php
                                        $welfareInfo = json_decode($payment->welfare_info_json, true);
                                    @endphp
                                    <tr>
                                        <tr>
                                            <th style="width: 20%">Deposit From Month & Year</th>
                                            <td style="width: 25%">
                                                {{ $welfareInfo['deposit_from_month'] ? "Month : ".$welfareInfo['deposit_from_month'] : "" }}
                                                {{ $welfareInfo['deposit_from_year'] ? " Year : ".$welfareInfo['deposit_from_year'] : "" }}
                                            </td>
                                            <th style="width: 20%">Deposit To Month & Year</th>
                                            <td style="width: 25%">
                                                {{ $welfareInfo['deposit_to_month'] ? "Month : ".$welfareInfo['deposit_to_month'] : "" }}
                                                {{ $welfareInfo['deposit_to_year'] ? " Year : ".$welfareInfo['deposit_to_year'] : "" }}
                                            </td>
                                        </tr>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Total Month</th>
                                        <td style="width: 25%">{{ $payment['month_count'] }}</td>
                                        <th style="width: 20%">details</th>
                                        <td style="width: 25%">{{ $payment['details'] }}</td>
                                    </tr>
                                @endif
                                @if(isset($payment->images) && count($payment->images))
                                    <tr>
                                        <th colspan="4">
                                            <h6><span class="text-dark font-weight-semibold">Images</span></h6>
                                            <div class="row">
                                                @foreach ($payment->images as $item)
                                                    <div class="col-md-6">
                                                        <img src="{{ asset('storage/images/'.$item->image) }}" alt="Image" width="100%" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </th>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin.layouts.master>
