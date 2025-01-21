@extends('layouts.app')

@section('content')
    <section class="site-banner jarallax padding-large"
        style="
        background: url(images/hero.png) no-repeat;
        background-position: top;
      ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Kontak Kami</h1>
                    <div class="breadcrumbs">
                        <span class="item">
                            <a href="index.html">Beranda /</a>
                        </span>
                        <span class="item">Kontak</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-information padding-large">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-header">
                        <h2 class="section-title">Hubungi Kami</h2>
                    </div>
                    <div class="contact-detail">
                        <div class="detail-list">
                            <p>
                                Hubungi kami jika Anda tertarik dengan layanan kami atau jika
                                Anda memiliki pertanyaan tentang layanan kami. Kami akan
                                dengan senang hati membantu Anda. Kami juga menerima kritik
                                dan saran untuk meningkatkan layanan kami.
                            </p>
                            <ul class="list-unstyled list-icon">
                                <li>
                                    <a
                                        href="https://api.whatsapp.com/send?phone=6281226090061&amp;text=Saya%20membutuhkan%20info%20lebih%20lanjut%20tentang%20barang%20yang%20ada%20di%20damarmas.co.id%20.%20Tolong%20dibantu%20ya!"><i
                                            class="icon icon-phone"></i>+62 812 2609 0061</a>
                                </li>
                                <li>
                                    <a href="mailto:damarmas.nusantara@gmail.com"><i
                                            class="icon icon-mail"></i>damarmas.nusantara@gmail.com</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-map-pin"></i>Pasegan Asri B1 No.5,
                                        Area Sawah, Kloposepuluh, Kec. Sukodono, Kabupaten
                                        Sidoarjo, Jawa Timur, Indonesia</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <h3>Sosial Media</h3>
                            <ul class="d-flex list-unstyled">
                                <li><a href="#" class="icon icon-facebook"></a></li>
                                <li><a href="#" class="icon icon-twitter"></a></li>
                                <li><a href="#" class="icon icon-instagram"></a></li>
                                <li><a href="#" class="icon icon-youtube-play"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-information">
                        <div class="section-header">
                            <h2 class="section-title">Kirim pesan kepada kami</h2>
                        </div>
                        <form name="contactform" action="contact.php" method="post" class="contact-form">
                            <div class="form-item">
                                <input type="text" minlength="2" name="name" placeholder="Name"
                                    class="u-full-width bg-light" required />
                                <input type="email" name="email" placeholder="E-mail" class="u-full-width bg-light"
                                    required />
                                <textarea class="u-full-width bg-light" name="message" placeholder="Message" style="height: 180px" required></textarea>
                            </div>
                            <label>
                                <input type="checkbox" required />
                                <span class="label-body">I agree all the <a href="#">terms and conditions</a>
                                </span>
                            </label>
                            <button type="submit" name="submit" class="btn btn-dark btn-full btn-medium">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="google-map">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.635499515252!2d112.6883058106267!3d-7.394676492584363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e38db3a7c04f%3A0xf80edbcfb45861f0!2sPT.DAMARMAS%20NUSANTARA%20SEJAHTERA!5e0!3m2!1sen!2sid!4v1736782855233!5m2!1sen!2sid"
                    width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <a href="https://getasearch.com/fmovies"></a>
                <br />
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 500px;
                        width: 100%;
                    }
                </style>
                <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 500px;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
    </section>
@endsection
