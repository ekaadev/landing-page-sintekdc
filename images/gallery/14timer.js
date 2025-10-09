function updateTimer() {
    harih = Date.parse("jan 27, 2024 08:00:00");
 sekarang = new Date();
 diff = harih - sekarang;

 hari = Math.floor(diff / (1000 * 60 * 60 * 24));
 jam = Math.floor(diff / (1000 * 60 * 60));
 menit = Math.floor(diff / (1000 * 60));
 detik = Math.floor(diff / 1000);

 h = hari;
 j = jam - hari * 24;
 m = menit - jam * 60;
 d = detik - menit * 60;

 document.getElementById("timer")
  .innerHTML =
  '<span>' + h + '</span>' 
  document.getElementById("timer2")
  .innerHTML =
  '<span>' + j + '</span>' 
  document.getElementById("timer3")
  .innerHTML =
  '<span>' + m + '</span>' 
  document.getElementById("timer4")
  .innerHTML =
  '<span>' + d + '</span>' 
}

setInterval('updateTimer()', 1000);