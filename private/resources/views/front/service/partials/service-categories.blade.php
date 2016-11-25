
<div class="service row">
    <div class="slick text-center">
        @foreach($serviceCategories as $service_category) 
            <a href="{{ url(getCategorySlugLink($serviceMenu, $service_category)) }}"               
                class="{{ $service_category->id ==  $currentServiceCategory->id ? 'active' : ''  }}">
                <i class="service-ico {{$service_category->icon}}">
                </i>
                <h5>
                    {{languageTransform($service_category, 'title')}}                
                </h5>
                <div class="service-sum">
                    <p>
                        {{languageTransform($service_category, 'sum')}}                   
                    </p>        
                </div>
            </a>
        @endforeach	
    </div>
</div>
@push('scripts')
{!! HTML::script('js/slick.js') !!}

<script>    
    
    $(function() {
        // slick
        $('.slick').slick({
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
        });
        var divh=$('.service-sum').height();
          $('.service-sum p').each( function( index, element ){
              while ($(this).outerHeight()>divh) {
                  $(this).text(function (index, text) {
                  return text.replace(/\W*\s(\S)*$/, '...');
              });
          }
          });
          $( ".slick-slide" ).hover(
              function() {
                $( this ).find( "h5, p" ).css( "color", "#ffca9d" );
              },function() {
                $( this ).find( "h5, p" ).css( "color", "" );
              }
          );  
    });
</script>
@endpush