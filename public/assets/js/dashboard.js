(function ($) {
    'use strict';
    $(function () {

        // ── Mengambil data riil dari PHP via window.DASHBOARD_DATA ──
        var DB = window.DASHBOARD_DATA || { perBulan: [], status: {} };

        // Variabel warna bawaan template (Tidak merubah warna asli)
        var primary      = '#2C2166';
        var primaryAlpha = 'rgba(44,33,102,0.18)';
        var green        = '#27ae60';
        var earth        = '#d35400';
        var sky          = '#2980b9';
        var red          = '#e74c3c';
        var amber        = '#f39c12';

        var currentMonth = new Date().getMonth(); // Mendapatkan bulan berjalan (0 = Jan, 1 = Feb, dst)

        // ── Bar Chart: Peminjaman per Bulan (real data) ──
        if ($("#revenue-chart").length) {
            var ctx = $("#revenue-chart").get(0).getContext("2d");
            var months = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];
            var barData = Array.isArray(DB.perBulan) && DB.perBulan.length === 12 ? DB.perBulan : Array(12).fill(0);
            
            // Kalkulasi batas atas grafik yang dinamis agar chart.js v2 tidak crash
            var highestVal = Math.max.apply(null, barData);
            var maxVal = highestVal > 0 ? Math.ceil(highestVal * 1.2) : 10;
            var stepCalc = Math.ceil(maxVal / 5) || 1;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Peminjaman',
                        data: barData,
                        backgroundColor: months.map(function (_, i) {
                            // Highlight khusus bulan sekarang dengan warna penuh, bulan lain semi-transparan
                            return i === currentMonth ? primary : primaryAlpha;
                        }),
                        borderRadius: 6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { display: false },
                    tooltips: {
                        enabled: true,
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function (tooltipItem) { 
                                return ' ' + tooltipItem.yLabel + ' peminjaman'; 
                            }
                        }
                    },
                    scales: {
                        yAxes: [{
                            gridLines: { color: 'rgba(0,0,0,.04)', drawBorder: false },
                            ticks: { 
                                fontColor: '#aaa', 
                                beginAtZero: true, 
                                stepSize: stepCalc, 
                                max: maxVal 
                            }
                        }],
                        xAxes: [{
                            gridLines: { display: false, drawBorder: false },
                            ticks: { fontColor: '#aaa' },
                            barPercentage: 0.6
                        }]
                    }
                }
            });
        }

        // ── Doughnut Chart: Status Peminjaman (real data) ──
        if ($("#chart-sales").length) {
            var salesCanvas  = $("#chart-sales").get(0).getContext("2d");
            var statusData   = DB.status || {};
            var counts       = [
                statusData.pending  || 0,
                statusData.distujui || 0,
                statusData.ditolak  || 0,
                statusData.selesai  || 0
            ];
            var total = counts.reduce(function (a, b) { return a + b; }, 0);

            // Sembunyikan animasi loading skeleton, tampilkan chart
            $('#chart-sales-skeleton').hide();
            $('#chart-sales-wrap').css('display', 'flex');

            new Chart(salesCanvas, {
                type: 'doughnut',
                data: {
                    labels: ['Pending', 'Disetujui', 'Ditolak', 'Selesai'],
                    datasets: [{
                        data: counts,
                        backgroundColor: [amber, green, red, primary],
                        borderWidth: 0,
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 72,
                    legend: { display: false },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var val = data.datasets[0].data[tooltipItem.index];
                                var pct = total > 0 ? Math.round(val / total * 100) : 0;
                                return ' ' + data.labels[tooltipItem.index] + ': ' + val + ' (' + pct + '%)';
                            }
                        }
                    }
                }
            });

            // Kosongkan dan buat ulang legenda agar tidak menumpuk saat reload halaman
            var legendEl = document.getElementById('sales-legend');
            if (legendEl) {
                legendEl.innerHTML = '';
                var colors = [amber, green, red, primary];
                var labels = ['Pending', 'Disetujui', 'Ditolak', 'Selesai'];
                labels.forEach(function (lbl, i) {
                    var item = document.createElement('div');
                    item.style.cssText = 'display:flex;align-items:center;gap:6px;font-size:11px;font-weight:600;cursor:default;padding:4px 8px;border-radius:4px;background:rgba(0,0,0,0.02);';
                    item.title = lbl + ': ' + counts[i] + ' item';
                    item.innerHTML =
                        '<span style="width:8px;height:8px;border-radius:50%;background:' + colors[i] + ';flex-shrink:0;"></span>' +
                        lbl + ' <span style="color:#666;font-weight:400;margin-left:2px;">(' + counts[i] + ')</span>';
                    legendEl.appendChild(item);
                });
            }
        }

        // ── Tooltip otomatis pada card statistik ──
        $('[data-tooltip]').on('mouseenter', function () {
            var tip = $('<div class="stat-tooltip" style="position:absolute;background:#222;color:#fff;padding:5px 10px;font-size:11px;border-radius:4px;z-index:9999;">' + $(this).data('tooltip') + '</div>');
            $('body').append(tip);
            var offset = $(this).offset();
            tip.css({ top: offset.top - tip.outerHeight() - 8, left: offset.left + ($(this).outerWidth() / 2) - (tip.outerWidth() / 2) });
        }).on('mouseleave', function () {
            $('.stat-tooltip').remove();
        });

    });
})(jQuery);
