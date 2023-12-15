@include('adminPage.layouts.header')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Data Lowongan Pekerjaan
            </h2>
          </div>
          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" style="background-color: pink;" data-bs-toggle="modal" data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Tambah Pekerjaan
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
          {{-- Notifikasi add karyawan berhasil --}}
          <?php
          $sukses = Session::get('success');
          if ($sukses) {
              echo '<div class="alert alert-success">' . $sukses . '</div>';
          }
          ?>
           <?php
           $sukses = Session::get('edit');
           if ($sukses) {
               echo '<div class="alert alert-info">' . $sukses . '</div>';
           }
           ?>
            <?php
            $sukses = Session::get('delete');
            if ($sukses) {
                echo '<div class="alert alert-danger">' . $sukses . '</div>';
            }
            ?>
            <?php
            $salah = Session::get('salah');
            if ($salah) {
                echo '<div class="alert alert-danger">' . $salah . '</div>';
            }
            ?>
          <div class="col-12">
            <div class="card">
              <div class="table-responsive">
                <table
    class="table table-vcenter table-mobile-md card-table">
                  <thead>
                    <tr>
                      <th>Nama Perusahaan</th>
                      <th>Posisi & Lokasi</th>
                      <th>Alamat Email</th>
                      <th class="w-1"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataJob as $job )
                    <tr>
                      <td data-label="Name" >
                        <div class="d-flex py-1 align-items-center">
                            <div class="company-img">
                                @if ($job->logo_company)
                                    <a href="#"><img src="{{ asset('landingPage/assets/img/icon/' . $job->logo_company) }}" style="max-width: 100px; max-height: 100px;" alt=""></a>
                                @else
                                    <a href="#"><img src="{{ asset('landingPage/assets/img/icon/default-logo.png') }}" alt="Default Logo"></a>
                                @endif
                            </div>
                          <div class="flex-fill ms-5">
                            <div class="font-weight-medium">{{$job->job}}</div>
                            <div class="text-muted"><a href="#" class="text-reset">{{$job->company}}</a></div>
                          </div>
                        </div>
                      </td>
                      <td data-label="Title" >
                        <div>{{$job->kategori}}</div>
                        <div class="text-muted">{{$job->lokasi}}</div>
                      </td>
                      <td class="text-muted" data-label="Role" >
                        {{$job->email_company}}
                      </td>
                      <td>
                        <div class="btn-list flex-nowrap">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit{{$job->id}}" class="btn" >
                            Edit
                          </a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-danger{{$job->id}}" class="btn" style="background-color: pink;">
                            Delete
                          </a>
                        </div>
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

{{-- {{-- Modal Tambah Data Job --}}
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Data Pekerjaan Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/addJob" method="POST" enctype="multipart/form-data">
            @csrf
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
        <div class="mb-3">
            <label class="form-label">Logo Perusahan</label>
            <input name="field_logo" type="file" class="form-control" name="example-text-input" placeholder="Logo Perusahaan">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Perusahaan</label>
            <input name="field_company" type="text" class="form-control" name="example-text-input" placeholder="Masukkan Nama Perusahaan">
        </div>
        <div class="mb-3">
            <label class="form-label">Posisi Pekerjaan</label>
            <input name="field_job" type="text" class="form-control" name="example-text-input" placeholder="Masukkan Posisi Pekerjaan">
        </div>
        <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Email Perusahaan</label>
                <div class="input-group input-group-flat">
                <input name="field_email" type="text" class="form-control ps-0" placeholder="Masukkan Email Perusahaan"  autocomplete="off">
                </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Kontak Perusahaan</label>
                    <input name="field_kontak" type="number" class="form-control" name="example-text-input" placeholder="+62">
            </div>
            </div>
        </div>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Gaji</label>
                <input name="field_gaji" type="text" placeholder="9 - 10 Juta Rupiah" class="form-control">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Lokasi Penempatan</label>
                <input name="field_lokasi" placeholder="Makassar, Sulsel" type="text" class="form-control">
            </div>
            </div>
            <div class="col-lg-12 mb-3">
            <div>
                <label class="form-label">Requitment Hard Skil</label>
                <textarea name="field_hard" placeholder="Masukkan Hard Skill" class="form-control" rows="3"></textarea>
            </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div>
                <label class="form-label">Requitment Soft Skil</label>
                <textarea name="field_soft" placeholder="Masukkan Soft Skill" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div>
                <label class="form-label">Tersedia</label>
                <textarea name="field_tersedia" placeholder="Masukkan berapa tersedia" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div>
                <label class="form-label">Deskripsi Pekerjaan</label>
                <textarea name="field_descJob" placeholder="Masukkan Deskripsi Pekerjaan" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div>
                <label class="form-label">Deskripsi Perusahaan</label>
                <textarea name="field_descCompany" placeholder="Masukkan Deskripsi Perusahaan" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Pekerjaan</label>
                <select name="field_kategori" class="form-control" id="">
                    <option value="Pekerja Tetap">Pekerja Tetap</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Remote">Remote</option>
                </select>
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary ms-auto" style="background-color: pink;" data-bs-dismiss="modal">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" ><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Tambah pekerjaan
        </button>
        </div>
    </div>
    </form>
    </div>
</div>

{{-- Modal Edit data --}}
@foreach ($dataJob as $job )
<div class="modal modal-blur fade" id="modal-edit{{$job->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Pekerjaan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/editJob/{{$job->id}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">

        <div class="mb-3">
          <label class="form-label">Posisi Pekerjaan</label>
          <input name="field_jobEdit" placeholder="Masukkan Posisi Pekerjaan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi Pekerjaan</label>
            <input name="field_descJobEdit" placeholder="Masukkan Deskripsi Pekerjaan" class="form-control" required>
          </div>
        <div class="mb-3">
          <label class="form-label">Nama Perusahaan</label>
          <input name="field_companyEdit" placeholder="Masukkan Nama Perusahaan" type="text" class="form-control" placeholder="Nama Lengkap" required>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Email Perusahaan</label>
              <div class="input-group input-group-flat">
                <span class="input-group-text">
                </span>
                <input placeholder="Masukkan Email Perusahaan" name="field_emailEdit" class="form-control ps-0" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Kontak Perusahaan</label>
              <input placeholder="Masukkan Kotak Perusahaan" name="field_kontakEdit" class="form-control" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label class="form-label">Lokasi Kantor</label>
              <input placeholder="Masukkan Lokasi Kantor" name="field_lokasiEdit" type="text" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <div class="mb-3">
                <label class="form-label">Tersedia</label>
                <select placeholder="Pilih lowongan yang tersedia" name="field_tersediaEdit" type="text" class="form-control" required>
                    <option name="field_tersedia" value="1 Orang">1 Orang</option>
                    <option  name="field_tersedia" value="2 Orang">2 Orang</option>
                    <option name="field_tersedia" value="3 Orang">3 Orang</option>
                </select>
              </div>
            </div>
          </div>
      </div>
      
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Cancel
        </a>
        <button type="submit" id="submitBtnEdit" class="btn btn-info ms-auto">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          Edit Data Pekerjaan
        </button>
      </div>
    </form>
    </div>
  </div>
  </div>
  @endforeach


  {{-- Modal Hapus Data Karyawan --}}
  @foreach ($dataJob as $job )
  <div class="modal modal-blur fade" id="modal-danger{{$job->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-danger"></div>
        <form action="/deleteJob/{{$job->id}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-body text-center py-4">
          <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
          <h3>Apakah Anda Yakin?</h3>
          <div class="text-muted">Tindakan ini akan menghapus pekerjaan dari perusahaan <b>{{$job->company}}</b> dengan posisi pekerjaan <b>{{$job->job}}</b>, penghapusan data ini akan bersifat permanen.</div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                  Cancel
                </a></div>
              <div class="col"><button type="submit" href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                  Ya, Saya Yakin
                </button></div>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
  @endforeach


@include('adminPage.layouts.footer')
@include('adminPage.layouts.script')
