@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/setprofile.css') }}" rel="stylesheet" />
@endsection
@section('content')
<section id="portfolio-details" class="portfolio-details">
<div class="container p-0">

    <div class="row">
        <div class="section-title">
            <h2>   </h2>
            <h2>   </h2>
            <h2>   </h2>
            <p>     </p>
            <h2>Change Password</h2>
        </div>
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
              <div class="col-8">
                  <h3 class="mb-0">Change Password</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="profile" class="btn btn-sm btn-primary">Cancel</a>
                </div>               
              </div>
            </div>
            <div class="card-body">
              <form>
                <hr class="my-4">                
                <h6 class="heading-small text-muted mb-4">Change Password</h6>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-password">Current Password</label>
                        <input type="text" id="input-password" class="form-control form-control-alternative" placeholder="Current Password" value="....">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-password">New Password</label>
                        <input type="text" id="input-password" class="form-control form-control-alternative" placeholder="New Password" value="....">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-password">Confirm</label>
                        <input type="text" id="input-password" class="form-control form-control-alternative" placeholder="Confirm" value="....">
                      </div>
                    </div>
                  </div>
                </div> 
                  <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-default center">Save</a>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div> 
</section>
@endsection
