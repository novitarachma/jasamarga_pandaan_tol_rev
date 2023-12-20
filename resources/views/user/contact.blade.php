@extends('layouts.user')

@section('content')
<section id="contact" class="contact">
    <br><br>
    <div class="container">
        <div class="section-title">
            <h2> </h2>
            <h2>Contact</h2>
            <p>Silahkan menghubungi kami</p>
        </div>

        <div class="row contact-info">

            <div class="col-md-4">
                <div class="contact-address">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p><a href="https://goo.gl/maps/Mcd6MVgkfW3uG6Mz8" target="_blank">Kali Tengah, Karang Jati, Kec.
                            Pandaan,
                            Pasuruan, Jawa Timur 67156</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-phone">
                    <i class="bi bi-phone"></i>
                    <h3>Phone Number</h3>
                    <p><a href="tel:+155895548855">(0343) 5650729</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-email">
                    <i class="bi bi-envelope"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@example.com">jasamarga.pandaantol@gmail.com</a></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact-IG">
                    <i class="bi bi-instagram"></i>
                    <h3>Instagram</h3>
                    <p><a href="https://www.instagram.com/official.jpt/">Jasamarga Pandaan Tol</a></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact-FB">
                    <i class="bi bi-facebook"></i>
                    <h3>Facebook</h3>
                    <p><a href="https://www.instagram.com/official.jpt/">Jasamarga Pandaan Tol</a></p>
                </div>
            </div>
            <br></br>
        <div class="container">
            <div class="section-title">
                <h2> </h2>
                <h2>Massage Us</h2>
            </div>
              <form class="mb-5" method="post" id="contactForm" name="contactForm">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="2" placeholder="Write your message"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                  <input type="checkbox" name="send" id="send" />
                  <label for="send" class="send">
                    <div class="rotate">
                        <div class="move">
                            <div class="part left"></div>
                            <div class="part right"></div>
                        </div>
                    </div>
                </label>
        </div>
    </div>
</section>
@endsection