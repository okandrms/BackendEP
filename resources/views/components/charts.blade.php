<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://www.gstatic.com/charts/loader.js'></script>
</head>
<body>
    <div id="chart"></div>
    <script>
        async function fetchJobData(category, experience) {
            try {
                const response = await fetch(`/get-jobs?category=${category}&experience=${experience}`);
                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.json();
                console.log('Fetched Data:', data);
                return data.map(job => ({ x: job.title, y: job.salary }));
            } catch (error) {
                console.error('Error fetching job data:', error);
                return [];
            }
        }

        async function renderChart() {
            const currentCategory = document.getElementById('category').text.trim();
            const currentExperience = document.getElementById('experience').text.trim();
            const jobsData = await fetchJobData(currentCategory, currentExperience);

            var options = {
                series: [{
                    name: 'Salary',
                    data: jobsData
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 0
                },
                grid: {
                    row: {
                        colors: ['#fff', '#f2f2f2']
                    }
                },
                xaxis: {
                    labels: {
                        rotate: -45
                    },
                    categories: jobsData.map(d => d.x),
                    tickPlacement: 'on'
                },
                yaxis: {
                    title: {
                        text: 'Salary',
                    },
                    labels: {
                        formatter: function(value) {
                            let formattedValue = '€' + value.toFixed().replace(/\d(?=(\d{3})+(?!\d))/g, '$& ');
                            return formattedValue;
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        gradientToColors: ['#7C3AED', '#8B5CF6'], 
                        inverseColors: true,
                        opacityFrom: 0.85,
                        opacityTo: 0.85,
                        stops: [50, 0, 100]
                    },
                },
                colors: ['#6366F1', '#7C3AED'] 
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }

        renderChart(); 
    </script>
</body>
</html>


