@extends('master')

@section('body')
<!-- Main Content -->
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>MIS</h1>
         <div class="section-header-breadcrumb">
         <div class="breadcrumb-item active"><a href="{{ Route('dashboard') }}">Beranda</a></div>
         <div class="breadcrumb-item">Formulir Tambah Data</div>
         </div>
      </div>

      <div class="section-body">

         <p class="section-lead"></p>
         <div class="card">
            <div class="card-header">
               <h4>Formulir LOB</h4>
            </div>
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label>LOB</label>
                        <select class="form-control" name="lob" id="lob" required>
                           <option value="">-</option>
                           <option value="KUR">KUR</option>
                           <option value="PEN">PEN</option>
                           <option value="Konsumtif">Konsumtif</option>
                           <option value="Produktif">Produktif</option>
                           <option value="Suretyship">Suretyship</option>
                        </select>
                        <div class="valid-feedback">
                           Mohon isi bagian ini!
                        </div>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Penyebab Klaim</label>
                        <select class="form-control" name="claim_reason" id="claim_reason" required>
                           <option value="">-</option>
                           {{-- <option value="Macet">Macet</option>
                           <option value="Kebakaran">Kebakaran</option>
                           <option value="Meninggal">Meninggal</option>
                           <option value="PHK">PHK</option> --}}
                        </select>
                        <div class="valid-feedback">
                           Mohon isi bagian ini!
                        </div>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label>Jumlah Nasabah</label>
                        <input type="text" name="amount_of_customer" class="form-control" required>
                        <div class="valid-feedback">
                           Mohon isi bagian ini!
                        </div>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Beban Klaim</label>
                        <div class="input-group">
                           <input type="text" name="load_value" class="form-control" oninput="separator(this)" required>
                           <div class="input-group-append">
                              <input type="number" name="decimal" class="form-control" min="0" max="99" oninput="validateDecimal(this)">
                           </div>
                        </div>
                        <div class="valid-feedback">
                           Mohon isi bagian ini!
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer bg-whitesmoke text-right">
                  <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                  &nbsp; &nbsp;
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </section>
</div>
@endsection

@push('script')
   <script>
      $("#lob").on('change', function () {
         $("#claim_reason").empty('');

         if (this.value == "Suretyship") {   
            $("#claim_reason").append(
               '<option value="">-</option>'+
               '<option value="Macet">Macet</option>'
            );
         } else if (this.value == "KUR") {
            $("#claim_reason").append(
               '<option value="">-</option>'+
               '<option value="Macet">Macet</option>'
            );
         } else if (this.value == "PEN") {
            $("#claim_reason").append(
               '<option value="">-</option>'+
               '<option value="Macet">Macet</option>'+
               '<option value="Meninggal">Meninggal</option>'
            );
         } else if (this.value == "Konsumtif") {
            $("#claim_reason").append(
               '<option value="">-</option>'+
               '<option value="Macet">Macet</option>'+
               '<option value="Kebakaran">Kebakaran</option>'+
               '<option value="Meninggal">Meninggal</option>'+
               '<option value="PHK">PHK</option>'
            );
         } else if (this.value == "Produktif") {
            $("#claim_reason").append(
               '<option value="">-</option>'+
               '<option value="Macet">Macet</option>'+
               '<option value="Meninggal">Meninggal</option>'
            );
         }
      })

      function separator(input) {
         let nums = input.value.replace(/,/g, '');
         if (!nums || nums.endsWith('.')) return;
         input.value = parseFloat(nums).toLocaleString();
      }

      function validateDecimal(input) {
         if (input.value.length > 2) {
            input.value = input.value.slice(0, 2);
         }
      }
   </script>
@endpush