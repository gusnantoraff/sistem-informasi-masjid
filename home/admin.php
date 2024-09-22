<?php
$data_nama = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna from tb_pengguna WHERE deleted_at IS NULL");
while ($data = $sql->fetch_assoc()) {
  $jml = $data['pengguna'];
}

$sql_bulan_ini = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna FROM tb_pengguna WHERE created_at >= NOW() - INTERVAL 1 MONTH");
$data_bulan_ini = $sql_bulan_ini->fetch_assoc();
$jml_bulan_ini = $data_bulan_ini['pengguna'];

$sql_bulan_lalu = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna FROM tb_pengguna WHERE deleted_at >= NOW() - INTERVAL 2 MONTH AND deleted_at < NOW() - INTERVAL 1 MONTH");
$data_bulan_lalu = $sql_bulan_lalu->fetch_assoc();
$jml_bulan_lalu = $data_bulan_lalu['pengguna'];

if ($jml_bulan_lalu > 0) {
  $persentase_perubahan = (($jml_bulan_ini - $jml_bulan_lalu) / $jml_bulan_lalu) * 100;
} else {
  $persentase_perubahan = 0;
}

if ($persentase_perubahan > 0) {
  $kelas = 'kenaikan';
  $icon = '<img src="dist/img/kenaikan.png" alt="Ikon Kenaikan" class="icon-perubahan">';
  $text = ' Naik';
} elseif ($persentase_perubahan < 0) {
  $kelas = 'penurunan';
  $icon = '<img src="dist/img/penurunan.png" alt="Ikon Penurunan" class="icon-perubahan">';
  $text = ' Turun';
} else {
  $kelas = 'kenaikan';
  $icon = '<img src="dist/img/kenaikan.png" alt="Ikon Penurunan" class="icon-perubahan">';
  $text = ' Naik';
}

$hasil_perubahan = $icon . abs($persentase_perubahan);

?>


<div class="row">
  <!-- small box 1 -->
  <div class="col-lg-3">
    <div class="small-box">
      <div class="inner">
        <p>Total Jamaah</p>
        <h5>
          <?php echo $jml; ?>
        </h5>
        <div class="statistik-box">
          <span class="span">
            <span class="<?php echo $kelas; ?>"><?php echo $hasil_perubahan; ?>% </span><?php echo $text; ?> dari bulan
            lalu
          </span>
        </div>
      </div>
      <div class="icon-box">
        <i class="icon1 fa-solid fa-user-group"></i>
      </div>
    </div>
  </div>

  <!-- small box 2 -->
  <div class="col-lg-3">
    <div class="small-box">
      <div class="inner">
        <p>Peralatan Masjid</p>
        <h5>
          <?php echo $jml; ?>
        </h5>
        <div class="statistik-box">
          <span class="span">
            <span class="<?php echo $kelas; ?>"><?php echo $hasil_perubahan; ?>% </span><?php echo $text; ?> dari bulan
            lalu
          </span>
        </div>
      </div>
      <div class="icon-box2">
        <i class="icon2 fa-solid fa-box"></i>
      </div>
    </div>
  </div>

  <!-- small box 3 -->
  <div class="col-lg-3">
    <div class="small-box">
      <div class="inner">
        <p>Total Donasi</p>
        <h5>
          <?php echo $jml; ?>
        </h5>
        <div class="statistik-box">
          <span class="span">
            <span class="<?php echo $kelas; ?>"><?php echo $hasil_perubahan; ?>% </span><?php echo $text; ?> dari bulan
            lalu
          </span>
        </div>
      </div>
      <div class="icon-box3">
        <i class="icon3 fa-solid fa-chart-line"></i>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- statistik1 -->
  <div class="col-lg-4">
    <div class="statistik">
      <div class="inner">
        <p>Statistik Pendapatan</p>
        <div class="rentang">
          <select id="month-range" aria-label="Rentang Bulan">
            <option value="1">1 Bulan</option>
            <option value="3">3 Bulan</option>
            <option value="6">6 Bulan</option>
          </select>
        </div>
        <div class="icon-stat">
          <img src="dist/img/statistik-biru.png" />
        </div>
      </div>
    </div>
  </div>

  <!-- statistik2 -->
  <div class="col-lg-4">
    <div class="statistik">
      <div class="inner">
        <p>Statistik Pengeluaran</p>
        <div class="rentang">
          <select id="month-range" aria-label="Rentang Bulan">
            <option value="1">1 Bulan</option>
            <option value="3">3 Bulan</option>
            <option value="6">6 Bulan</option>
          </select>
        </div>
        <div class="icon-stat">
          <img src="dist/img/statistik-merah.png" />
        </div>
      </div>
    </div>
  </div>