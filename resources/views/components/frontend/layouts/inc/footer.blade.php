<footer class="footer-area bg-f7fafd">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo black-logo">
                        <a href="index.html"><img
                                src="{{ asset('ui/frontend-ui/assets')}}/img/nub.png" alt="logo"></a>
                    </div>
                    <div class="logo white-logo">
                        <a href="index.html"><img
                                src="{{ asset('ui/frontend-ui/assets')}}/img/nub.png" alt="logo"></a>
                    </div>
                    {{-- <p>Quis ipsum suspendisse ultrices gravida. Risus
                        commodo viverra maecenas accumsan lacus vel
                        facilisis.</p> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>Menu</h3>
                    <ul class="list">
                        {{-- <li><a href="about-1.html">About Us</a></li> --}}
                        <li><a href="{{route('frontend-committee')}}">Committee</a></li>
                        <li><a href="{{ route('event.index')}}">Our Events</a></li>
                        <!-- <li><a href="blog-1.html">Latest News</a></li>
                        <li><a href="contact.html">Contact Us</a></li> -->
                    </ul>
                </div>
            </div>

            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Support</h3>
                    <ul class="list">
                        <li><a href="faq.html">FAQ's</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-conditions.html">Terms & Condition</a></li>
                        <li><a href="contact.html">Support Us</a></li>
                    </ul>
                </div>
            </div> -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Address</h3>

                    <ul class="footer-contact-info">
                        <li><i data-feather="map-pin"></i> <strong>NUB Session:All,</strong>(Northern University Bangladesh), 112/2 Kawla Jame Mosid Road, Ashkona,(Near Haji Camp)Dakshinkhan,Dhaka-1230</li>
                        <li><i data-feather="mail"></i> Email: <a
                                href="mailto:hello@startp.com">info@nub.ac.bd</a></li>
                        <li><i data-feather="phone-call"></i> Phone: <a
                                href="tel:+ (880) ">+ 880 1755514661, +880 1755514650</a></li>
                    </ul>
                    <ul class="social-links">
                        <li><a href="#" class="facebook"
                                target="_blank"><i
                                    data-feather="facebook"></i></a></li>
                        <li><a href="#" class="twitter" target="_blank"><i
                                    data-feather="twitter"></i></a></li>
                        <li><a href="#" class="instagram"
                                target="_blank"><i
                                    data-feather="instagram"></i></a></li>
                        <li><a href="#" class="linkedin"
                                target="_blank"><i
                                    data-feather="linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="copyright-area">
                    <p>Copyright @<script>document.write(new Date().getFullYear())</script>
                        Powered by info@nub.ac.bd | Designed
                            & Developed by <a href="https://pondit.com/" target="_blank">NUB TEAM</a></p>
                </div>
            </div>
        </div>
    </div>

    <img src="{{ asset('ui/frontend-ui/assets')}}/img/map.png" class="map" alt="map">
    <div class="shape1"><img src="{{ asset('ui/frontend-ui/assets')}}/img/shape1.png" alt="shape"></div>
    <div class="shape8 rotateme"><img src="{{ asset('ui/frontend-ui/assets')}}/img/shape2.svg"
            alt="shape"></div>
</footer>
