@extends('layouts.user')

@section('content')

<section class="our-webcoderskull padding-lg">
    <br><br>
    <div class="container p-0">

        <div class="row">
            <div class="section-title">
                <h2>Slip Gaji Karyawan</h2>
            </div>

            <form method="post" action="{{ route('cetak.gaji')}}" id="myForm" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <td colspan="3" podition="center">
                            <h3>Form Slip Gaji Karyawan</h3>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Tahun</td>
                        <td>:</td>
                        <td>
                            <select name="tahun_id" required>
                                <option value="">-Pilih-</option>
                                @foreach($tahun as $th)
                                <option value="{{ $th->id }}">{{ $th->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Bulan</td>
                        <td>:</td>
                        <td>
                            <select name="bulan_id" required>
                                <option value="">-Pilih-</option>
                                @foreach($bulan as $bl)
                                <option value="{{ $bl->id }}">{{ $bl->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{ route('profil')}}" class="btn btn-sm btn-primary">CANCEL</a>
                        <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>

@endsection