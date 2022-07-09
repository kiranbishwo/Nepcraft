
// var data3 = [1000, 5009, 7005, 2000, 2000, 5005, 4000];
// var label3 = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
// var ctx2 = document.getElementById('myChart2').getContext('2d');
// var myChart2 = new Chart(ctx2, {
//     type: 'line',
//     data: {
//         labels: label3,
//         datasets: [{
//             label: "Sales in Rs.",
//             data: data3,
//             fill: false,
//             lineTension: 0,
//             borderColor: 'blue',
//             backgroundColor: 'transparent',
//             pointBorderColor: 'blue',
//             pointBackgroundColor: 'blue',
//             pointRadius: 2,
//             pointHoverRadius: 10,
//             pointHitRadius: 30,
//             pointBorderWidth: 5,
//             pointStyle: 'rectRounded'
//         }]
//     },
//     options: {
//         title: {
//             display: true,
//             text: 'Total Sales of this week',
//             fontSize: 30,
//             fontColor: '#000',
//             lineHeight: 2
//         }
        
//     }
// });


$(document).ready(function(){
  $.ajax({
    url : "load_line_chart.php",
    type : "GET",
    success : function(data){
      console.log(data);
      var wishid = [];
      var pid = [];
      var pname = [];
      //
      // var userid = [];
      // var facebook_follower = [];
      // var twitter_follower = [];
      // var googleplus_follower = [];

      for(var i in data) {
        wishid.push("WishId " + data[i].wishid);
        pname.push(data[i].productname);
// //
//         userid.push("UserID " + data[i].userid);
//         facebook_follower.push(data[i].facebook);
//         twitter_follower.push(data[i].twitter);
//         googleplus_follower.push(data[i].googleplus);
      }

      var chartdata = {
        labels: wishid,
        datasets: [
          {
            label: "productname",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: pname
          }
        ]
      };

      var ctx = $("#myChart1");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});