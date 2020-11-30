<!DOCTYPE html>
@extends('mainpage')
@section('content')
    <h2>Welcome,{{$username}}</h2>
    {{-- Menampilkan notifikasi chat bila ada
        <h2>Notifikasi Chat</h2>
    --}}
    @include('murid.components.isiHome')
@endsection

