@extends('layouts.base')
@section('title')
    Home
@endsection
@section('content')

    <!-- banner part start-->
    <section class="banner_part">
        <div class="overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Missing anything?</h5>
                            <h1>We help you find your lost things</h1>
                            <p>By sharing with you the things you found and the things you lost, we can use artificial intelligence to compare all the things to confirm whether there is any match and thus we can find your things.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!--::exclusive_item_part start::-->
    <section class="exclusive_item_part blog_item_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_tittle text-center">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="{{ asset('assets/img/find.jpg') }}" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>Found</h3>
                            <p>Share with us what you found, we may find its owner.</p>
                            <a href="{{ route('found.index') }}" class="btn_3">Let's share<img src="{{ asset('assets/img/icon/left_2.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="{{ asset('assets/img/lost.jpg') }}" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>Missing</h3>
                            <p>Share with us what you lost, we may find someome who found it.</p>
                            <a href="{{ route('lost.index') }}" class="btn_3">Let's share<img src="{{ asset('assets/img/icon/left_2.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::exclusive_item_part end::-->
@endsection