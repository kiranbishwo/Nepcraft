// chart for stocks or quantity by category
var label = ['Sari', 'Khukuri', 'Statue', 'Flags', 'Bags'];
var data = [12, 19, 5, 2, 3];
var color = [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ]
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: label,
        datasets: [{
            data: data,
            backgroundColor: color
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Stocks By Category',
            fontSize: 30,
            fontColor: '#000',
            lineHeight: 2
        }
        
    }
});
