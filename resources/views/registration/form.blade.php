@extends('layout')

@section('content')

<section class="h-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                  alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Formulir Pendaftaran Santri</h3>
  
                  <form method="POST" action="{{ route('registration.submit') }}" enctype="multipart/form-data">
                    @csrf
  
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="full_name" name="full_name" class="form-control form-control-lg" required />
                      </div>
                      <div class="col-md-6 mb-4">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" id="nisn" name="nisn" class="form-control form-control-lg" required />
                      </div>
                    </div>
  
                    <div class="mb-4">
                      <label for="birth_date" class="form-label">Tanggal Lahir</label>
                      <input type="date" id="birth_date" name="birth_date" class="form-control form-control-lg" required />
                    </div>
  
                    <div class="mb-4">
                      <label for="school_origin" class="form-label">Asal Sekolah</label>
                      <input type="text" id="school_origin" name="school_origin" class="form-control form-control-lg" required />
                    </div>
  
                    <div class="mb-4">
                      <label for="phone" class="form-label">No HP</label>
                      <input type="tel" id="phone" name="phone" class="form-control form-control-lg" required />
                    </div>
  
                    <div class="mb-4">
                      <label class="form-label d-block">Jenis Kelamin</label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="male"> Laki-laki
                        <label class="form-check-label" for="genderMale">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="P">
                        <input class="form-check-input" type="radio" name="gender" value="female"> Perempuan
                      </div>
                    </div>
  
                    <div class="mb-4">
                      <label for="document" class="form-label">Upload Dokumen (PDF/JPG/PNG)</label>
                      <input type="file" id="document" name="document" accept=".pdf,.jpg,.jpeg,.png" class="form-control form-control-lg" required />
                    </div>
  
                    <div class="d-flex justify-content-end pt-3">
                      <button type="reset" class="btn btn-light btn-lg">Reset</button>
                      <button type="submit" class="btn btn-warning btn-lg ms-2">Kirim</button>
                    </div>
  
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection
