<script>
document.addEventListener("DOMContentLoaded", function() {
    console.log("Sidebar JS Loaded!"); // Cek ini di Inspect Element -> Console

    // Efek Hover pada Sub-menu (Barang Masuk / Keluar)
    const subLinks = document.querySelectorAll('.sub-link');
    
    subLinks.forEach(link => {
        link.style.transition = "all 0.3s ease"; // Pastikan transisi aktif
        
        link.addEventListener('mouseenter', function() {
            this.style.paddingLeft = '35px';
            this.style.color = '#ffffff';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.paddingLeft = '24px';
            this.style.color = '#94a3b8';
        });
    });
});

// Tambahkan di dalam document.addEventListener
const subLinks = document.querySelectorAll('.sub-link');
subLinks.forEach(link => {
    link.addEventListener('mouseenter', () => {
        link.style.backgroundColor = "rgba(255, 255, 255, 0.1)"; // Background tipis saat hover sub-menu
        link.style.borderRadius = "5px";
    });
    link.addEventListener('mouseleave', () => {
        link.style.backgroundColor = "transparent";
    });
});
</script>