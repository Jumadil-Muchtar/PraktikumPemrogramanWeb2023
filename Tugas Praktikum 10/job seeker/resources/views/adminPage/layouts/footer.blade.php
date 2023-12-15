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
      <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
        Create new report
      </button>
    </div>
  </div>
</form>
</div>
</div>

{{-- Logic agar ketika pesan diterima, modal tetap tampil --}}
<script>
    @if ($errors->any())
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('modal-report'));
            modal.show();
        });
    @endif
  </script>
