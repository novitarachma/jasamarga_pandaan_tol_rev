@extends('layouts.user')

@section('content')
<section id="portfolio-details" class="portfolio-details">
    <div class="row">
        <div class="section-title">
            <h2>   </h2>
            <h2>   </h2>
            <p>     </p>
            <h2>Profile</h2>
        </div>
    </div>
</section>
<link href="{{ asset('assets/css/setprofile.css') }}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="panel">
            <div class="cover-photo">
              <div class="fb-timeline-img">
                  <img src="https://bootdey.com/img/Content/bg1.jpg" alt="">
              </div>
              <div class="fb-name">
                  <h2><a href="#">Deyson Bejarano</a></h2>
              </div>
            </div>
            <div class="panel-body">
              <div class="profile-thumb">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
              </div>
              <a href="#" class="fb-user-mail">dbjarano@bootdey.com</a>
            </div>
        </div>

        <div class="panel profile-info">
          <form>
              <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>
          </form>
          <footer class="panel-footer">
              <button type="button" class="btn btn-info pull-right">Post</button>
          </footer>
        </div>
@endsection
