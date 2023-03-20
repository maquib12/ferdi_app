 <ul class="navbar-nav mr-auto">
              <li class="nav-item  {{ ( Request::is('/') || Request::is('/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{url('/')}}">{{ __('messages.home') }} <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ ( Request::is('about_us') || Request::is('about_us/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{route('about_us')}}">{{ __('messages.about') }}</a>
              </li>
              <li class="nav-item {{ ( Request::is('our-courses') || Request::is('our-courses/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{route('our-courses')}}">{{ __('messages.courses') }}</a>
              </li>
              <li class="nav-item {{ ( Request::is('blog') || Request::is('blog/*') ? 'active' : '' ) }}">
                <a class="nav-link" href="{{url('blog')}}">{{ __('messages.blogs') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#contact-us">{{ __('messages.contact us') }}</a>
              </li>
<!--               <li class="nav-item dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="E">
                  <img src="{{asset('student/assets/img/icons/globe.svg')}}" class="mr-2"> English
                </a>
                <div class="dropdown-menu changeLang" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('change?lang=en')}}" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</a>
                  <a class="dropdown-item" href="{{url('change?lang=ar')}}" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</a>
                  <a class="dropdown-item" href="#">Danish</a>
                  <a class="dropdown-item" href="#">English</a>
                  <a class="dropdown-item" href="#">Finnish</a>
                  <a class="dropdown-item" href="{{url('change?lang=fr')}}" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>French</a>
                  <a class="dropdown-item" href="#">Georgian</a>
                </div>
              </li> -->
              <div id="google_translate_element"></div>
            </ul>
            
<style type="text/css">
  div#google_translate_element .goog-te-gadget .goog-te-gadget-simple{
    border: 1px solid #000;
    padding: 3px;
    font-size:16px;
background:transparent;}
div#google_translate_element .goog-te-gadget .goog-te-gadget-simple span{
    color:#fff;
}
div#google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value *:nth-child(3){
    display:none;
}
div#google_translate_element .goog-te-gadget .goog-te-gadget-simple .goog-te-menu-value *{
    color:#fff !important;
}
</style>
            <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({layout: google.translate.TranslateElement.InlineLayout.SIMPLE, includedLanguages : 'en,ig,yo,ha'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>