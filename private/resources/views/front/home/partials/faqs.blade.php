<div class="faqs row">
    <div id="faqs-right" class="col-md-7">
        @foreach($faqs as $index => $faq) 
            <div class="col-md-4 faq-{{$index%3}} wow bounceIn" data-wow-duration="4s">
                <a href="{{ url(getItemSlugLink($faqMenu, $faq)) }}">
                   {{languageTransform($faq, 'title')}}  
                </a>
            </div>
        @endforeach        
    </div>
</div>