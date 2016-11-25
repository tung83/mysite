 <div class="row footer-details clearfix">
                    <div id="footer-company-info" class="col-sm-3">                
                        <div id="company-info">
                            <img alt="company name" src="{{asset('img/footer-small-company-name.png')}}">                           
                        </div>
                        <div id="address-details" style="color: #bababa">
                            {!! languageTransform($qtextFooterContact, 'content')!!}
                        </div>       
                    </div>
                    <div id="google-map" class="col-sm-3">      
                        
                     </div>     

                    <div id="footer-introduction" class="col-sm-3">
                        <a href="{{ url(trans('front/site.introduction')) }}">
                            <img alt="introduction" src="{{asset('img/footer-introduction.png')}}">   
                            <p>{!! languageTransform($qtextIntroduction, 'content')!!}</p>
                            <p class="readmore">{{ trans('front/site.readmore')}}</p>    
                        </a>
                    </div>                              
     <?php  $facebookLink = $basicConfigs->first(function ($value, $key) {
            return $value['key'] == 'facebook';
            });
            $tweeterLink = $basicConfigs->first(function ($value, $key) {
            return $value['key'] == 'tweeter';
            });
            $googleplusLink = $basicConfigs->first(function ($value, $key) {
            return $value['key'] == 'googleplus';
            });?>
                    <div id="footer-services-links" class="col-sm-3">
                        <ul id="footer-social-items">
                            <li>
                                <a class="footer-facebook" href="{{url(languageTransform($facebookLink, 'content'))}}"  target="_blank"></a>
                            </li>
                            <li>
                                <a class="footer-tweeter" href="{{url(languageTransform($tweeterLink, 'content'))}}" target="_blank"></a>
                            </li>
                            <li>
                                <a class="footer-skype" target="_blank"></a>
                            </li>
                            <li>
                                <a class="footer-goole-plus" href="{{url(languageTransform($googleplusLink, 'content'))}}" target="_blank"></a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                        <ul id="footer-services">
                            @foreach($serviceCategories as $service_category)   
                                 <li>
                                     <a href="{{ url(getCategorySlugLink($serviceMenu, $service_category)) }}">
                                         {{languageTransform($service_category, 'title')}} 
                                     </a>                             
                                 </li>
                             @endforeach	                           
                        </ul>
                    </div>
                </div>
                <div class="row copyright text-center">
                        Copyright © 2016 <a>PS Media</a>. All rights reserved
                </div>
@push('scripts')
<script>

    /*==================== google maps =========================*/
    function initMap() {
      createGoogleMap('google-map');
    }         

    function createGoogleMap(id){
        var lequangdinh = {lat: 10.818794, lng: 106.689732};
        var lequangdinhCenter = {lat: 10.8195, lng:  106.689732};
        var map = new google.maps.Map(document.getElementById(id), {
            zoom: 17,
            mapTypeControl: false,
            fullscreenControl: true,
            streetViewControl: false,
            center: lequangdinhCenter
        });
        var marker = new google.maps.Marker({
        position: lequangdinh,
        map: map,
        title: '624 Lê Quang Định'
        });
        var lequangdinhContentString = 
          '<p style="color: #ed1c24">PS MEDIA CO. LTD</p>' +
          '<a  target="_blank" href="https://www.google.com/maps/dir//624+L%C3%AA+Quang+%C4%90%E1%BB%8Bnh,+ph%C6%B0%E1%BB%9Dng+1,+G%C3%B2+V%E1%BA%A5p,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.8189622,106.6887449,17z/data=!4m9!4m8!1m0!1m5!1m1!1s0x317528ef6ad85a59:0x42754d325a8b55a6!2m2!1d106.6897102!2d10.8188471!3e0">Get direction</a>';

        var infowindow = new google.maps.InfoWindow({
            content: lequangdinhContentString
        });
        infowindow.open(map, marker);
    }
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVWAnZRS56JnP5Nr5otnuzg47TsmJoKBM&callback=initMap&language={!!session('locale')!!}&region={!!session('locale')!!}">
    </script>
@endpush
 