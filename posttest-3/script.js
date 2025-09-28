document.addEventListener("DOMContentLoaded", () => {


  // DOM MANIPULATION untuk menambahkan cerita baru ke halaman
  // EVENT LISTENER untuk menangani user saat login, registrasi, dan submit cerita sejarah yang sudah ditambahkan
  // FETCH API untuk mengambil data dari public API (ex: quotes sejarah dari API public)



  // === Ambil elemen penting ===
  const loginForm = document.querySelector("#user-auth form");
  const registerForm = document.querySelector("#register form");
  const addStoryForm = document.querySelector(".user-add-story form");
  const storyList = document.querySelector(".story-list");

  // ====== LOGIN ======
  loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const username = document.querySelector("#username").value.trim();
    const password = document.querySelector("#password").value.trim();

    if (username && password) {
      alert(`Selamat datang, ${username}!`);
      // contoh manipulasi DOM: ubah judul login
      document.querySelector("#user-auth h2").textContent = `Halo, ${username}`;
    } else {
      alert("Username dan password harus diisi ya! Tidak boleh kosong ^^");
    }
  });

  // ====== REGISTRASI ======
  registerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const newUsername = document.querySelector("#new-username").value.trim();
    const newPassword = document.querySelector("#new-password").value.trim();

    if (newUsername && newPassword) {
      alert(`Registrasi berhasil untuk ${newUsername}. Silakan login ya!`);
      registerForm.reset();
    } else {
      alert(" Tolong isi semua form registrasi!");
    }
  });

  // ====== TAMBAH CERITA ======
  addStoryForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const judul = document.querySelector("#judul-cerita").value.trim();
    const isi = document.querySelector("#isi-cerita").value.trim();
    const gambarInput = document.querySelector("#gambar-cerita");

    if (!judul || !isi) {
      alert("Judul dan isi cerita wajib kamu isi ya!");
      return;
    }

    // Buat elemen artikel baru
    const article = document.createElement("article");
    article.classList.add("story-card", "card");

    // Tambah gambar jika ada
    if (gambarInput.files && gambarInput.files[0]) {
      const img = document.createElement("img");
      img.src = URL.createObjectURL(gambarInput.files[0]);
      img.alt = judul;
      article.appendChild(img);
    }

    // Konten cerita
    const content = document.createElement("div");
    content.classList.add("story-content");

    const h3 = document.createElement("h3");
    h3.textContent = judul;

    const p = document.createElement("p");
    p.textContent = isi;

    content.appendChild(h3);
    content.appendChild(p);

    article.appendChild(content);

    // Masukkan ke daftar cerita
    storyList.prepend(article);

    alert("Cerita kamu berhasil ditambahkan nih!");
    addStoryForm.reset();
  });

  // ====== FETCH API cuman opsional ======
  // Ambil quotes sejarah dari public API
  const tentangSection = document.querySelector("#tentang");
  fetch("https://api.quotable.io/random?tags=history")
    .then((res) => res.json())
    .then((data) => {
      const quoteEl = document.createElement("blockquote");
      quoteEl.textContent = `"${data.content}" — ${data.author}`;
      quoteEl.style.fontStyle = "italic";
      quoteEl.style.marginTop = "1rem";
      tentangSection.appendChild(quoteEl);
    })
    .catch((err) => console.error("Gagal fetch quotes:", err));
});
