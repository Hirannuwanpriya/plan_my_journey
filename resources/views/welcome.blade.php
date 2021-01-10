@extends('layouts.app')

@section('content')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">

    <section class="d-flex align-items-center dark-overlay bg-cover" style="background-image: url(https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/photo/photo-1525610553991-2bede1a236e2.jpg);">
        <div class="container py-6 py-lg-7 text-white overlay-content text-center">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <h1 class="display-3 font-weight-bold text-shadow">Route Planner</h1>
                    <p class="text-lg text-shadow">Uncover the best places to eat, drink, and shop nearest to you.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="search-bar rounded p-3 p-lg-4 position-relative mt-n5 z-index-20">
            <form action="{{ route('map.index') }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-center form-group">
                        <input class="form-control border-0 shadow-0" type="search" name="search" placeholder="What are you searching for?" autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-center form-group">
                        <div class="input-label-absolute input-label-absolute-right w-100">
                            <label class="label-absolute" for="location"><i class="fa fa-crosshairs"></i>
                                <div class="sr-only">City</div>
                            </label>
                            <input class="form-control border-0 shadow-0" type="text" name="location" placeholder="Location" id="location">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-center form-group no-divider">
                        <div class="dropdown bootstrap-select dropup"><select class="selectpicker" title="Categories" data-style="btn-form-control" tabindex="null"><option class="bs-title-option" value=""></option>
                                <option value="small">Restaurants</option>
                                <option value="medium">Hotels</option>
                                <option value="large">Cafes</option>
                                <option value="x-large">Garages</option>
                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-form-control bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" title="Categories"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Categories</div></div> </div></button><div class="dropdown-menu" style="max-height: 433.109px; overflow: hidden; min-height: 156px;"><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1" style="max-height: 417.109px; overflow-y: auto; min-height: 140px;"><ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;"><li><a role="option" class="dropdown-item" id="bs-select-1-0" tabindex="0"><span class="text">Restaurants</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-1-1" tabindex="0"><span class="text">Hotels</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-1-2" tabindex="0"><span class="text">Cafes</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-1-3" tabindex="0"><span class="text">Garages</span></a></li></ul></div></div></div>
                    </div>
                    <div class="col-lg-2 form-group mb-0">
                        <button class="btn btn-primary btn-block h-100" type="submit">Search </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="pt-4 pb-6">
        <div class="container">
            <div class="pb-lg-4">
                <p class="subtitle text-secondary">One-of-a-kind Tracking app</p>
                <h2 class="mb-5">Track your Daily routs and spendings</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="px-0 pr-lg-3">
                        <div class="icon-rounded mb-3 bg-secondary-light">
                            <i class="far fa-heart"></i>
                        </div>
                        <h3 class="h6 text-uppercase">Track your Daily routs</h3>
                        <p class="text-muted text-sm">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed in</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="px-0 pr-lg-3">
                        <div class="icon-rounded mb-3 bg-primary-light">
                            <i class="far fa-heart"></i>
                        </div>
                        <h3 class="h6 text-uppercase">Track your Expenses and Manage</h3>
                        <p class="text-muted text-sm">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pit</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="px-0 pr-lg-3">
                        <div class="icon-rounded mb-3 bg-secondary-light">
                            <i class="far fa-heart"></i>
                        </div>
                        <h3 class="h6 text-uppercase">Enjoy your Journeys</h3>
                        <p class="text-muted text-sm">His room, a proper human room although a little too small, lay peacefully between its four familiar </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="px-0 pr-lg-3">
                        <div class="icon-rounded mb-3 bg-primary-light">
                            <i class="far fa-heart"></i>
                        </div>
                        <h3 class="h6 text-uppercase">Save Time and Money</h3>
                        <p class="text-muted text-sm">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid px-0">
            <div class="swiper-container instagram-slider">
                <div class="swiper-wrapper d-inline-flex">
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-1.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-2.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-3.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-4.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-5.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-6.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-7.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-8.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-9.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-10.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-11.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-12.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-13.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-14.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-10.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-11.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-12.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-13.jpg" alt=" "></a></div>
                    <div class="swiper-slide overflow-hidden"><a href="#"><img class="img-fluid hover-scale" src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/instagram/instagram-14.jpg" alt=" "></a></div>
                </div>
            </div>
        </div>
    </section>
@endsection

