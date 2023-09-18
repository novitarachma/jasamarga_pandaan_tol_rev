@extends('layouts.user')

@section('content')
<!-- ======= Galeri Section ======= -->
<section id="galeri" class="galeri">
    <div class="container">
    <div class="section-title">
        <h2>Galeri</h2>
        <p></p>
        </div>
    <ul class="controls">
        <li class="buttons active" data-filter="all">All</li>
        <li class="buttons" data-filter="2019">Tahun 2019</li>
        <li class="buttons" data-filter="2020">Tahun 2020</li>
        <li class="buttons" data-filter="2021">Tahun 2021</li>
        <li class="buttons" data-filter="2022">Tahun 2022</li>
        <li class="buttons" data-filter="2023">Tahun 2023</li>
    </ul>
        <div class="gallery-content">
          <!-- ---gallery card 01--- -->
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2019">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>Gerbang Tol Pandaan</h3>
            </a>
          </div>

          <!-- ---gallery card 02--- -->
          <div class="g-card">
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/05/donor-darah.jpg" class="image 2019">
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/05/donor-darah.jpg" alt="Net Error" />
            <h3>Kegiatan Donor Darah</h3>
          </a>
          </div>

          <!-- ---gallery card 03--- -->
          <div class="g-card">             
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/05/sertijab-Pak-Sari.jpg" class="image 2019">
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/05/sertijab-Pak-Sari.jpg" alt="Net Error" />
            <h3>Sertijab Pak Sari</h3>
          </a>
          </div>
            
          <!-- ---gallery card 04--- -->
          <div class="g-card">
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/09/071919_Closing-Ceremony-Sukuk-Ijarah-270x170.png" class="image 2020">  
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/09/071919_Closing-Ceremony-Sukuk-Ijarah-270x170.png" alt="Net Error" />
            <h3>Closing Ceremony</h3>
          </a>
          </div>

          <!-- ---gallery card 05--- -->
          <div class="g-card">
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/09/080619_Konferensi-Pers-270x170.png" class="image 2020">
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/09/080619_Konferensi-Pers-270x170.png" alt="Net Error" />
            <h3>Konferensi Pers</h3>
          </a>
          </div>

          <!-- ---gallery card 06--- -->
          <div class="g-card">
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/07/outbond3-270x170.png" class="image 2020">
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/07/outbond3-270x170.png" alt="Net Error" />
            <h3>Kegiatan Outbound</h3>
          </a>
          </div>

          <!-- ---gallery card 07--- -->
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2021">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>Gerbang Tol Pandaan</h3>
            </a>
          </div>

          <!-- ---gallery card 08--- -->
          <div class="g-card">
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/05/donor-darah.jpg" class="image 2022">
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/05/donor-darah.jpg" alt="Net Error" />
            <h3>Kegiatan Donor Darah</h3>
          </a>
          </div>

          <!-- ---gallery card 09--- -->
          <div class="g-card">             
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/05/sertijab-Pak-Sari.jpg" class="image 2022a">
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/05/sertijab-Pak-Sari.jpg" alt="Net Error" />
            <h3>Sertijab Pak Sari</h3>
          </a>
          </div>

          <!-- ---gallery card 10--- -->
          <div class="g-card">
          <a href="https://ptjpt.co.id/wp-content/uploads/2019/05/donor-darah.jpg" class="image 2023">
            <img src="https://ptjpt.co.id/wp-content/uploads/2019/05/donor-darah.jpg" alt="Net Error" />
            <h3>Kegiatan Donor Darah</h3>
          </a>
          </div>
        </div>

        <!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- magnific popup js cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script>

$(document).ready(function(){

    $('.buttons').click(function(){

        $(this).addClass('active').siblings().removeClass('active');

        var filter = $(this).attr('data-filter')

        if(filter == 'all'){
            $('.image').show(400);
        }else{
            $('.image').not('.'+filter).hide(200);
            $('.image').filter('.'+filter).show(400);
        }

    });

    $('.gallery-content').magnificPopup({

        delegate:'a',
        type:'image',
        gallery:{
            enabled:true
        }

    });

});

</script>
      </section>
    <!-- End Galeri Section -->
@endsection