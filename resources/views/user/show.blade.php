
@extends('layouts.component')

@section('title', 'Home')

@section('content')
    <h2>Selamat Anda berhasil mendaftar kan {{ $data['waifu'] }} sebagai istri sah Anda</h2>
    <div class="container">
        <div class="mb-3">
            <label for="name" class="">Nama</label>
            <span>:</span>
            <span>{{ $data['name'] }}</span>
          </div>
          <div class="mb-3">
            <label for="waifu" class="">Waifu</label>
            <span>:</span>

            <span>{{ $data['waifu'] }}</span>
          </div>
          <div class="mb-3">
              <label for="email" class="">Email</label>
              <span>:</span>

              <span>{{ $data['email'] }}</span>
          </div>
          <div class="mb-3">
              <label for="alamat" class="">Alamat</label>
              <span>:</span>

              <span>{{ $data['alamat'] }}</span>
          </div>

    </div>
@endsection