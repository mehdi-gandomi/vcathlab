@php
    function avg($arr)
    {
        $sum = 0;
        foreach ($arr as $item) {
            $sum += $item;
        }
        return number_format($sum / count($arr), 1);
    }
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>AOBP Result</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .table-header {
            background: #fde9d9
        }

        @media print {
            body {
                color-adjust: exact;
            }
            .container{
                width:100% !important;
                height:100% !important;
                max-width:100% !important;
            }
        }
        #line-chart{
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="print-area">
            <h1 class="text-center">AOBP Result</h1>
        <div class="result-wrap ">
            <div class="patient-table">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th colspan="5">Patient</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom-0">
                            <td colspan="2" class="border-end-0">
                                Name: {{ $aobp->patient->name }}
                            </td>
                            <td colspan="2" class="border-start-0 border-end-0">
                                Code: {{ $aobp->patient->code }}
                            </td>
                            <td colspan="1" class="border-start-0">

                            </td>
                        </tr>
                        <tr class="border-top-0">
                            <td colspan="2" class="border-end-0">
                                Age: {{ $aobp->patient->age }}
                            </td>
                            <td colspan="2" class="border-start-0 border-end-0">
                                Gender: {{ $aobp->patient->sex == 1 ? 'Male' : 'Female' }}
                            </td>
                            <td colspan="1" class="border-start-0 ">

                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="aobp-table">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th colspan="5"> AOBP Statistics</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-end-0">

                            </td>
                            <td class="border-end-0 border-start-0">
                                Mean
                            </td>
                            <td class="border-end-0 border-start-0">
                                Std. Dev
                            </td>
                            <td class="border-end-0 border-start-0">
                                Max
                            </td>
                            <td class=" border-start-0">
                                Min
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                SYS (mmHg)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $aobp->sys_avg }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $sys_std }} </td>
                            <td class="border-end-0 border-start-0">
                                {{ max($aobp->sys) }}
                            </td>
                            <td class=" border-start-0">
                                {{ min($aobp->sys) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                DIA (mmHg)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $aobp->dia_avg }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $dia_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ max($aobp->dia) }}
                            </td>
                            <td class=" border-start-0">
                                {{ min($aobp->dia) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                HR (bpm)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $aobp->hr_avg }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $hr_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ max($aobp->hr) }}
                            </td>
                            <td class=" border-start-0">
                                {{ min($aobp->hr) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                MAP (mmHg)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ avg($maps) }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $map_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ number_format(max($maps), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min($maps), 1) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                PP (mmHg)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ avg($pps) }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $pp_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ number_format(max($pps), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min($pps), 1) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                CO (l/min)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ avg($cos) }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $co_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ number_format(max($cos), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min($cos), 1) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                CI (l/min/m2)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ avg($cis) }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $ci_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ number_format(max($cis), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min($cis), 1) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0" colspan="5">
                                <canvas id="line-chart"></canvas>
                            </td>

                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="result-table">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th colspan="5">Result</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom-0">
                            <td colspan="5" class="border-end-0">
                                <ul>
                                    <li>
                                        45% of SBP values were > 130 mmHg and 41% of DBP values were > 85 mmHg.
                                    </li>
                                    <li>
                                        55% of SBP and 59% of DBP readings were normal value (SBP < 130 mmHg and DBP <
                                            85 mmHg). </li>
                                    <li>
                                        Mean home SBP/DBP = 127 / 84 mmHg (Max SBP = 160 mmHg and Max DBP = 99 mmHg).
                                    </li>
                                    <li>
                                        Classification of the patient was white-coat hypertension. (Office SBP/DBP = 165
                                        / 85 mmHg)
                                    </li>
                                    <li>
                                        Recommended lifestyle changes and drug treatment (if CVD risk > 7.5% and SBP >
                                        135 mmHg).
                                    </li>
                                </ul>


                            </td>

                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/assets/js/chartjs-plugin-annotation.min.js"></script>
    <script>
        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
                datasets: [{
                        data: @json($aobp->dia),
                        label: "DBP",
                        borderColor: "#3cba9f",
                        fill: false
                    },
                    {
                        data: @json($aobp->sys),
                        label: "SBP",
                        borderColor: "#e43202",
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'AOBP'
                    },
                    annotation: {
                        annotations: {
                            line1: {
                                type: 'line',
                                yMin: 120,
                                yMax: 120,
                                borderColor: 'rgb(0, 0, 0)',
                                borderWidth: 2,
                                pointStyle:"dash",
                                borderDash: [10,5]
                            },
                            line2: {
                                type: 'line',
                                yMin: 80,
                                yMax: 80,
                                borderColor: 'rgb(255, 0, 0)',
                                borderWidth: 2,
                                borderJoinStyle:"round",
                                borderCapStyle:"round",
                                pointStyle:"dash",
                                borderDash: [10,5]
                            }
                        }
                    }
                },
                // interaction: {
                //     intersect: false,
                // },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        display: true,
                        title: {
                            display: true
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        display: true,
                        title: {
                            display: true,
                            text: 'mmHg'
                        },
                        suggestedMin: 20,
                        suggestedMax: 240,
                        ticks: {
                            stepSize: 20
                        }
                    }
                }
            },
        });
    </script>
</body>

</html>
