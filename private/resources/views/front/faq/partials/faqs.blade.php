<div class="faq row">
    <div class="container">
        <div id="faq-list" class="row text-center">        
            <h2 class="title">{{trans('front/site.faqs')}}</h2>
        </div>
        <div id="faq-category" class="row text-center ">
            <ul class="list-inline list-inline-sm">
                @foreach($faqCategories as $index => $faqCategory) 
                <li>
                    <a href="{{ url(getCategorySlugLink($currentMenu, $faqCategory)) }}"
                       class="{{ $faqCategory->id ==  $currentFaqCategory->id ? 'active' : ''  }}">
                       {{languageTransform($faqCategory, 'title')}}  
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>
        <div id="faq-category-content">
            <div class="row"> 
                @include('front.faq.partials.faq-items',compact('currentMenu','faqs'))   
            </div>
        </div>
    </div>
</div>