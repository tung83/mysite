<div class="faq row">
    <div class="container">
        <div id="faq-list" class="row text-center">        
            <h2 class="title title-main">{{languageTransform($currentMenu, 'title')}}</h2>
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
        <div class='row faq-content'>
            <div class='col-md-8'>
                <div class='pull-right'>
                    <img id='faqs-question' alt="faqs_question" src="{{asset('img/faq_question.png')}}" class="img-responsive center-block"/>    
                </div>
                <div id='faq-category-content'>
                    @include('front.faq.partials.faq-items',compact('currentMenu','faqs'))                  
                </div>
            </div>
            <div class='col-md-4'>             
                @include('front.faq.partials.best-faq-items',compact('currentMenu','best_faqs'))                  
            </div>
            
        </div>
        <div id="faq-category-content">
            <div class="row">  
            </div>
        </div>
    </div>
</div>