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
                    <h1 class="display-3 font-weight-bold text-shadow">Discover Directory</h1>
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
@endsection

