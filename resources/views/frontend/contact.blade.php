@extends('frontend.layouts.master')

@section('main-content')

  <!-- info section -->
        <section class="info_section long_section">
            <div class="container">
            <div class="contact_nav">
                <a href="tel:+2349021801802">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                    +234 902 180 1802
                </span>
                </a>
                <a href="mailto:demo@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                    demo@gmail.com
                </span>
                </a>
                <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                    Ibadan, Oyo State
                </span>
                </a>
            </div>
            </div>
        </section>
        <!-- end info_section -->

        <!-- contact section -->
        <section class="contact_section  long_section" id="contact-us">
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                <div class="form_container">
                    <div class="heading_container">
                    <h2>
                        Contact Us
                    </h2>
                    </div>
                    <form action="">
                    <div>
                        <input type="text" placeholder="Your Name" />
                    </div>
                    <div>
                        <input type="text" placeholder="Phone Number" />
                    </div>
                    <div>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="text" class="message-box" placeholder="Message" />
                    </div>
                    <div class="btn_box">
                        <button>SEND</button>
                    </div>
                    </form>
                </div>
                </div>
                <div class="col-md-6">
                <div class="map_container">
                    <div class="map">
                        <br><br><br>
                        <div>
                            <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3956.9121053278377!2d3.883514!3d7.363748999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMjEnNDkuNSJOIDPCsDUzJzAwLjciRQ!5e0!3m2!1sen!2sng!4v1696080345397!5m2!1sen!2sng"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0">
                            </iframe>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end contact section -->

@endsection

