<section class="portfolio-area section-padding-top" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{$porfolioTitle->title}}</h3>
                    <div class="desc">
                        {!! $porfolioTitle->sub_title !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter-menu">
                    <li class="active" data-filter="*">All Projects</li>
                    @foreach ($portfolioCategories as $portfolioCategory)
                        <li data-filter=".{{$portfolioCategory->slug}}">{{ $portfolioCategory->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="portfolio-wrapper">
            <div class="row portfolios">

                @foreach ($portfolioItems as $portfolioItem)
                    <div data-wow-delay="0.3s" class="col-md-6 col-lg-4 filter-item {{$portfolioItem->category->slug}}">
                        <div class="single-portfolio">
                            <figure class="portfolio-image">
                                <img src="{{asset($portfolioItem->image)}}" alt="">
                            </figure>
                            <div class="portfolio-content">
                                <a href="{{asset($portfolioItem->image)}}" data-lity class="icon"><i
                                        class="fas fa-plus"></i></a>
                                <h4 class="title"><a href="{{ route('show.portfolio', $portfolioItem->id) }}">{{$portfolioItem->title}}</a></h4>
                                <div class="desc">
                                    <p>{!! Str::limit(strip_tags($portfolioItem->description), 100) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>