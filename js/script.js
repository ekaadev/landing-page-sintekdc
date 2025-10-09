//cari
let search = document.querySelector('.header .flex .search-form');

document.querySelector('#search-btn').onclick = () =>{
   search.classList.toggle('active');
   profile.classList.remove('active');
}
//user login-regis
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   search.classList.remove('active');
}
// Tampilan gelap/terang
let toggleBtn = document.getElementById('toggle-btn');
let darkMode = localStorage.getItem('dark-mode');
let body = document.body;
toggleBtn.style.display = 'none';

toggleBtn.onclick = (e) => {
   darkMode = localStorage.getItem('dark-mode');
   if (darkMode === 'disabled') {
      enableDarkMode();
   } else {
      disableDarkMode();
   }
   // Hapus elemen dengan ID "toggle-btn" dari tampilan
  
}

// Sidebar
let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () => {
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () => {
   sideBar.classList.remove('active');
   body.classList.remove('active');
}

// Menghapus kelas "active" dari profile dan search hanya jika dibutuhkan
window.onscroll = () => {
   if (window.innerWidth < 1200) {
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}
