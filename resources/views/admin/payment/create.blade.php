<x-admin.layouts.master>
    <div class="card">
        <div class="card-header p-3 pt-2">

            <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <h6 class="mb-0">Payment For</h6>
        </div>
        <div class="card-body pt-2">
            <div>
                <select class="form-control" name="choices-state" id="choices-state">
                    <option value="" selected>Select Any one</option>
                    <option value="reunion_registration" >Reunion Registration</option>
                    <option value="welfare_registration">Welfare Registration</option>
                </select>
            </div>
            <div id="reunion_registration" class="data">
                @include('admin.payment.reunion-registration')
            </div>
            <div id="welfare_registration" class="data">
                @include('admin.payment.welfare-registration')
            </div>
        </div>
    </div>
</x-admin.layouts.master>
