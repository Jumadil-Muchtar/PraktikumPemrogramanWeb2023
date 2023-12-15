@include('landingPage.layouts.header')

 <!-- slider Area Start-->
 <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" data-background="{{asset('landingPage')}}/assets/img/hero/h1_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero__caption">
                            <h1></h1>
                        </div>
                    </div>
                </div>
                <!-- Fitur pencarian  -->
                <form action="{{ route('job.search') }}" method="GET" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="job" class="form-control" placeholder="Judul Pekerjaan">
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!-- Our Services Start -->

<!-- Online CV Area End-->
<!-- Featured_job_start -->
<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Recent Job</span>
                    <h2>Daftar Pekerjaan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <!-- Count of Job list End -->
                @foreach ($listJob as $job )
                <!-- single-job-content -->
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            @if ($job->logo_company)
                                <a href="#"><img src="{{ asset('landingPage/assets/img/icon/' . $job->logo_company) }}" style="max-width: 90px; max-height: 100px;" alt=""></a>
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
    </div>
</section>
</main>



@include('landingPage.layouts.footer')
@include('landingPage.layouts.script')

