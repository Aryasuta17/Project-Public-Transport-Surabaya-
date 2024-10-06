<!-- resources/views/bus/result.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hasil Pencarian Rute</h1>

    @if($routes->isEmpty())
        <p>Tidak ada rute yang ditemukan untuk titik awal dan akhir tersebut.</p>
    @else
        <ul>
            @foreach($routes as $route)
            <li>
                {{ $route->route_name }} - Dari {{ $route->starting_point }} ke {{ $route->ending_point }}
            </li>
            @endforeach
        </ul>
    @endif

    <!-- Tombol kembali ke pencarian -->
    <a href="{{ route('bus.searchPage') }}">Kembali ke pencarian</a>
</div>
@endsection
