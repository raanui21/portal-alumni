@extends('layouts.master')

@section('title', 'Alumni')

@section('content')
<div class="container mt-5">
    <div class="card-profile" style="border-radius:30px; overflow:hidden;">
        <div class="card-body-profile" style="padding-top: 0;">
            <form>
                <h4 class="custom-heading-profile full-width-profile">Profile</h4>
                <!-- Profile Picture -->
                <div class="d-flex align-items-center mb-4" style="padding: 20px;">
                    <img src="{{ $user->image_path ?? asset('image/profile.jpg') }}" class="rounded-circle" style="width: 70px; height: 70px; margin-right: 20px;" alt="Profile Picture">
                    <div>
                        <h5 class="mb-0"><b>{{ $user->nama ?? 'Nama Lengkap' }}</b></h5>
                        <p class="mb-0">{{ $user->email ?? 'example@untirta.ac.id' }}</p>
                    </div>
                </div>
                <!-- End Profile Picture -->
                
                <!-- Form Profile -->
                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->nama ?? '' }}" disabled />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ $user->nim ?? '' }}" disabled />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" name="fakultas" value="{{ $user->fakultas ?? '' }}" disabled />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $user->jurusan ?? '' }}" disabled />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $user->jenis_kelamin ?? '' }}" disabled />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="{{$user->survey->tahun_lulus ?? 'belum mengisi' }}" disabled />
                    </div>
                </div>
                
                <div class="mb-4">
                    <h4 style="font-size: 17px"><b>My Email Address</b></h4>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <i class="fa fa-envelope" style="margin-right: 10px;"></i>
                    <p class="mb-0">{{ $user->email ?? 'example@untirta.ac.id' }}</p>
                </div>
                <!-- End Form Profile -->
            </form>
        </div>
    </div>
</div>
@endsection
