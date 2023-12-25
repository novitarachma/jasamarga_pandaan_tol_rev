@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/setprofile.css') }}" rel="stylesheet" />
@endsection
@section('content')
<section id="portfolio-details" class="portfolio-details">
    <br><br>
    <div class="container p-0">

        <div class="row">
            <div class="section-title">

                <h2>Upload Image</h2>
            </div>
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Image</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('profil')}}" class="btn btn-sm btn-primary">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update.profile')}}" id="myForm"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Upload Image Profil & Cover</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label for="file">Upload Image Profil</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="foto"
                                                        class="custom-file-input @error('foto') is-invalid @enderror" id="images">
                                                    <label class="custom-file-label" for="images">Choose file</label>
                                                    @error('foto')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="file">Upload Image Cover</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="foto_cover"
                                                        class="custom-file-input @error('foto_cover') is-invalid @enderror" id="images">
                                                    <label class="custom-file-label" for="images">Choose file</label>
                                                    @error('foto_cover')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <h6 class="heading-small text-muted mb-4">About me</h6>
                                    <div class="pl-lg-4">
                                        <div class="form-group focused">
                                            <label>About Me</label>
                                            <textarea rows="4" name="description"
                                                class="form-control form-control-alternative"
                                                placeholder="A few words about you ..."><?php echo $user->description ?></textarea>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="submit" class="btn btn-sm btn-default center">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('theme/adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function() {
    bsCustomFileInput.init();
});
</script>
@endsection