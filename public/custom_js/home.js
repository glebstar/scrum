window.onload = function () {
    for (var i = 0; i < data2.length; i++) {
        data2[i]['todo'] = data2[i]['todo'].toString();
        data2[i]['doing'] = data2[i]['doing'].toString();
        data2[i]['done'] = data2[i]['done'].toString();

        var project_id = data2[i]['project_id'];
        var productivity_chart = "productivity_chart".concat(i);

        if(data2[i]['todo']!= 0 && data2[i]['doing']!= 0 && data2[i]['done']!= 0){
            var chart = new CanvasJS.Chart(productivity_chart, {
                title:{
                    text: data2[i]['project_name']
                },
                data: [
                    {
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "doughnut",
                        explodeOnClick : false,
                        indexLabelPlacement: "inside",
                        indexLabelFontSize: 14,
                        indexLabelFontColor: "#fafafa",
                        click: onClick,
                        dataPoints: [
                            { label: "to-do",  y: data2[i]['todo'],indexLabel : data2[i]['todo']},
                            { label: "doing", y: data2[i]['doing'],indexLabel : data2[i]['doing']},
                            { label: "done", y: data2[i]['done'],indexLabel : data2[i]['done']}
                        ]
                    }
                ]
            });
        } else {
            var chart = new CanvasJS.Chart(productivity_chart, {
                title:{
                    text: data2[i]['project_name']
                },
                legend: {
                    cursor:"pointer",
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15,
                    href: boardUrl + '/' + project_id,
                    itemclick: function(e){
                        window.location = $(this).attr('href');
                    }
                },
                data: [
                    {
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "doughnut",
                        showInLegend: true,
                        legendText: "clic to add card",
                        explodeOnClick : false,
                        indexLabelPlacement: "inside",
                        indexLabelFontSize: 14,
                        indexLabelFontColor: "#fafafa",
                        click: onClick,
                        dataPoints: [
                            { label: "to-do",  y: data2[i]['todo'],indexLabel : data2[i]['todo']}
                        ]
                    }
                ]
            });
        }
        chart.render();
    }
}

function onClick(e){
    return false;
}
