@extends('mainpage')
@section('content')

<h1>Edit Profil</h1>
<form action="/murid_simpan_profil" method="POST">
    @csrf
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="{{$username}}"></td>
            <td>
                @error('username')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="{{$nama}}"></td>
            <td>
                @error('nama')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="{{$email}}"></td>
            <td>
                @error('email')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="{{$password}}"></td>
            <td>
                @error('password')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="confPassword"></td>
            <td>
                @error('confPassword')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </td>
        </tr>
    </table>
    <button type="submit">Simpan</button>
</form>

@endsection
