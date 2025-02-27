<div id="backscrollUp">
    <span aria-hidden="true" class="fi-rr-arrow-small-up"></span>
</div>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/wow.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/back-menus.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/plugins.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/main.js"></script>

<script async type="application/javascript" src="https://news.google.com/swg/js/v1/swg-basic.js"></script>
<script>
(self.SWG_BASIC = self.SWG_BASIC || []).push(basicSubscriptions => {
    basicSubscriptions.init({
        type: "NewsArticle",
        isPartOfType: ["Product"],
        isPartOfProductId: "CAowovauDA:openaccess",
        clientOptions: {
            theme: "light",
            lang: "id"
        },
    });
});
</script>


<!-- 
<script type="text/javascript">
document.addEventListener('contextmenu', event => event.preventDefault());

document.onkeydown = function(e) {
    if (e.key === 'ContextMenu' || e.which === 93) {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && (e.key === 'u' || e.key === 's' || e.key === 'i' || e.key === 'j' || e.key === 'c')) {
        e.preventDefault();
        return false;
    }
    if (e.key === 'F12' || e.which === 123) {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.key === 'I') {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.key === 'J') {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.key === 'C') {
        e.preventDefault();
        return false;
    }
};
</script> -->
<script>
const images = document.querySelectorAll('.image-areas img');

function animateImageOnLoad() {
    images.forEach(image => {
        image.style.transition = 'transform 1s ease-out';
        image.style.transform = 'translateY(0)';
        image.addEventListener('mouseenter', () => {
            image.style.transition = 'transform 0.3s ease';
            image.style.transform = 'scale(1.1)';
        });

        image.addEventListener('mouseleave', () => {
            image.style.transition = 'transform 0.3s ease';
            image.style.transform = 'scale(1)';
        });
    });
}

function animateOnScroll() {
    images.forEach(image => {
        const rect = image.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom >= 0) {
            image.style.transition = 'transform 1s ease-out';
            image.style.transform = 'translateY(0)';
        } else {
            image.style.transition = 'transform 1s ease-out';
            image.style.transform = 'translateY(-100%)';
        }
    });
}

window.onload = function() {
    animateImageOnLoad();
    tampilkanTanggal();
    jam();
}

window.addEventListener('scroll', animateOnScroll);

function jam() {
    var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;

    h = set(d.getHours());
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h + ':' + m + ':' + s;

    setTimeout(jam, 1000);
}

function tampilkanTanggal() {
    var e = document.getElementById('tanggal'),
        d = new Date(),
        day, month, year;

    day = set(d.getDate());

    var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    month = monthNames[d.getMonth()];
    year = d.getFullYear();

    e.innerHTML = day + ' ' + month + ' ' + year;
}

function set(e) {
    e = e < 10 ? '0' + e : e;
    return e;
}
</script>