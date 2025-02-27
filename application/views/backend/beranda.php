<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/template/head') ?>
</head>

<body>
    <?php $this->load->view('backend/template/header') ?>
    <?php $this->load->view('backend/template/sidebar') ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Beranda</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("rj/beranda") ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="?filter=hari">Hari Ini</a></li>
                                        <li><a class="dropdown-item" href="?filter=bulan">Bulan Ini</a></li>
                                        <li><a class="dropdown-item" href="?filter=tahun">Tahun Ini</a></li>
                                        <li><a class="dropdown-item" href="?filter=semua">Semua</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Berita <span>| <?= $filter_label; ?></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $total_berita; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="?filter=hari">Hari Ini</a></li>
                                        <li><a class="dropdown-item" href="?filter=bulan">Bulan Ini</a></li>
                                        <li><a class="dropdown-item" href="?filter=tahun">Tahun Ini</a></li>
                                        <li><a class="dropdown-item" href="?filter=semua">Semua</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Pengunjung <span>| <?= $filter_label; ?></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-mouse2"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $total_pengunjung; ?></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Akun</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $total_user; ?></h6>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item isal" href="#" data-year="2023">2023</a></li>
                                        <li><a class="dropdown-item isal" href="#" data-year="2024">2024</a></li>
                                        <li><a class="dropdown-item isal" href="#" data-year="2025">2025</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title isal">Pengguna <span>| 2024</span></h5>
                                    <div id="reportsChart" style="height: 350px;"></div>
                                    <script>
                                    let chart;

                                    function fetchData(year) {
                                        fetch("<?= base_url('rj/beranda/cobadiagram') ?>", {
                                                method: "POST",
                                                headers: {
                                                    "Content-Type": "application/json",
                                                },
                                                body: JSON.stringify({
                                                    year: year
                                                }),
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                console.log("Data diterima:",
                                                    data);
                                                if (data.length === 0) {
                                                    updateChart([], [], "Tidak ada data untuk tahun " +
                                                        year);
                                                } else {
                                                    updateChart(data);
                                                }
                                            });
                                    }


                                    function updateChart(data, emptyMessage = '') {
                                        const categories = [...new Set(data.map(visit => visit.month))];
                                        const indonesiaData = categories.map(month => {
                                            const visit = data.find(v => v.month === month && v.country ===
                                                'Indonesia');
                                            return visit ? visit.total : 0;
                                        });
                                        const luarNegeriData = categories.map(month => {
                                            const visit = data.find(v => v.month === month && v.country ===
                                                'Luar Negeri');
                                            return visit ? visit.total : 0;
                                        });

                                        const options = {
                                            series: [{
                                                    name: 'Indonesia',
                                                    data: indonesiaData,
                                                },
                                                {
                                                    name: 'Luar Negeri',
                                                    data: luarNegeriData,
                                                },
                                            ],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false,
                                                },
                                            },
                                            markers: {
                                                size: 4,
                                            },
                                            colors: ['#e80505', '#4154f1'],
                                            fill: {
                                                type: 'gradient',
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100],
                                                },
                                            },
                                            dataLabels: {
                                                enabled: false,
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2,
                                            },
                                            xaxis: {
                                                categories: categories.length > 0 ? categories : [
                                                    emptyMessage
                                                ],
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'MM/yyyy',
                                                },
                                            },
                                        };


                                        if (chart) {
                                            chart.updateOptions(options);
                                        } else {
                                            chart = new ApexCharts(document.querySelector("#reportsChart"), options);
                                            chart.render();
                                        }
                                    }
                                    fetchData(new Date().getFullYear());
                                    document.querySelectorAll(".dropdown-item.isal").forEach(item => {
                                        item.addEventListener("click", e => {
                                            e.preventDefault();
                                            const year = item.getAttribute("data-year");
                                            console.log("Tahun yang dipilih:",
                                                year);
                                            fetchData(year);

                                            document.querySelector('.card-title.isal span')
                                                .textContent =
                                                `| ${year}`;
                                        });
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('backend/template/footer') ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <?php $this->load->view('backend/template/js') ?>


</body>

</html>