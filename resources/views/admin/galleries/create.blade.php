<x-admin.layouts.master>
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                <i class="material-icons opacity-10"></i>
            </div>
            <h6 class="mb-0">Galleries Photo</h6>
        </div>
        <div class="card-body pt-2">
            <form action="{{ route('galleries.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="reunion_registration" class="data">
                    {{-- <h6></h6> --}}
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 mt-6 mt-sm-0">
                            <label class="form-label">Upload Your Picture</label><br>
                            <div class="input-group input-group-dynamic">
                                <input type="file" name="gallery_pic" class="form-control border dropzone" id="gallery_pic">
                                {{-- <input action="/file-upload" name="gallery_pic" class="form-control border dropzone" id="gallery_pic"/> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label>Is Show Slider </label>
                    <input type="radio" id="" name="is_show_slider" value="1"> YES
                    <input type="radio" id="" name="is_show_slider" value="0"> NO

                </div>

                <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Send</button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layouts.master>
