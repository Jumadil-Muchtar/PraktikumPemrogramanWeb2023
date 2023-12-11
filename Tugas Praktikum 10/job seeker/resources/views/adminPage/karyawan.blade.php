@include('adminPage.layouts.header')

 <!-- Page body -->
 <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-lg-12">
          <div class="card">
            {{-- Notifikasi add karyawan berhasil --}}
            <?php
            $sukses = Session::get('berhasil');
            if ($sukses) {
                echo '<div class="alert alert-success">' . $sukses . '</div>';
            }
            ?>
            <?php
            $gagal = Session::get('gagal');
            if ($gagal) {
                echo '<div class="alert alert-danger">' . $gagal . '</div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Job Title</th>
                            <th>Perusahaan</th>
                            <th>Interview</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applicants as $applicant)
                        <tr>
                            <td>{{ $applicant->user->name ?? 'N/A' }}</td>
                            <td>{{ $applicant->job->job ?? 'N/A' }}</td>
                            <td>{{ $applicant->job->company  ?? 'N/A'}}</td>
                            <td>{{ $applicant->job->kategori  ?? 'N/A'}}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal"  data-bs-target="#modal-danger{{$applicant->id}}" class="btn btn-outline-info" style="background-color: pink;">
                                    Detail
                                  </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>


  {{-- Modal Detail Data Pelamar --}}
  @foreach ($applicants as $applicant )
  <div class="modal modal-blur fade" id="modal-danger{{$applicant->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Detail Data Pelamar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
              @endif
              <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <label class="form-label">{{$applicant->user->name ?? 'N/A'}}</label>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Posisi Pekerjaan</label>
                    <label class="form-label">{{$applicant->job->job ?? 'N/A'}}</label>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nomor Induk Kependudukan</label>
                    <div class="input-group input-group-flat">
                     <label for="form-label">{{$applicant->user->NIK ?? 'N/A'}}</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Email Pelamar</label>
                    <label for="form-label">{{$applicant->user->email ?? 'N/A'}}</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <label for="form-label">{{$applicant->user->gender ?? 'N/A'}}</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nomor Hp Pelamar</label>
                    <label for="form-label">{{$applicant->user->no_hp ?? 'N/A'}}</label>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <div>
                    <label class="form-label">Alamat Pelamar</label>
                    <label for="form-label">{{$applicant->user->alamat ?? 'N/A'}}</label>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div>
                      <label class="form-label">Tanggal Lahir Pelamar</label>
                      <label for="form-label">{{$applicant->user->tgl_lahir ?? 'N/A'}}</label>
                    </div>
                </div>

                <div class="modal-header mt-3">
                    <h5 class="modal-title text-center">Penjadwalan Interview</h5>
                </div>
                <div class="modal-body">
                    <small class="markdown text-muted">
                        Sistem akan secara otomatis mengirimkan pesan Email kepada pelamar jadwal dan lokasi interview apabila pelamar lulus tahap Administrasi. Silahkan tentukan waktu dan tanggal Interview!.
                      </small>
                </div>
                <form action="/sendEmail/{{ $applicant->id ?? 'N/A'}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div>
                        <label class="form-label">Tanggal interview</label>
                        <input type="date" name="field_tgl" placeholder="Masukkan Deskripsi Perusahaan" class="form-control" rows="3">
                        <input type="hidden" value="{{$applicant->user->email ?? 'N/A'}}" name="field_email" class="form-control" rows="3">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div>
                        <label class="form-label">Waktu Interview</label>
                        <input type="time" name="field_waktu" class="form-control" rows="3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-outline-info w-100">Kirim Email</button>
                    </div>
                </div>

              </div>
            </form>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                Cancel
              </a>
              <button type="submit" class="btn btn-primary ms-auto"  style="background-color: pink;"  data-bs-dismiss="modal">
                <a class="text-white" href="{{ route('download-berkas', ['id' => $applicant->id_user]) }}"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Donwload Berkas</a>
              </button>
            </div>
          </div>
    </div>
  </div>
  @endforeach

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
 @include('adminPage.layouts.footer')
 @include('adminPage.layouts.script')
