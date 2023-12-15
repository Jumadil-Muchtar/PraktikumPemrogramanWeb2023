@include('landingPage.layouts.header')
<div class="slider-area ">
    <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="{{asset('landingPage')}}/assets/img/hero/profile.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero-cap text-center">
                            <h2>Update your profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Start Profile Area -->
    <section class="profile-area">
        <div class="container box_1170">
            <div class="profile-details">
                <div class="container mt-5">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <form action="/updateProfil/{{$user->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                                    <input type="text" value="{{$user->name}}" class="form-control" id="nama_lengkap" name="field_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK:</label>
                                    <input type="text" class="form-control" id="nik" name="field_nik" required>
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender:</label>
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="field_gender" id="male" value="Laki-laki" required>
                                                <label class="form-check-label" for="male">Laki-Laki</label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="field_gender" id="female" value="Perempuan" required>
                                            <label class="form-check-label" for="female">Perempuan</label>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat:</label>
                                    <textarea class="form-control" id="alamat" name="field_alamat" rows="3" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="nomor_hp" class="form-label">Nomor HP:</label>
                                    <input type="tel" class="form-control" id="field_hp" name="field_hp" required>
                                </div>
                        </div>
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="field_tglLahir" name="field_tglLahir" required>
                                </div>

                                <div class="mb-3">
                                    <label for="berkas_cv" class="form-label">Berkas CV:</label>
                                    <input type="file" class="form-control" id="field_cv" name="field_cv" accept=".pdf, .doc, .docx" required>
                                </div>

                                <div class="mb-3">
                                    <label for="ijazah" class="form-label">Ijazah:</label>
                                    <input type="file" class="form-control" id="ijazah" name="field_ijazah" accept=".pdf, .jpg, .jpeg, .png" required>
                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Surat Kesehatan:</label>
                                    <input type="file" class="form-control" id="surat_kesehatan" name="field_sehat" accept=".pdf, .jpg, .jpeg, .png" required>
                                </div>
                                <div class="mb-3">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Profile Area -->


    <!-- Pop-up Modal Info Update Berhasil -->

    <div class="modal fade show" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Update Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Berhasil Update Data. Silahkan pilih lamaran pekerjaan Anda.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="/job">Close</a></button>
                </div>
            </div>
        </div>
    </div>


<!-- Script untuk menangkap pesan berhasil dari Controller -->
@if(session('updateBerhasil'))
    <script>
        $(document).ready(function () {
            $('#successModal').modal('show');
        });
    </script>
@endif



@include('landingPage.layouts.footer')
@include('landingPage.layouts.script')
