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
    <div class="container bootdey">
    <div class="content-page">
    <div class="profile-banner" style="background:url(https://bootdey.com/img/Content/bg1.jpg);">
		<div class="col-sm-3 avatar-container">
			<img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
		</div>
	</div>
    <div class="content">

		<div class="row">
			<div class="col-sm-3">
			</div><!-- End div .col-sm-4 -->

			<div class="col-sm-9">
				<div class="widget widget-tabbed">
					<!-- Nav tab -->
					<ul class="nav nav-tabs nav-justified">
					  <li class="active"><a href="#my-timeline" data-toggle="tab"><i class="fa fa-pencil"></i> Timeline</a></li>
					  <li><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
					  <li><a href="#user-activities" data-toggle="tab"><i class="fa fa-laptop"></i> Activities</a></li>
					  <li><a href="#mymessage" data-toggle="tab"><i class="fa fa-envelope"></i> Message</a></li>
					</ul>
					<!-- End nav tab -->

					<!-- Tab panes -->
					<div class="tab-content">


						<!-- Tab timeline -->
						<div class="tab-pane animated active fadeInRight" id="my-timeline">
							<div class="user-profile-content">

								<!-- Begin timeline -->
								<div class="the-timeline">
									<form role="form" class="post-to-timeline">
										<textarea class="form-control" style="height: 70px;margin-bottom:10px;" placeholder="Whats on your mind..."></textarea>
										<div class="row">
										<div class="col-sm-6">
											<a class="btn btn-sm btn-default"><i class="fa fa-camera"></i></a>
											<a class="btn btn-sm btn-default"><i class="fa fa-video-camera"></i></a>
											<a class="btn btn-sm btn-default"><i class="fa fa-map-marker"></i></a>
										</div>
										<div class="col-sm-6 text-right"><button type="submit" class="btn btn-primary">Post</button></div>
										</div>
									</form>
									<br><br>

								</div><!-- End div .the-timeline -->
								<!-- End timeline -->
							</div><!-- End div .user-profile-content -->
						</div><!-- End div .tab-pane -->
						<!-- End Tab timeline -->

						<!-- Tab about -->
						<div class="tab-pane animated fadeInRight" id="about">
							<div class="user-profile-content">
								<h5><strong>ABOUT</strong> ME</h5>
								<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
								</p>
								<hr>
								<div class="row">
									<div class="col-sm-6">
										<h5><strong>CONTACT</strong> ME</h5>
											<address>
												<strong>Phone</strong><br>
												<abbr title="Phone">+62 857 123 4567</abbr>
											</address>
											<address>
												<strong>Email</strong><br>
												<a href="mailto:#">first.last@example.com</a>
											</address>
											<address>
												<strong>Website</strong><br>
												<a href="http://r209.com">http://r209.com</a>
											</address>
									</div>
									<div class="col-sm-6">
										<h5><strong>MY</strong> SKILLS</h5>
										<p>UI Design</p>
										<p>Clean and Modern Web Design</p>
										<p>PHP and MySQL Programming</p>
										<p>Vector Design</p>
									</div>
								</div><!-- End div .row -->
							</div><!-- End div .user-profile-content -->
						</div><!-- End div .tab-pane -->
						<!-- End Tab about -->


						<!-- Tab user activities -->
						<div class="tab-pane animated fadeInRight" id="user-activities">
							<div class="scroll-user-widget">
							</div><!-- End div .scroll-user-widget -->
						</div><!-- End div .tab-pane -->
						<!-- End Tab user activities -->

						<!-- Tab user messages -->
							</div><!-- End div .scroll-user-widget -->
						</div><!-- End div .tab-pane -->
						<!-- End Tab user messages -->
					</div><!-- End div .tab-content -->
				</div><!-- End div .box-info -->
			</div>
		</div>
	</div>
</div>
</div>
</section>
@endsection
