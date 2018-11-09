@extends('layouts.layapps')
@section('content')
    <article class="module width_full">
        <header>
            <h3>Informasi</h3>
        </header>
        <div class="tab_content">
            <div class="module_content">
                Selamat datang {{Auth::user()->name}}!
                <p>@if(Auth::user()->level == 3 || Auth::user()->level == 2 || Auth::user()->level == 1)
                Di Aplikasi Penggajian PT. SINARSUKSES SEJAHTERA. Anda dapat menggunakan menu utama untuk melakukan perubahan data dan menambahkan data baru. Namun setiap username memiliki menu tersendiri sesuai dengan job desk.
                @else
                Di Aplikasi Penggajian PT. SINARSUKSES SEJAHTERA. Anda dapat melihat data gaji yang sudah dimiliki oleh anda yang sudah di approve ataupun disetujui oleh pihak Management.
                @endif
                </p>
            </div>
        </div>
        <footer>
        </footer>
    </article>
@endsection