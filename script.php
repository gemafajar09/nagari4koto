<script>
setInterval(kunjungan, 5);
function kunjungan() {
  var tanggal = document.getElementById('tanggal').value;
   $.ajax({
      type: 'POST',
      url: 'visitor/tampil_visitor.php',
      data: 'tanggal='+ tanggal,
      success: function(data){
       $('#kunjungan').html(data)
      },
      error : function(){
        alert('Kesalahan Dalam Menambil data')
      }
   }) 
}

$(document).ready(function(){
loading();
chart();

function loading() {
var time = setTimeout(show, 1000);
}
function show() {
document.getElementById("loader").style.display = "none";

}
})

$(function () {
    $("#example1").DataTable();
  });

// chart

</script>