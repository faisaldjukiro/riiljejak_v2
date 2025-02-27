<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view('frontend/template/head') ?>
    <style>
    .footer-divider {
        border-top: 4px solid #037cd4;
    }

    .text-isal {
        color: #037cd4;
    }

    .team-logo {
        width: 30px;
        height: 30px;
    }

    #ligaLogo {
        width: 60px;
        height: 60px;
        object-fit: contain;
    }


    .back-dark {
        background-color: #212121;

        color: white;

    }

    .back-dark .table {
        background-color: #333;

        color: white;

    }

    .back-dark .table th {
        background-color: #444;

    }

    .back-dark .table th,
    .back-dark .table td {
        border-color: #555;

    }

    .back-dark .popular-list li a {
        text-decoration: none;
        color: #ffffff;

    }

    .back-dark .table td,
    .back-dark .table th {
        font-size: 16px;
    }
    </style>
</head>

<body>
    <?php $this->load->view('frontend/template/canvas') ?>
    <header id="back-header" class="back-header">
        <?php $this->load->view('frontend/template/toolbar') ?>
        <div class="menu-part header-style2">
            <div class="container">
                <div class="back-main-menu">
                    <nav>
                        <div class="menu-toggle">
                            <div class="logo"><a href="<?= base_url('') ?>" class="logo-text"> <img
                                        class="back-logo-dark"
                                        src="<?= base_url('template/frontend/assets/') ?>assets/images/logo.png"
                                        alt="logo"> <img class="back-logo-light"
                                        src="<?= base_url('template/frontend/assets/') ?>assets/images/light-logo.png"
                                        alt="logo"> </a></div>

                            <div class="searchbar-part back-search-mobile">
                                <ul>
                                    <li class="back-dark-light"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-sun back-go-light1">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <line x1="12" y1="1" x2="12" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="23"></line>
                                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                            <line x1="1" y1="12" x2="3" y2="12"></line>
                                            <line x1="21" y1="12" x2="23" y2="12"></line>
                                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-moon back-go-dark1">
                                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                        </svg>
                                    </li>
                                    <li class="back_search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </li>
                                    <li id="nav-expanders" class="nav-expander bar">
                                        <span class="back-hum1"></span>
                                        <span class="back-hum2"></span>
                                        <span class="back-hum3"></span>
                                    </li>
                                </ul>
                                <form class="search-form">
                                    <input type="text" class="form-input" placeholder="Cari Di Sini">
                                    <button type="submit" class="form-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <button type="button" id="menu-btn">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <?php $this->load->view('frontend/template/menu') ?>
                    </nav>
                </div>

            </div>
        </div>
    </header>

    <div class="back-wrapper">

        <div class="back-category-style-grid pb-70 ">
            <div class="container">
                <img src="" alt="Logo Liga" id="ligaLogo" class="mb-3 mt-3">
                <div class="footer-divider pt-2"></div>
                <i class="fa-solid fa-ruler-vertical text-isal me-2"></i>
                <span class="text-isal"><strong>Football</strong></span>
                <br><br>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="mb-3">
                        <select id="leagueSelect" class="form-control w-100 mt-3">
                            <option value="CL">Champions League</option>
                            <option value="PD">La Liga (Spain)</option>
                            <option value="PL">Premier League (England)</option>
                            <option value="SA">Serie A (Italy)</option>
                            <option value="BL1">Bundesliga (Germany)</option>
                            <option value="FL1">Ligue 1 (France)</option>
                            <option value="DED">Eredivisie (Netherlands)</option>
                            <option value="PPL">Primeira Liga (Portugal)</option>
                            <option value="BSA">Brasileirão Série A (Brazil)</option>
                        </select>
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <button id="matchButton" class="btn btn-info w-100 w-sm-auto">Klasmen</button>
                        <button id="jadwalButton" class="btn btn-info w-100 w-sm-auto">Jadwal</button>
                        <button id="finishedButton" class="btn btn-info w-100 w-sm-auto">Selesai</button>
                    </div>

                </div>

                <table id="standingsTable" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Team</th>
                            <th>Tanding</th>
                            <th>Menang</th>
                            <th>Seri</th>
                            <th>Kalah</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table id="finishedTable" class="table table-responsive" style="display: none;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kandang</th>
                            <th>Score</th>
                            <th>Tandang</th>
                            <th>WITA</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table id="jadwalTable" class="table table-responsive" style="display: none;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kandang</th>
                            <th>Tandang</th>
                            <th>WITA</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer id="back-footer" class="back-footer">
        <?php $this->load->view('frontend/template/footer') ?>
    </footer>

    <div id="backscrollUp">
        <span aria-hidden="true" class="fi-rr-arrow-small-up"></span>
    </div>
    <?php $this->load->view('frontend/template/js') ?>
    <script>
    $(document).ready(function() {
        function loadStandings(tandingcode) {
            $.ajax({
                url: '<?php echo site_url('FootballController/getStandings/'); ?>' + tandingcode,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#ligaLogo').attr('src', data.competition.emblem);
                    var standingsHtml = '';
                    $.each(data.standings[0].table, function(index, team) {
                        standingsHtml += '<tr>';
                        standingsHtml += '<td>' + team.position + '</td>';
                        standingsHtml += '<td><img src="' + team.team.crest +
                            '" class="team-logo" alt="' + team.team.name + ' logo"> ' + team
                            .team.name + '</td>';
                        standingsHtml += '<td>' + team.playedGames + '</td>';
                        standingsHtml += '<td>' + team.won + '</td>';
                        standingsHtml += '<td>' + team.draw + '</td>';
                        standingsHtml += '<td>' + team.lost + '</td>';
                        standingsHtml += '<td>' + team.points + '</td>';
                        standingsHtml += '</tr>';
                    });

                    $('#standingsTable tbody').html(standingsHtml);
                },
                error: function() {
                    alert('Error fetching standings data.');
                }
            });
        }

        function loadFinishedMatches(tandingcode) {
            $.ajax({
                url: '<?php echo site_url('FootballController/getFinishedMatches/'); ?>' + tandingcode,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#ligaLogo').attr('src', data.competition.emblem);
                    var matchesHtml = '';
                    data.matches.sort(function(a, b) {
                        var dateA = new Date(a.utcDate);
                        var dateB = new Date(b.utcDate);
                        return dateB - dateA;
                    });

                    $.each(data.matches, function(index, match) {
                        var matchDate = new Date(match.utcDate);
                        var updatedDate = new Date(matchDate.getTime() + (0 * 60 * 60 *
                            1000));

                        var formattedDate = updatedDate.toLocaleString('id-ID', {
                            weekday: 'short',
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        matchesHtml += '<tr>';
                        matchesHtml += '<td>' + (index + 1) + '</td>';
                        matchesHtml += '<td><img src="' + match.homeTeam.crest +
                            '" class="team-logo" alt="Home Team"> ' + match.homeTeam.name +
                            '</td>';
                        matchesHtml += '<td>' + match.score.fullTime.home + ' - ' + match
                            .score.fullTime.away + '</td>';
                        matchesHtml += '<td><img src="' + match.awayTeam.crest +
                            '" class="team-logo" alt="Away Team"> ' + match.awayTeam.name +
                            '</td>';
                        matchesHtml += '<td>' + formattedDate + '</td>';
                        matchesHtml += '</tr>';
                    });

                    $('#finishedTable tbody').html(matchesHtml);
                },
                error: function() {
                    alert('Error fetching finished matches data.');
                }
            });
        }

        function loadJadwal(tandingcode) {
            $.ajax({
                url: '<?php echo site_url('FootballController/getJadwal/'); ?>' + tandingcode,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#ligaLogo').attr('src', data.competition.emblem);
                    var jadwalHtml = '';
                    data.matches.sort(function(a, b) {
                        var dateA = new Date(a.utcDate);
                        var dateB = new Date(b.utcDate);
                        return dateA - dateB;
                    });

                    $.each(data.matches, function(index, match) {
                        var matchDate = new Date(match.utcDate);
                        var updatedDate = new Date(matchDate.getTime() + (0 * 60 * 60 *
                            1000));
                        var formattedDate = updatedDate.toLocaleString('id-ID', {
                            weekday: 'short',
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });

                        jadwalHtml += '<tr>';
                        jadwalHtml += '<td>' + (index + 1) + '</td>';
                        jadwalHtml += '<td><img src="' + match.homeTeam.crest +
                            '" class="team-logo" alt="Home Team"> ' + match.homeTeam.name +
                            '</td>';
                        jadwalHtml += '<td><img src="' + match.awayTeam.crest +
                            '" class="team-logo" alt="Away Team"> ' + match.awayTeam.name +
                            '</td>';

                        if (match.status === 'TIMED') {
                            jadwalHtml += '<td>' + formattedDate + '</td>';
                        } else {
                            jadwalHtml += '<td>' + match.status + '</td>';
                        }

                        jadwalHtml += '</tr>';
                    });

                    $('#jadwalTable tbody').html(jadwalHtml);
                },
                error: function() {
                    alert('Error fetching jadwal matches data.');
                }
            });
        }

        // Fungsi untuk memuat data sesuai dengan liga yang dipilih
        function reloadData() {
            var tandingcode = $('#leagueSelect').val();
            // Menyembunyikan semua tabel
            $('#finishedTable').hide();
            $('#standingsTable').hide();
            $('#jadwalTable').hide();

            // Menampilkan tabel yang sesuai dengan pilihan
            if ($('#finishedButton').hasClass('active')) {
                loadFinishedMatches(tandingcode);
                $('#finishedTable').show();
            } else if ($('#matchButton').hasClass('active')) {
                loadStandings(tandingcode);
                $('#standingsTable').show();
            } else if ($('#jadwalButton').hasClass('active')) {
                loadJadwal(tandingcode);
                $('#jadwalTable').show();
            }
        }

        // Ketika tombol liga dipilih, reload data sesuai dengan liga
        $('#leagueSelect').change(function() {
            reloadData();
        });

        // Tombol "Selesai"
        $('#finishedButton').click(function() {
            $('#standingsTable').hide();
            $('#jadwalTable').hide();
            $('#finishedTable').show();

            var tandingcode = $('#leagueSelect').val();
            loadFinishedMatches(tandingcode);
        });

        // Tombol "Klasmen"
        $('#matchButton').click(function() {
            $('#finishedTable').hide();
            $('#jadwalTable').hide();
            $('#standingsTable').show();

            var tandingcode = $('#leagueSelect').val();
            loadStandings(tandingcode);
        });

        // Tombol "Jadwal"
        $('#jadwalButton').click(function() {
            $('#finishedTable').hide();
            $('#standingsTable').hide();
            $('#jadwalTable').show();

            var tandingcode = $('#leagueSelect').val();
            loadJadwal(tandingcode);
        });

        // Menampilkan tabel Klasmen secara default
        $('#standingsTable').show();
        loadStandings($('#leagueSelect').val());
    });
    </script>
</body>

</html>