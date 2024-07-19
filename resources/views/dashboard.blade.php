@extends('master')

@section('body')
   <!-- Main Content -->
   <div class="main-content" >
      <section class="section">
         <div class="section-header">
            <h1>MIS</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
            <div class="breadcrumb-item">Daftar Data</div>
            </div>
         </div>

         @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible show fade">
               <div class="alert-body">
                     <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                     </button>
                     {{ session()->get('success') }}
               </div>
            </div>
         @endif

         <div class="section-body">
            <p class="section-lead"></p>
            <div class="card">
               <div class="card-header">
                  <h4>Tabel LOB</h4>
                  <div class="card-header-action">
                     <a href="{{ url('/api/send-data-to-repository') }}" class="btn btn-info">Kirim</a>
                     <a href="{{ Route('create') }}" class="btn btn-primary">Tambah</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered table-md">
                        <tr class="text-center">
                           <th>LOB</th>
                           <th>Penyebab Klaim</th>
                           <th>Jumlah Nasabah</th>
                           <th>Beban Klaim</th>
                        </tr>
                        {{-- Suretyship --}}
                        <tr>
                           <td>KBG dan Suretyship</td>
                           <td>Macet</td>
                           <td class="text-right">{{ $lob->where('lob', 'Suretyship')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Suretyship')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr style="background-color: #2596be; color: white;">
                           <td colspan="2">Subtotal KBG dan Suretyship</td>
                           <td class="text-right">{{ $lob->where('lob', 'Suretyship')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Suretyship')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        {{-- Konsumtif --}}
                        <tr>
                           <td>Konsumtif</td>
                           <td>Kebakaran</td>
                           <td class="text-right">{{ $lob->where('lob', 'Konsumtif')->where('claim_reason', 'Kebakaran')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Konsumtif')->where('claim_reason', 'Kebakaran')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                           <td>Konsumtif</td>
                           <td>Macet</td>
                           <td class="text-right">{{ $lob->where('lob', 'Konsumtif')->where('claim_reason', 'Macet')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Konsumtif')->where('claim_reason', 'Macet')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                           <td>Konsumtif</td>
                           <td>Meninggal</td>
                           <td class="text-right">{{ $lob->where('lob', 'Konsumtif')->where('claim_reason', 'Meninggal')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Konsumtif')->where('claim_reason', 'Meninggal')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                           <td>Konsumtif</td>
                           <td>PHK</td>
                           <td class="text-right">{{ $lob->where('lob', 'Konsumtif')->where('claim_reason', 'PHK')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Konsumtif')->where('claim_reason', 'PHK')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr style="background-color: #2596be; color: white;">
                           <td colspan="2">Subtotal Konsumtif</td>
                           <td class="text-right">{{ $lob->where('lob', 'Konsumtif')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Konsumtif')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        {{-- KUR --}}
                        <tr>
                           <td>KUR</td>
                           <td>Macet</td>
                           <td class="text-right">{{ $lob->where('lob', 'KUR')->where('claim_reason', 'Macet')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'KUR')->where('claim_reason', 'Macet')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr style="background-color: #2596be; color: white;">
                           <td colspan="2">Subtotal KUR</td>
                           <td class="text-right">{{ $lob->where('lob', 'KUR')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'KUR')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        {{-- PEN --}}
                        <tr>
                           <td>PEN</td>
                           <td>Macet</td>
                           <td class="text-right">{{ $lob->where('lob', 'PEN')->where('claim_reason', 'Macet')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'PEN')->where('claim_reason', 'Macet')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                           <td>PEN</td>
                           <td>Meninggal</td>
                           <td class="text-right">{{ $lob->where('lob', 'PEN')->where('claim_reason', 'Meninggal')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'PEN')->where('claim_reason', 'Meninggal')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr style="background-color: #2596be; color: white;">
                           <td colspan="2">Subtotal PEN</td>
                           <td class="text-right">{{ $lob->where('lob', 'PEN')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'PEN')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        {{-- Produktif --}}
                        <tr>
                           <td>Produktif</td>
                           <td>Macet</td>
                           <td class="text-right">{{ $lob->where('lob', 'Produktif')->where('claim_reason', 'Macet')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Produktif')->where('claim_reason', 'Macet')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                           <td>Produktif</td>
                           <td>Meninggal</td>
                           <td class="text-right">{{ $lob->where('lob', 'Produktif')->where('claim_reason', 'Meninggal')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Produktif')->where('claim_reason', 'Meninggal')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr style="background-color: #2596be; color: white;">
                           <td colspan="2">Subtotal Produktif</td>
                           <td class="text-right">{{ $lob->where('lob', 'Produktif')->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->where('lob', 'Produktif')->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                        <tr style="background-color: #6c737d; color: white;">
                           <td colspan="2">Total</td>
                           <td class="text-right">{{ $lob->sum('customers') }}</td>
                           <td class="text-right">{{ number_format($lob->sum('total_value'), 2, '.', ',') }}</td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection