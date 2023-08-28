<x-admin.layouts.master>
    <div class="col-md-12">
        <div class="content">
            <div class="container-fluid px-lg-4">
                <div class="row">
                    <div class="card" id="basic-anfo">
                        <div class="card-body">
                            <h5 class="font-weight-bolder
                            mb-0">Relational
                            Informations</h5>
                            <p class="mb-0 text-sm">Mandatory informations</p>
                            <div class="button-row d-flex mt-4">
                            </div><br>
                            <div class="multisteps-form__content">
                                <form action="{{ route('relationalinfos.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="dynamic_area">
                                        @if($relations->isEmpty())
                                        <p>Spouse Info</p>
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="width: 50%"><div
                                                    class="input-group
                                                    input-group-dynamic">
                                                    <label class="form-label">Name</label>
                                                        <x-admin.widgets.text-input  class="form-control" type="text" name="spouse_name" :value="old('spouse_name')" required autofocus />
                                                    </div>
                                                </td>
                                                <td style="width: 50%; padding-left: 2%">
                                                    <div
                                                        class="input-group input-group-dynamic">
                                                        <div class="col-5">
                                                            <label class="form-label">Gender</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <select class="form-control" name="spouse_gender" id="choices-gender" required>
                                                                <option value="">Select Gender</option>
                                                            </select>
                                                        </div>
                                                    </div>                                                
                                                </td>
                                            </tr>
                                        </table>
                                        <br/>
                                        <p>Children Info</p>
                                        <table class="table table-bordered" id="dynamic_field">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="multipleEntry">
                                                <tr>
                                                    <th>
                                                        <x-admin.widgets.text-input class="form-control" type="text" name="children[]" placeholder="Name of children" required autofocus />
                                                    </th>
                                                    <th>
                                                        <input class="form-control" name="dob[]" type="date" required>
                                                    </th>
                                                    <th>
                                                        <select class="form-control" name="gender[]" required>
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </th>
                                                    <td class="">
                                                        <button class="btn btn-danger removeBtn d-none" type="button">X</button>
                                                   </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                             <div class="col-12 text-end">
                                                    <button class="btn btn-primary addNewBtn" type="button">+ Add New</button>
                                             </div>
                                        </div>
                                        @else
                                        <p>Spouse Info</p>
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="width: 50%"><div
                                                    class="input-group
                                                    input-group-dynamic">
                                                    <label class="form-label">Name</label>
                                                        <x-admin.widgets.text-input  class="form-control" type="text" name="spouse_name" value="{{$spouse->name}}" required autofocus />
                                                    </div>
                                                </td>
                                                <td style="width: 50%; padding-left: 2%">
                                                    <div
                                                        class="input-group input-group-dynamic">
                                                        <div class="col-5">
                                                            <label class="form-label">Gender</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <select class="form-control" name="spouse_gender" id="choices-spouse_gender" required>
                                                                @if (!is_null($spouse->gender))
                                                                    @if($spouse->gender == 'Male')
                                                                        <option value="{{ $spouse->gender }}">{{ $spouse->gender }}</option>
                                                                        <option value="Female">Female</option>
                                                                    @elseif($spouse->gender == 'Female')
                                                                        <option value="{{ $spouse->gender }}">{{ $spouse->gender }}</option>
                                                                        <option value="Female">Male</option>
                                                                    @endif
                                                                @endif
                                                                <option value="">Select Gender</option>
                                                            </select>
                                                        </div>
                                                    </div>                                                
                                                </td>
                                            </tr>
                                        </table>
                                        <br/>
                                        <p>Children Info</p>
                                        <table class="table table-bordered" id="dynamic_field">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="multipleEntry">
                                                @php
                                                  $i = 0; 
                                                @endphp
                                                @foreach($children as $child)
                                                <tr>
                                                    <th>
                                                        <x-admin.widgets.text-input class="form-control" type="text" name="children[]" value="{{$child->name}}" placeholder="Name of children" required autofocus />
                                                    </th>
                                                    <th>
                                                        <input class="form-control" name="dob[]" type="date" value="{{ $child->dob ?? null }}" required>
                                                    </th>
                                                    <th>
                                                        <select class="form-control" name="gender[]" value="{{$child->gender }}" required>
                                                            @if (!is_null($child->gender))
                                                                @if($child->gender == 'Male')
                                                                    <option value="{{ $child->gender }}">{{ $child->gender }}</option>
                                                                    <option value="Female">Female</option>
                                                                @elseif($child->gender == 'Female')
                                                                    <option value="{{ $child->gender }}">{{ $child->gender }}</option>
                                                                    <option value="Female">Male</option>
                                                                @endif
                                                            @endif
                                                        </select>
                                                    </th>
                                                    <td class="">
                                                        <button class="btn btn-danger removeBtn d-none" type="button">X</button>
                                                   </td>
                                                @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                             <div class="col-12 text-end">
                                                    <button class="btn btn-primary addNewBtn" type="button">+ Add New</button>
                                             </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row d-flex mt-4">
                                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Save">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const addNewBtn = document.querySelector('.addNewBtn');
        const removeBtn = document.querySelector('.removeBtn');
        const multipleEntry = document.querySelector('#multipleEntry');

        addNewBtn.addEventListener('click', (e) => {
            const lastRow = multipleEntry.lastElementChild;
            lastRow.querySelector('.removeBtn').classList.remove("d-none")
            const id = parseInt(lastRow.getAttribute('id'))
            let clone = lastRow.cloneNode(true);
            clone.querySelector('.removeBtn').addEventListener('click', function() {
                removeRow(this.parentElement.parentElement);
            })
            clone.setAttribute('id', (id + 1));
            multipleEntry.appendChild(clone)
        })

        removeBtn.addEventListener('click', (e) => {
            removeRow(e.target.parentElement.parentElement);
        })

        function removeRow(e) {
            if (confirm('Are you sure want to delete ?')) 
                if (multipleEntry.childElementCount > 1) e.remove();

            if (multipleEntry.childElementCount == 1) document.querySelector('.removeBtn').classList.add("d-none");
        }
    </script>
</x-admin.layouts.master>