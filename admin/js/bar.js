// daily product sales bar
var label1 = ['Sari', 'Khukuri', 'Statue', 'Flags', 'Bags'];
var data1 = [12, 19, 5, 2, 3];
var color1 = [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ]
var ctx1 = document.getElementById('myChart1').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: label1,
        datasets: [{
            data: data1,
            backgroundColor: color1
        }]
    },
    options: {
        title: {
            display: true,
            text: "Most Poppular Product's Sale",
            fontSize: 30,
            fontColor: '#000',
            lineHeight: 2
        }
        
    }
});
