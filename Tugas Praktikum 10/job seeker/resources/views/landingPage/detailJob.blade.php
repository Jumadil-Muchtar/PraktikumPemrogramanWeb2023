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
                            <h2>{{$jobDetail->job}} - {{$jobDetail->company}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                @if ($jobDetail->logo_company)
                                        <a href="#"><img src="{{ asset('landingPage/assets/img/icon/' . $jobDetail->logo_company) }}" style="max-width: 90px; max-height: 90px;" alt=""></a>
                                @else
                                        <a href="#"><img src="{{ asset('landingPage/assets/img/icon/default-logo.png') }}" alt="Default Logo"></a>
                                @endif
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{$jobDetail->job}}</h4>
                                </a>
                                <ul>
                                    <li>{{$jobDetail->company}}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$jobDetail->lokasi}}</li>
                                    <li>{{$jobDetail->gaji}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                      <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{$jobDetail->desc_job}}</p>
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Hard Skill Requitment</h4>
                            </div>
                           <ul>
                                @foreach($hardSkills as $skill)
                                <li>{{$skill}}</li>
                                @endforeach
                           </ul>
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Soft Skill Requitment</h4>
                            </div>
                           <ul>
                            @foreach($softSkills as $softSkill)
                            <li>{{$softSkill}}</li>
                            @endforeach
                           </ul>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Apply Job</h4>
                       </div>
                     <div class="apply-btn2">
                        <form action="/applyJob/{{$jobDetail->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="field_idJob" value="{{$jobDetail->id}}">
                            <input type="hidden" name="field_idUser" value="{{$userId}}">
                            <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                        {{-- <a href="" type="submit" class="btn">Apply Now</a> --}}
                        </form>
                     </div>
                   </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Informasi Perusahaan</h4>
                       </div>
                          <span>{{$jobDetail->company}}</span>
                          <p>{{$jobDetail->desc_company}}</p>
                        <ul>
                            <li>Name : <span>{{$jobDetail->company}} </span></li>
                            <li>Email : <span>{{$jobDetail->email_company}}</span></li>
                            <li>Phone : <span>{{$jobDetail->kontak_company}}</span></li>
                        </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->



    <!-- Pop-up Modal Info Update Berhasil -->

    <div class="modal fade show" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Apply Job Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Silahkan tunggu informasi penjadwalan interview dari Admin.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="/">Close</a></button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade show" id="UnsuccessModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Apply Job Failed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Silahkan Lengkapi berkas Anda terlebih dahulu.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="/profil/{id}">Update Profile</a></button>
                </div>
            </div>
        </div>
    </div>


<!-- Script untuk menangkap pesan berhasil dari Controller -->
@if(isset($updateBerhasil) && $updateBerhasil)
    <script>
        $(document).ready(function () {
            $('#successModal').modal('show');
        });
    </script>
@endif

@if(isset($updateGagal) && $updateGagal)
    <script>
        $(document).ready(function () {
            $('#UnsuccessModal').modal('show');
        });
    </script>
@endif





@include('landingPage.layouts.footer')
@include('landingPage.layouts.script')
