<div class="career row">
    <div class="container">
        <div id="career-list" class="row text-center">        
            <h2 class="title">{{trans('front/site.careers')}}</h2>
        </div>
        </div>
        <div id="career-category-content">
            <div class="row"> 
                @include('front.career.partials.career-items',compact('currentMenu','careers'))   
            </div>
        </div>
    </div>
</div>