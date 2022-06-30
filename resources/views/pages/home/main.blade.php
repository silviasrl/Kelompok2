<x-web-layout>
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <!--end::Heading-->
            <!--begin::Row-->
            <!--end::Row-->
            <!--begin::Product slider-->
            <div class="tns tns-default">
                <!--begin::Slider-->
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                    data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                    data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                    data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{ asset('images/news/' . $slider->thumbnail) ?? '' }}"
                            class="card-rounded shadow mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Slider-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
            </div>
            <!--end::Product slider-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--begin::Projects Section-->
    <!--begin::Pricing Section-->
    <div class="mt-sm-n20">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bolder text-white mb-5" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">Berita Terkait</h1>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Pricing-->
                    <div class="row g-lg-10 mb-10 mb-lg-20">
                        <!--begin::Col-->
                        @foreach ($berita as $item)
                            <div class="col-lg-4">
                                <!--begin::Testimonial-->
                                <div
                                    class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                                    <a href="{{ $item->source }}" target="_blank" class="text-white">
                                        <!--begin::Wrapper-->
                                        <div class="mb-7">
                                            <!--begin::Title-->
                                            <div class="fs-2 fw-bolder text-white mb-3">
                                                {{ $item->title }}
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Feedback-->
                                            <div class="text-gray-500 fw-bold fs-4">
                                                {{ $item->body }}
                                            </div>
                                            <!--end::Feedback-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Author-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-circle symbol-50px me-5">
                                                <img src="{{ asset('images/news/' . $item->thumbnail) }}"
                                                    alt="">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <!--end::Name-->
                                        </div>
                                        <!--end::Author-->
                                    </a>
                                </div>
                                <!--end::Testimonial-->
                            </div>
                        @endforeach
                        <!--end::Col-->
                    </div>
                    <!--end::Pricing-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Pricing Section-->
    <!--begin::Testimonials Section-->
    <!--end::Testimonials Section-->
</x-web-layout>
