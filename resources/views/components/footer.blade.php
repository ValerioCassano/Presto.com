<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="colore-presto">Presto.it</h6>
                <p class="text-justify colore-presto">{{ __('ui.presto')}}</p>
            </div>
            <div class="col-xs-6 col-md-3">
                <h6></h6>
                <ul class="footer-links text-end">
                    <li><a href="{{route('home')}}" class="text-decoration-none colore-presto">{{ __('ui.home')}}</a></li>
                    <li><a href="{{route('products.index')}}" class="text-decoration-none colore-presto">{{ __('ui.allAnnouncements')}}</a></li>
                    <li><a href="{{route('products.create')}}" class="text-decoration-none colore-presto">{{ __('ui.productsCreates')}}</a></li>
                </ul>
            </div>
            
            <div class="col-xs-6 col-md-3">
                <h6></h6>
                <ul class="footer-links text-end">
                    <li><a href="{{route('mail.revisor')}}" class="text-decoration-none colore-presto">{{ __('ui.makeRev')}}</a></li>
                    <li><a href="#" class="text-decoration-none colore-presto">{{ __('ui.policy')}}</a></li>
                    <li><a href="#" class="text-decoration-none colore-presto">{{ __('ui.faq')}}</a></li>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text colore-presto"> &copy; 2023 Hackademy83 by
                    <a href="#" class="colore-presto text-decoration-none">X-Coders</a>.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                <ul class="social-icons">
                    <li><a class="facebook" href="https://it-it.facebook.com/" target="blank" ><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a class="twitter" href="https://twitter.com/" target="blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                    <li><a class="github" href="https://github.com/" target="blank"><i class="fa-brands fa-github"></i></a></li>
                    <li><a class="linkedin" href="https://www.linkedin.com/authwall?trk=qf&original_referer=https://www.linkedin.com/authwall?trk=qf&original_referer=https://www.linkedin.com/home&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fhome%3Foriginal_referer%3Dhttps%253A%252F%252Fwww.linkedin.com%&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2F%3Ftrk%3Dseo-authwall-base_nav-header-logo" target="blank"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

