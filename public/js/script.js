// tgl sekarang
if ($('.tglSekarang').length > 0) {
  document.querySelector(".tglSekarang").valueAsDate = new Date();
}
// end of tgl sekarang

$(".tahunSekarang").val(new Date().getFullYear());

// toggle button
$("#btnCariBarang").click(function () {
  $("#rowCariBarang").toggle("slow");
});

$("#btnFilterBarang").click(function () {
  $("#rowFilterBarang").toggle("slow");
});

$("#btnTambahUnit").click(function () {
  $("#rowTambahUnit").toggle("slow");
});

$("#btnTambahPemasok").click(function () {
  $("#rowTambahPemasok").toggle("slow");
});

$("#btnTambahPengguna").click(function () {
  $("#rowTambahPengguna").toggle("slow");
});
// end of toggle button

// focus on nama barang in tambah
$('#namabarang').focus();