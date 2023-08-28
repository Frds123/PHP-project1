<form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">@csrf
    <input type="hidden" name="paymentable_type" value="welfare_registration" />
    <h5>Welfare</h5>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <label class="form-label">Alumni</label>
                <input name="alumni" id="alumni" value="{{ auth()->user()->name }}" class="multisteps-form__input form-control" type="text" />
            </div>
        </div>
    </div>
    <br>
    <b>Deposit For</b>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <div class="col-3">
                    <label class="form-label">From</label>
                </div>
                <div class="col-5">
                    <select class="form-control" name="deposit_from_month" id="choices-month">
                        <option value="">Select Month</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-control" name="deposit_from_year" id="choices-year">
                        <option value="">Select Year</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <div class="col-3">
                    <label class="form-label">To</label>
                </div>
                <div class="col-5">
                    <select class="form-control" name="deposit_to_month" id="choices-to-month">
                        <option value="">Select Month</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-control" name="deposit_to_year" id="choices-to-year">
                        <option value="">Select Year</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Month Count</label>
                <x-admin.widgets.text-input id="month_count" class="form-control" type="text" name="month_count"
                    :value="old('month_count')" required autofocus />
            </div>
        </div>
    </div>
    <!-- <hr style="border: 1px solid;"> -->
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Deposited Amount</label>
                <x-admin.widgets.text-input id="deposit_total_amount" class="form-control" type="text" name="deposit_total_amount"
                    :value="old('deposit_total_amount')" required autofocus />
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Grand Total</label>
                <x-admin.widgets.text-input id="grand_total_amount" class="form-control" type="text" name="grand_total_amount"
                    :value="old('grand_total_amount')" required autofocus />
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Voucher No</label>
                <x-admin.widgets.text-input id="voucher_no" class="form-control" type="text" name="voucher_no"
                    :value="old('voucher_no')" required autofocus />
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Voucher Date</label>
                <input class="form-control datetimepicker" name="voucher_date" type="text" data-input>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label class="form-label">Voucher Picture</label>
            <div class="input-group input-group-dynamic">
                <input type="file" name="voucher_picture" class="form-control" id="voucher_picture">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Deposit From (Branch Code)</label>
                <x-admin.widgets.text-input id="deposit_from_branch_code" class="form-control" type="text" name="deposit_from_branch_code"
                    :value="old('deposit_from_branch_code')" required autofocus />
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">Payment Type</label>
                </div>
                <div class="col-8">
                    <select class="form-control" name="payment_type" id="choices-m-o-pay">
                        <option value="">Select Payment Method</option>
                        <option value="hand_cash">Hand Cash</option>
                        <option value="bank">Bank</option>
                        <option value="bkash">Bkash</option>
                        <option value="rocket">Rocket</option>
                        <option value="ucash">UCash</option>
                        <option value="upay">Upay</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">Payment Description</label>
                </div>
                <div class="col-8">
                    <textarea name="payment_description" id="payment_description" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Details (if any)</label>
                <x-admin.widgets.text-input id="details" class="form-control" type="text" name="details"
                    :value="old('details')" required autofocus />
            </div>
        </div>
    </div>
    <div class="button-row d-flex mt-4">
        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Send</button>
    </div>
</form>
