<form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">@csrf
    <input type="hidden" name="paymentable_type" value="reunion_registration" />
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <h5>Reunion</h5>
        </div>
        <div class="col-12 col-sm-6">
            <h6 id="totalValue">Total Amount: <span id="totalAmount">0</span>/-BDT
                <br>
                {{-- <span style="background-color: black; color:white; font-size: 10px;">
                [
                    Self (1 X 4,000/-) = 4,000/- ,

                    Spouse (1 X 2,000/-) = 2,000/-,

                    Child (1 X 1,000/-) = 1,000/-,

                    Guest (1 X 1,500/-) = 1,500/-
                ]
                </span> --}}
                <span style="background-color: yellow; font-size: 10px;">
                    {{-- Self = 4000 TK, Spouse = 2000 TK <br>
                    Children = 1000 TK, Guest = 1500 TK --}}
                    (
                    Self = 1 X 4000 TK <span class="d-none" id="selfAmount"> 0 TK</span>,

                    Spouse = 1 X 2000 TK<span class="d-none" id="spouseCount">{{ count($spouseOrHusbands) }}</span><span class="d-none" id="spouseAmount">0 TK</span>
                    <br>
                    Children = 1 X 1000 TK<span class="d-none" id="childrenCount">{{ count($childrens) }}</span><span
                    class="d-none" id="childrenAmount">0 TK</span>

                    Guest = 1 X 1500 TK <span  class="d-none" id="guestCount"> 0 TK</span> <span  class="d-none" id="guestAmount">0</span>
                    )
                </span>
            </h6>
        </div>
    </div>
    <br>
    <h6>Attendee Inforamtion</h6>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Alumni</label>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <x-admin.widgets.text-input id="alumni" class="form-control" type="text" name="alumni"
                    :value="Auth::user()->name" required autofocus />
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">Spouse/Husband</label>
                </div>
                <div class="col-8">
                    @foreach ($spouseOrHusbands as $spouseOrHusband)
                        <div class="form-check">
                            <input name="spouseOrHusbands[]" class="form-check-input spouseOrHusband" type="checkbox"
                                value="{{ $spouseOrHusband}}" id="{{ 'spouseOrHusband' . $spouseOrHusband->id }}"
                                checked="">
                            <label class="custom-control-label"
                                for="{{ 'spouseOrHusband' . $spouseOrHusband->id }}">{{ $spouseOrHusband->name }}</label>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">Guest</label>
                </div>
                <div class="col-8">
                    <select class="form-control" name="guest" id="choicesGuest">
                        <option value="">Select Guest</option>
                        <option value="1">1</option>
                        <option value="0">N/A</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">No. of Child (5 Years Above)</label>
                </div>
                <div class="col-8">
                    @foreach ($childrens as $children)
                        <div class="form-check">
                            <input name="childrens[]'" class="form-check-input childrens"
                                type="checkbox" value="{{ $children }}" id="{{ 'children' . $children->id }}"
                                checked="">
                            <label class="custom-control-label" for="{{ 'children' . $children->id }}"><b>Name:
                                </b>{{ $children->name }}<br><b>Gender:
                                </b>{{ $children->gender }}<br><b>Date of Birth:</b>
                                {{ $children->dob }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
            <label class="form-label">Upload Your Family Picture</label>
            <div class="input-group input-group-dynamic">
                <input type="file" name="family_picture" class="form-control" id="family_pic">
            </div>
        </div>
    </div>
    <br>
    <h6>Payment Inforamtion</h6>
    <div class="row mt-3">
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Total Deposit of Amount</label>
                <x-admin.widgets.text-input id="deposit_total_amount" class="form-control" type="text"
                    name="deposit_total_amount" :value="old('deposit_total_amount')" required autofocus />
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <label class="form-label">Grand Total Amount</label>
                <x-admin.widgets.text-input id="grand_total_amount" class="form-control" type="text"
                    name="grand_total_amount" :value="old('grand_total_amount')" required autofocus="autofocus" readonly />
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">Mode of Payment</label>
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
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">Payment Date</label>
                </div>
                <div class="col-8">
                    <input name="payment_date" class="form-control datetimepicker" type="text" data-input
                        required>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-dynamic">
                <div class="col-4">
                    <label class="form-label">Payment Description</label>
                </div>
                <div class="col-8">
                    <textarea name="payment_description" id="payment_description" class="multisteps-form__input form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-12 mt-3 mt-sm-0">
            <label class="form-label">Upload Voucher Picture</label>
            <div class="input-group input-group-dynamic">
                <input type="file" name="voucher_picture" class="form-control" id="family_pic">
            </div>
        </div>
    </div>
    <div class="button-row d-flex mt-4">
        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Save</button>
    </div>
</form>

<script>
    var perPerson = 4000;
    var perGuest = 1500;
    var perSpouse = 2000;
    var perChildren = 1000;

    init()

    function init() {
        updateTotalAmount();

        const guestSelect = document.querySelector('#choicesGuest');
        guestSelect.addEventListener('change', () => {

            if (guestSelect.value) {
                const guestCountElement = document.querySelector('#guestCount');
                const guestCount = parseInt(guestSelect.value);
                guestCountElement.innerText = guestCount;
                updateTotalAmount();
            } else {
                alert('Please select guest')
            }

        });

        const spouseCheckbox = document.querySelectorAll('.spouseOrHusband');
        spouseCheckbox.forEach(checkboxInput => {
            checkboxInput.addEventListener('change', () => {
                if (checkboxInput.checked) {
                    plusSpouse()
                } else {
                    minusSpouse()
                }
            });
        })

        const childrenCheckbox = document.querySelectorAll('.childrens');
        childrenCheckbox.forEach(checkboxInput => {
            checkboxInput.addEventListener('change', () => {
                if (checkboxInput.checked) {
                    plusChildren(perChildren)
                } else {
                    minusChildren(perChildren)
                }
            });
        })
    }

    function plusSpouse() {
        const spouseCountElement = document.querySelector('#spouseCount');
        spouseCountElement.innerText = parseInt(spouseCountElement.innerText) + 1;
        updateTotalAmount();
    }

    function minusSpouse() {
        const spouseCountElement = document.querySelector('#spouseCount');
        spouseCountElement.innerText = parseInt(spouseCountElement.innerText) - 1;
        updateTotalAmount();
    }

    function plusChildren() {
        const childrenCountElement = document.querySelector('#childrenCount');
        childrenCountElement.innerText = parseInt(childrenCountElement.innerText) + 1;
        updateTotalAmount();
    }

    function minusChildren() {
        const childrenCountElement = document.querySelector('#childrenCount');
        childrenCountElement.innerText = parseInt(childrenCountElement.innerText) - 1;
        updateTotalAmount();
    }

    function updateTotalAmount() {
        const selfAmountElement = document.querySelector('#selfAmount');
        selfAmountElement.innerText = perPerson;

        const spouseCountElement = document.querySelector('#spouseCount');
        const spouseAmountElement = document.querySelector('#spouseAmount');
        const totalSpouseAmount = parseInt(spouseCountElement.innerText) * perSpouse;
        spouseAmountElement.innerText = totalSpouseAmount;

        const childrenCountElement = document.querySelector('#childrenCount');
        const childrenAmountElement = document.querySelector('#childrenAmount');
        totalChildrenAmount = parseInt(childrenCountElement.innerText) * perChildren;
        childrenAmountElement.innerText = totalChildrenAmount;

        const guestCountElement = document.querySelector('#guestCount');
        const guestAmountElement = document.querySelector('#guestAmount');
        totalGuestAmount = parseInt(guestCountElement.innerText) * perGuest;
        guestAmountElement.innerText = totalGuestAmount;

        const totalAmountElement = document.querySelector('#totalAmount');

        const totalAmount = totalSpouseAmount + totalChildrenAmount + totalGuestAmount + perPerson;

        totalAmountElement.innerText = totalAmount;
        document.querySelector('#grand_total_amount').value = totalAmount
    }

    function myFunction() {
        var element = document.getElementById("myDIV");
        element.classList.add("mystyle");
    }
</script>
