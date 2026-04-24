<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Yearly Job & Training Report</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{
    margin-left:260px;
    padding:20px;
    background:#f3e5f5;
    font-family:Arial;
}

h2{ color:#4a0072; margin-bottom:20px; font-size:24px; }

/* ALL CARDS IN ONE LINE */
.cards{
    display:flex;
    gap:15px;
    margin-top:20px;
    flex-wrap: wrap; /* wraps on smaller screens */
}

.card{
    background:#fff;
    padding:20px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 6px 20px rgba(0,0,0,0.08);
    flex: 1; /* all cards share equal space */
    min-width: 200px; /* prevents cards from shrinking too small */
}

.card i{ font-size:36px; }

.hired i{ color:#2e7d32; }
.rejected i{ color:#c62828; }
.approved i{ color:#2e7d32; }

.card h3{ font-size:28px; margin:8px 0; }

/* CHARTS SIDE BY SIDE */
.chart-container {
    display: flex;
    gap: 20px;
    margin-top:30px;
    flex-wrap: wrap; /* responsive wrap */
}

.chart-box{
    flex: 1;
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 6px 20px rgba(0,0,0,0.08);
    max-width: 600px;
    min-width: 300px;
    height: 400px;
}
</style>
</head>

<body>

@include('company.header')<br><br><br><br>
@include('company.sidebar')

<h2> Yearly Job Report & Training Completion</h2>

<!-- ALL 4 SUMMARY CARDS IN ONE ROW -->
<div class="cards">
    <!-- JOB CARDS -->
    <div class="card hired">
        <i class="fa-solid fa-check-circle"></i>
        <h3>{{ $totalHired }}</h3>
        <p>Total Hired Jobs</p>
    </div>

    <div class="card rejected">
        <i class="fa-solid fa-xmark-circle"></i>
        <h3>{{ $totalRejected }}</h3>
        <p>Total Rejected Jobs</p>
    </div>

    <!-- TRAINING CARDS -->
    <div class="card approved">
        <i class="fa-solid fa-check-circle"></i>
        <h3>{{ $totalApprovedTrainings }}</h3>
        <p>Total Approved Trainings</p>
    </div>

    <div class="card rejected">
        <i class="fa-solid fa-xmark-circle"></i>
        <h3>{{ $totalRejectedTrainings }}</h3>
        <p>Total Rejected Trainings</p>
    </div>
</div>

<!-- SIDE-BY-SIDE CHARTS -->
<div class="chart-container">
    <!-- JOB BAR CHART -->
    <div class="chart-box">
        <h3 style="color:#4a0072; font-size:18px;"> Year-wise Hired vs Rejected Jobs </h3>
        <canvas id="jobBarChart"></canvas>
    </div>

    <!-- TRAINING PIE CHART -->
    <div class="chart-box">
        <h3 style="color:#4a0072; font-size:18px;"> Training Completion: Approved vs Rejected</h3>
        <canvas id="trainingPieChart"></canvas>
    </div>
</div>

<script>
/* ------------------------ JOB BAR CHART ------------------------ */
const jobCtx = document.getElementById('jobBarChart');
const years = @json($years);
const hiredData = @json($hiredData);
const rejectedData = @json($rejectedData);

new Chart(jobCtx, {
    type: 'bar',
    data: {
        labels: years,
        datasets: [
            {
                label: 'Hired Jobs',
                data: hiredData,
                backgroundColor: 'rgba(33, 150, 243, 0.7)',
                borderColor: 'rgba(33, 150, 243, 1)',
                borderWidth: 1
            },
            {
                label: 'Rejected Jobs',
                data: rejectedData,
                backgroundColor: 'rgba(198, 40, 40, 0.7)',
                borderColor: 'rgba(198, 40, 40, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: { title:{ display:true, text:'Year', font:{ size:12, weight:'bold' } }, stacked:false },
            y: { beginAtZero:true, title:{ display:true, text:'Number of Jobs', font:{ size:12, weight:'bold' } }, ticks:{ stepSize:1 } }
        },
        plugins: {
            tooltip:{ mode:'index', intersect:false },
            legend:{ position:'bottom', labels:{ font:{ size:12, weight:'bold' } } }
        }
    }
});

/* ------------------------ TRAINING PIE CHART ------------------------ */
const trainingCtx = document.getElementById('trainingPieChart');

new Chart(trainingCtx, {
    type: 'pie',
    data: {
        labels: ['Approved Trainings', 'Rejected Trainings'],
        datasets: [{
            data: [{{ $totalApprovedTrainings }}, {{ $totalRejectedTrainings }}],
            backgroundColor: ['rgba(46, 125, 50, 0.7)','rgba(198, 40, 40, 0.7)'],
            borderColor: ['rgba(46, 125, 50,1)','rgba(198,40,40,1)'],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position:'bottom', labels:{ font:{ size:14, weight:'bold'} } },
            tooltip: {
                callbacks: {
                    label: function(context){
                        let total = context.dataset.data.reduce((a,b)=>a+b,0);
                        let value = context.raw;
                        let percentage = ((value/total)*100).toFixed(1);
                        return `${context.label}: ${value} (${percentage}%)`;
                    }
                }
            }
        }
    }
});
</script>

@include('company.footer')
</body>
</html>
