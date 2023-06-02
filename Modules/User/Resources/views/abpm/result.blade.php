@php

    function avg($arr,$count=null)
    {
        $count=$count ? $count:count($arr);
        $sum = 0;
        foreach ($arr as $item) {
            $sum += $item;
        }
        return number_format($sum / $count, 1);
    }
    function min_number($arr){
        $arr = array_diff($arr, array(null));
        return min($arr);
    }
    function max_number($arr){
        $arr = array_diff($arr, array(null));
        return max($arr);
    }

            $now=now();
            $timeArr=explode(":",$abpm->time);

            $now->hour($timeArr[0]);
            $now->minute($timeArr[1]);
            $range=[
                $now->format("H:i")
];
            for($i=0;$i<$abpm->dia_count;$i++){
                $range[]=$now->addMinute(30)->format("H:i");
            }

@endphp
<!DOCTYPE html>
<html>

<head>
    <title>Automatic Office Blood Pressure</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style type="text/css" media="print">
      @media print
      {
         @page {
           margin-top: 0;
           margin-bottom: 0;
         }
         body  {
           padding-top: 72px;
           padding-bottom: 72px ;
         }
      }
</style>
    <style>
        .table-header {
            background: #fde9d9
        }
        .bottom-texts li{
            margin-top:0.5rem;
            margin-bottom:0.5rem;
        }

        @media print {
             html,body{
            font-size:22px !important;
        }
        .table > :not(caption) > * > *{
            padding:.4rem .4rem;
        }
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
            height:85vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="print-area">
            <h1 class="text-center">ABPM Result</h1>
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
                                Name: {{ $abpm->patient->name }}
                            </td>
                            <td colspan="2" class="border-start-0 border-end-0">
                                Code: {{ $abpm->patient->code }}
                            </td>
                            <td colspan="1" class="border-start-0">

                            </td>
                        </tr>
                        <tr class="border-top-0">
                            <td colspan="2" class="border-end-0">
                                Age: {{ $abpm->patient->age }}
                            </td>
                            <td colspan="2" class="border-start-0 border-end-0">
                                Gender: {{ $abpm->patient->sex == 1 ? 'Male' : 'Female' }}
                            </td>
                            <td colspan="1" class="border-start-0 ">

                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="abpm-table">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th colspan="5"> ABPM Statistics</th>

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
                                {{ $abpm->sys_avg }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $sys_std }} </td>
                            <td class="border-end-0 border-start-0">
                                {{ max_number($abpm->sys) }}
                            </td>
                            <td class=" border-start-0">
                                {{ min_number($abpm->sys) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                DIA (mmHg)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $abpm->dia_avg }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $dia_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ max_number($abpm->dia) }}
                            </td>
                            <td class=" border-start-0">
                                {{ min_number($abpm->dia) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end-0">
                                HR (bpm)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $abpm->hr_avg }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ $hr_std }}
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{ max_number($abpm->hr) }}
                            </td>
                            <td class=" border-start-0">
                                {{ min_number($abpm->hr) }}
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
                                {{ number_format(max_number($maps), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min_number($maps), 1) }}
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
                                {{ number_format(max_number($pps), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min_number($pps), 1) }}
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
                                {{ number_format(max_number($cos), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min_number($cos), 1) }}
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
                                {{ number_format(max_number($cis), 1) }}
                            </td>
                            <td class=" border-start-0">
                                {{ number_format(min_number($cis), 1) }}
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
                            <th colspan="7">Result</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-end-0">

                            </td>
                            <td class="border-end-0 border-start-0" style="font-weight:bold">
                                Office
                            </td>
                            <td class="border-end-0 border-start-0" style="font-weight:bold">
                                Total
                            </td>
                            <td class="border-end-0 border-start-0" style="font-weight:bold">
                                Day
                            </td>
                            <td class=" border-start-0" style="font-weight:bold">
                                Night
                            </td>
                            <td class=" border-start-0" style="font-weight:bold">
                                Awake
                            </td>
                            <td class=" border-start-0" style="font-weight:bold">
                                Asleep
                            </td>
                        </tr>
                        
                        <tr>
                           
                           <td class="border-end-0">
                           SYS/DIA (mmgHg)
                           </td>
                           <td class="border-end-0 border-start-0">
                               {{$abpm->sys_avg}} / {{$abpm->dia_avg}}
                           </td>
                           <td class="border-end-0 border-start-0">
                           {{$abpm->sys[0]}} / {{$abpm->dia[0]}}
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->sys_avg}} / {{$abpm->dia_avg}}
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->sys_night_avg}} / {{$abpm->dia_night_avg}}
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->sys_awake_avg}} / {{$abpm->dia_awake_avg}}
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->sys_asleep_avg}} / {{$abpm->dia_asleep_avg}} (%)
                           </td>
                       </tr>
                        <tr>
                           
                            <td class="border-end-0">
                                HR (bpm)
                            </td>
                            <td class="border-end-0 border-start-0">
                                {{$abpm->hr[0]}}
                            </td>
                            <td class="border-end-0 border-start-0">
                            {{$abpm->hr_avg}}
                            </td>
                            <td class=" border-start-0">
                            {{$abpm->hr_day_avg}} 
                            </td>
                            <td class=" border-start-0">
                            {{$abpm->hr_night_avg}}
                            </td>
                            <td class=" border-start-0">
                            {{$abpm->hr_awake_avg}}
                            </td>
                            <td class=" border-start-0">
                            {{$abpm->hr_asleep_avg}}
                            </td>
                        </tr>
                        <tr>
                           
                           <td class="border-end-0">
                            SYS/DIA (> 130/85)
                           </td>
                           <td class="border-end-0 border-start-0">
                               -
                           </td>
                           <td class="border-end-0 border-start-0">
                           {{$abpm->summary['sys_above_130_count']}} / {{$abpm->summary['dia_above_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->day_summary['sys_above_130_count']}} / {{$abpm->day_summary['dia_above_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->night_summary['sys_above_130_count']}} / {{$abpm->night_summary['dia_above_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->awake_summary['sys_above_130_count']}} / {{$abpm->awake_summary['dia_above_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->asleep_summary['sys_above_130_count']}} / {{$abpm->asleep_summary['dia_above_85_count']}} (%)
                           </td>
                       </tr>
                       <tr>
                           
                           <td class="border-end-0">
                            SYS/DIA (< 130/85)
                           </td>
                           <td class="border-end-0 border-start-0">
                               -
                           </td>
                           <td class="border-end-0 border-start-0">
                           {{$abpm->summary['sys_under_130_count']}} / {{$abpm->summary['dia_under_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->day_summary['sys_under_130_count']}} / {{$abpm->day_summary['dia_under_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->night_summary['sys_under_130_count']}} / {{$abpm->night_summary['dia_under_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->awake_summary['sys_under_130_count']}} / {{$abpm->awake_summary['dia_under_85_count']}} (%)
                           </td>
                           <td class=" border-start-0">
                           {{$abpm->asleep_summary['sys_under_130_count']}} / {{$abpm->asleep_summary['dia_under_85_count']}} (%)
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

    const range = (a,b) => Array(Math.abs(a-b)+1).fill(a).map((v,i)=>v+i*(a>b?-1:1));
        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: @json($range),
                datasets: [{
                        data: @json($abpm->dia),
                        label: "DBP",
                        borderColor: "#3cba9f",
                        fill: false
                    },
                    {
                        data: @json($abpm->sys),
                        label: "SBP",
                        borderColor: "#e43202",
                        fill: false
                    }
                ]
            },
            options: {
                        maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'ABPM'
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
