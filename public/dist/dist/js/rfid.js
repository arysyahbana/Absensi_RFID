// Membuat objek WebSocket
var socket = new WebSocket("ws:192.168.100.64:80/ws"); // Ganti dengan alamat server WebSocket Anda

// Ketika koneksi berhasil dibuka
socket.addEventListener("open", (event) => {
  console.log("Koneksi WebSocket terbuka.");
});

// Ketika pesan diterima dari server
socket.addEventListener("message", (event) => {
  var uid = event.data; // Data UID yang diterima dari server
  console.log("UID diterima: " + uid);

  // Tampilkan UID di halaman web (misalnya, dalam elemen dengan ID "uidDisplay")
  document.getElementById("uid").value = uid;
});

// Ketika koneksi ditutup
socket.addEventListener("close", (event) => {
  console.log("Koneksi WebSocket ditutup.");
});

// Ketika terjadi kesalahan
socket.addEventListener("error", (event) => {
  console.error("Terjadi kesalahan dalam koneksi WebSocket: " + event.message);
});
