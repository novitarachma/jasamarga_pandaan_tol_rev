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
                  <div class="form-group file-area">
                    <p><label for="images">Upload Image Profil</label>
                    <input type="file" name="foto" id="images" multiple="multiple"/></p>
                    <p><label for="images">Upload Image Cover</label>
                    <input type="file" name="foto_cover" id="images" multiple="multiple"/></p>
                        <div class="file-dummy">
                            <div class="success">Great, your files are selected. Keep on.</div>
                                <div class="default">Please select some files</div>
                            </div>
                        </div>
                  </div>
                <hr class="my-4">
               <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea rows="4" name="description" class="form-control form-control-alternative" placeholder="A few words about you ..."><?php echo $user->description ?></textarea>
                  </div>
                  <div class="col-4 text-right">
                  <button type="submit" class="btn btn-sm btn-default center">Save</button>
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