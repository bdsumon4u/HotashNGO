<x-site-layout>
    @include('pages.partials.about')

    <div class="benefit-area two pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="benefit-img">
                        <img src="{{ asset('findo/img/benefit-main1.jpg') }}" alt="Benefit">
                        <img src="{{ asset('findo/img/benefit-shape1.png') }}" alt="Benefit">
                        <div class="video-wrap">
                            <button class="js-modal-btn" data-video-id="uemObN8_dcw">
                                <i class="icofont-ui-play"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <span class="sub-title">@lang('Core features')</span>
                        <h2>@lang('Mission to make a smile')</h2>
                        <p>@lang('We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.')</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-6">
                            <div class="benefit-item">
                                <i class="flaticon-house"></i>
                                <h3>@lang('Build home')</h3>
                                <p>@lang('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi')</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6">
                            <div class="benefit-item two">
                                <i class="flaticon-hospital"></i>
                                <h3>@lang('Medical facilities')</h3>
                                <p>@lang('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi')</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6">
                            <div class="benefit-item three">
                                <i class="flaticon-fast-food"></i>
                                <h3>@lang('Food &amp; water')</h3>
                                <p>@lang('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi')</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6">
                            <div class="benefit-item four">
                                <i class="flaticon-graduation-cap"></i>
                                <h3>@lang('Education facilities')</h3>
                                <p>@lang('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.partials.volunteer')
</x-site-layout>
