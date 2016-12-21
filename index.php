<!doctype html>
<html>

<head>
    <title>DevOps</title>
    <script src="Chart.bundle.js"></script>
    <script src="utils.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
<center>
    <div style="width:40%">
        <canvas id="canvas"></canvas>
    </div>
        <script>
        
    function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return decodeURI(pair[1]);}
       }
       return(false);
}    

    var customerName = getQueryVariable("name")


    var d1 = getQueryVariable("d1")
    var d2 = getQueryVariable("d2")
    var d3 = getQueryVariable("d3")
    var d4 = getQueryVariable("d4")
    var d5 = getQueryVariable("d5")

    var o1 = getQueryVariable("o1")
    var o2 = getQueryVariable("o2")
    var o3 = getQueryVariable("o3")
    var o4 = getQueryVariable("o4")
    var o5 = getQueryVariable("o5")

    var chartTitle = "DevOps Chart - " + customerName
    
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 4);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: ["Automation", "Methodology", "Strategy", "Business Influence", "Resources"],
            datasets: [{
                label: "Dev",
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                data: [d1,d2,d3,d4,d5]
            }, {
                label: "Ops",
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                data: [o1,o2,o3,o4,o5]

            },]
        },
        options: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: chartTitle
            },
            scale: {
            
              ticks: {
                beginAtZero: true,
                max: 4,
                min: 0
              }
            }
        }
    };

    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);
    };


    var colorNames = Object.keys(window.chartColors);
    </script>
</body>

</html>
