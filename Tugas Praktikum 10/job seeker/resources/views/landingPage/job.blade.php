@include('landingPage.layouts.header')

<!-- Hero Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="{{asset('landingPage')}}/assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero-cap text-center">
                            <h2>Get your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<!-- Job List Area Start -->
<div class="job-listing-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Left content -->
                <!-- Job Category Listing End -->
            </div>
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container">
                        <!-- Count of Job list Start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="count-job mb-35">
                                    <span><b>{{$sumOfjob}}</b> Pekerjaan Tersedia</span>
                                    <!-- Select job items start -->
                                    <div class="select-job-items">
                                        <span>Sort by</span>
                                        <select name="select">
                                            <option value="">None</option>
                                            <option value="">job list</option>
                                            <option value="">job list</option>
                                            <option value="">job list</option>
                                        </select>
                                    </div>
                                    <!--  Select job items End-->
                                </div>
                            </div>
                        </div>
                        <!-- Count of Job list End -->
                        @foreach ($listJob as $job )
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    @if ($job->logo_company)
                                        <a href="#"><img src="{{ asset('landingPage/assets/img/icon/' . $job->logo_company) }}" style="max-width: 85px; max-height: 100px;" alt=""></a>
                                    @else
                                        <a href="#"><img src="{{ asset('landingPage/assets/img/icon/default-logo.png') }}" alt="Default Logo"></a>
                                    @endif
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="#">
                                        <h4>{{$job->job}}</h4>
                                    </a>
                                    <ul>
                                        <li>{{$job->company}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$job->lokasi}}</li>
                                        <li>{{$job->gaji}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link items-link2 f-right">
                                <a href="/detailJob/{{$job->id}}" style="background-color: pink; color:white" >Detail</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
        </div>
    </div>
</div>
<!-- Job List Area End -->
<!--Pagination Start  -->
<div class="pagination-area pb-115 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</main>




@include('landingPage.layouts.footer')
@include('landingPage.layouts.script')
