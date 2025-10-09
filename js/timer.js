function updateTimer() {
  harih = Date.parse("Nov 15, 2025 08:00:00");
  sekarang = new Date();
  diff = harih - sekarang;

  hari = Math.floor(diff / (1000 * 60 * 60 * 24));
  jam = Math.floor(diff / (1000 * 60 * 60));
  menit = Math.floor(diff / (1000 * 60));
  detik = Math.floor(diff / 1000);

  if (hari >= 0) {
    h = hari;
    j = jam - hari * 24;
    m = menit - jam * 60;
    d = detik - menit * 60;
  } else {
    h = 0;
    j = 0;
    m = 0;
    d = 0;
  }

  document.getElementById("timer").innerHTML =
    "<span>" + h.toString().padStart(2, "0") + "</span>";
  document.getElementById("timer2").innerHTML =
    "<span>" + j.toString().padStart(2, "0") + "</span>";
  document.getElementById("timer3").innerHTML =
    "<span>" + m.toString().padStart(2, "0") + "</span>";
  document.getElementById("timer4").innerHTML =
    "<span>" + d.toString().padStart(2, "0") + "</span>";
}

setInterval("updateTimer()", 1000);
