<x-admin.layouts.master>
    <div class="col-12 col-lg-12 col-md-12">
        <div class="content">
            <div class="container-fluid px-lg-4">
                <div class="row">
                    <div class="card mt-4"
                        id="password">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <form action="{{ route('update-password')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="card-body pt-0">
                                @if (session('status'))
                                <div class="alert alert-success text-white" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger text-white" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="input-group
                                input-group-outline">
                                <label for="currentPasswordInput"
                                    class="form-label">Current
                                    password</label>
                                <input name="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror" id="currentPasswordInput">
                                   
                            </div>
                            @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <div class="input-group
                                input-group-outline
                                my-4">
                                <label for="newPasswordInput"
                                    class="form-label">New
                                    password</label>
                                <input name="new_password" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput">
                                  
                            </div>
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <div class="input-group
                                input-group-outline">
                                <label for="confirmNewPasswordInput"
                                    class="form-label">Confirm
                                    New password</label>
                                <input name="new_password_confirmation" type="password"
                                    class="form-control @error('confirm_password') is-invalid @enderror" id="confirmNewPasswordInput">
                                   
                            </div>
                            @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <h5 class="mt-5">Password
                                requirements</h5>
                            <p class="text-muted mb-2">
                                Please follow this guide
                                for a strong password:
                            </p>
                            <ul class="text-muted ps-4
                                mb-0 float-start">
                                <li>
                                    <span
                                        class="text-sm">One
                                        special
                                        characters</span>
                                </li>
                                <li>
                                    <span
                                        class="text-sm">Min
                                        6 characters</span>
                                </li>
                                <li>
                                    <span
                                        class="text-sm">One
                                        number (2 are
                                        recommended)</span>
                                </li>
                                <li>
                                    <span
                                        class="text-sm">Change
                                        it often</span>
                                </li>
                            </ul>
                            <button type="submit" class="btn
                                bg-gradient-dark btn-sm
                                float-end mt-6 mb-0">Update
                                password</button>
                        </form>
                        </div>
                    </div>
                    {{-- <div class="card mt-4" id="delete">
                        <div class="card-body">
                            <div class="d-flex
                                align-items-center
                                mb-sm-0 mb-4">
                                <div class="w-50">
                                    <h4>Delete Account</h4>
                                    <p class="text-sm
                                        mb-0">Once you
                                        delete your
                                        account, there
                                        is no going
                                        back. Please be
                                        certain.</p>
                                </div>
                                <div class="w-50
                                    text-end">
                                    <button class="btn
                                        btn-outline-secondary
                                        mb-3 mb-md-0
                                        ms-auto"
                                        type="button"
                                        name="button">Deactivate</button>
                                    <button class="btn
                                        bg-gradient-danger
                                        mb-0 ms-2"
                                        type="button"
                                        name="button">Delete
                                        Account</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
  
</x-admin.layouts.master>