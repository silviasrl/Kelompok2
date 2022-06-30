<x-app-layout title="Dashboard">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <!--begin::Col-->
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::List Widget 5-->
                    <div class="card card-xl-stretch">
                        <!--begin::Header-->
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder mb-2 text-dark">Persyaratan</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5 mb-3">
                            <!--begin::Timeline-->
                            <!--begin::Accordion-->
                            <div class="accordion accordion-custom accordion-solid" id="accordionExample">
                                <!--begin::Item-->
                                @foreach (App\Models\Condition::get() as $item)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="syarat_{{ $item->id }}">
                                            <button class="accordion-button fs-4 fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1"
                                                aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                                {{ $item->title }}
                                            </button>
                                        </h2>
                                        <div id="syarat_{{ $item->id }}" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body">
                                                {!! $item->body !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--end::Item-->
                            </div>
                            <!--end::Accordion-->
                            <!--end::Timeline-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end: List Widget 5-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
            </div>
        </div>
    </div>
</x-app-layout>
