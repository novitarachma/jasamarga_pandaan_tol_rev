@extends('layouts.user')

@section('content')

<section class="our-webcoderskull padding-lg">
<br><br>
<div class="container p-0">

<div class="row">
    <div class="section-title">
        <h2>Slip Gaji Karyawan</h2>
    </div>

  <form method="post" action="soding_proses.php">
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
          <select name="tahun" required>
                    <option value="">-Pilih-</option>
                    <?php
                    for($tahun=2024;$tahun>=2015;$tahun--) {
                        ?>
                        <option value="<?php echo $tahun ?>"><?php echo $tahun ?></option>
                        <?php
                    };?>
                </select>
        </td>
      </tr>
      <tr>
        <td width="200">Bulan</td>
        <td>:</td>
        <td>
          <select name="bulan" required>
                    <option value="">-Pilih-</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
        </td>
      </tr>
        <td></td>
        <td></td>
        <td>
        <a href="profile" class="btn btn-sm btn-primary">CANCEL</a>
        <a href="profile" class="btn btn-sm btn-primary">CETAK</a>
        </td>
      </tr>
    </table>
  </form>
</div>
</div>
</section>

@endsection