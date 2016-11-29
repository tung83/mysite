<div class="customer row ">
    <div class="col-md-8 col-md-offset-4">
        @foreach($customers as $customer) 
            <div class="col-md-4 wow bounceIn" data-wow-duration="4s">
                <a href="{{ url($customer->lnk)}}">
                   {{ HTML::image('file/upload/'. $customer->img, languageTransform($customer, 'title'), array('class' => 'img-responsive center-block')) }}
                   {{languageTransform($customer, 'title')}}  
                </a>
            </div>
        @endforeach        
    </div>
</div>