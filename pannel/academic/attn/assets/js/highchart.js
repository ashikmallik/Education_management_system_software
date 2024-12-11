
 $(document).ready(function(){
    // Create the chart
Highcharts.chart('container2', {
 chart: {
   type: 'column'
 },
 title: {
   text: 'Highest to lowest graph',
 },
 
 accessibility: {
   announceNewData: {
     enabled: true
   }
 },
 xAxis: {
   type: 'category'
 },
 yAxis: {
   title: {
     text: ''
   },
   

 },
 legend: {
   enabled: false
 },
 plotOptions: {
   series: {
     borderWidth: 0,
     dataLabels: {
       enabled: true,
       format: '{point.y:.1f}%'
     }
   }
 },

 tooltip: {
   headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
   pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
 },

 series: [
   {
     name: "",
     colorByPoint: true,
     data: [
       
       {
         name: "Bangla",
         y: 80.57,
         drilldown: "Bangla",
       },
       {
        name: "Bangla 2nd",
        y: 70.57,
        drilldown: "Bangla 2nd"
      },
      {
        name: "English",
        y: 65.57,
        drilldown: "English"
      },
      {
        name: "English 2nd",
        y: 60.57,
        drilldown: "English 2nd"
      },
      {
        name: "Religion",
        y: 55.74,
        drilldown: "Religion"
      },
       {
         name: "Social Science",
         y: 40.23,
         drilldown: "Social Science"
       },
       {
         name: "Science",
         y: 35.58,
         drilldown: "Science"
       },
       {
         name: "Math",
         y: 30.02,
         drilldown: "Math"
       },
       {
         name: "Mathematics",
         y: 25.92,
         drilldown: "Mathematics"
       },
       {
        name: "ICT",
        y: 20.92,
        drilldown: "ICT"
      },
      {
        name: "Agriculture",
        y: 15.92,
        drilldown: "Agriculture"
      },
      {
        name: "Life & Work",
        y: 10.92,
        drilldown: "Life & Work"
      },
      {
        name: " H. Science",
        y: 5.92,
        drilldown: " H. Science"
      },
       {
         name: "Art & Crafts",
         y: 2.62,
         drilldown: "Art & Crafts"
       }
     ]
   }
 ],
 
});
});



$(document).ready(function(){
       // Build the chart
Highcharts.chart('container', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Result in Percentage'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '{point.y:.1f}%',
        },
        showInLegend: true,
      }
    },
    series: [{
      name: 'Highest',
      colorByPoint: true,
      data: [{
        name: 'Pass',
        y: 61.41,
        sliced: true,
        selected: true,
        color:'blue'
      },{
        name: 'Fail',
        y: 20.67,
        color: 'Orange'
      }]
    }]
  });
});

/*============Middle Term Examination=============*/

$(document).ready(function(){
    // Create the chart
Highcharts.chart('container3', {
 chart: {
   type: 'column'
 },
 title: {
   text: 'Highest to lowest graph',
 },
 
 accessibility: {
   announceNewData: {
     enabled: true
   }
 },
 xAxis: {
   type: 'category'
 },
 yAxis: {
   title: {
     text: 'Total percent market share'
   }

 },
 legend: {
   enabled: false
 },
 plotOptions: {
   series: {
     borderWidth: 0,
     dataLabels: {
       enabled: true,
       format: '{point.y:.1f}%'
     }
   }
 },

 tooltip: {
   headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
   pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
 },

 series: [
  {
    name: "",
    colorByPoint: true,
    data: [
      
      {
        name: "Bangla",
        y: 80.57,
        drilldown: "Bangla",
      },
      {
       name: "Bangla 2nd",
       y: 70.57,
       drilldown: "Bangla 2nd"
     },
     {
       name: "English",
       y: 65.57,
       drilldown: "English"
     },
     {
       name: "English 2nd",
       y: 60.57,
       drilldown: "English 2nd"
     },
     {
       name: "Religion",
       y: 55.74,
       drilldown: "Religion"
     },
      {
        name: "Social Science",
        y: 40.23,
        drilldown: "Social Science"
      },
      {
        name: "Science",
        y: 35.58,
        drilldown: "Science"
      },
      {
        name: "Math",
        y: 30.02,
        drilldown: "Math"
      },
      {
        name: "Mathematics",
        y: 25.92,
        drilldown: "Mathematics"
      },
      {
       name: "ICT",
       y: 20.92,
       drilldown: "ICT"
     },
     {
       name: "Agriculture",
       y: 15.92,
       drilldown: "Agriculture"
     },
     {
       name: "Life & Work",
       y: 10.92,
       drilldown: "Life & Work"
     },
     {
       name: " H. Science",
       y: 5.92,
       drilldown: " H. Science"
     },
      {
        name: "Art & Crafts",
        y: 2.62,
        drilldown: "Art & Crafts"
      }
    ]
  }
],
 
});
});



$(document).ready(function(){
       // Build the chart
Highcharts.chart('container4', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Result in Percentage'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '{point.y:.1f}%',
        },
        showInLegend: true,
      }
    },
    series: [{
      name: 'Highest',
      colorByPoint: true,
      data: [{
        name: 'Pass',
        y: 61.41,
        sliced: true,
        selected: true,
        color:'blue'
      },{
        name: 'Fail',
        y: 20.67,
        color: 'Orange'
      }]
    }]
  });
});

/*============Annual Examination=============*/

$(document).ready(function(){
    // Create the chart
Highcharts.chart('container5', {
 chart: {
   type: 'column'
 },
 title: {
   text: 'Highest to lowest graph',
 },
 
 accessibility: {
   announceNewData: {
     enabled: true
   }
 },
 xAxis: {
   type: 'category'
 },
 yAxis: {
   title: {
     text: 'Total percent market share'
   }

 },
 legend: {
   enabled: false
 },
 plotOptions: {
   series: {
     borderWidth: 0,
     dataLabels: {
       enabled: true,
       format: '{point.y:.1f}%'
     }
   }
 },

 tooltip: {
   headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
   pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
 },

 series: [
  {
    name: "",
    colorByPoint: true,
    data: [
      
      {
        name: "Bangla",
        y: 80.57,
        drilldown: "Bangla",
      },
      {
       name: "Bangla 2nd",
       y: 70.57,
       drilldown: "Bangla 2nd"
     },
     {
       name: "English",
       y: 65.57,
       drilldown: "English"
     },
     {
       name: "English 2nd",
       y: 60.57,
       drilldown: "English 2nd"
     },
     {
       name: "Religion",
       y: 55.74,
       drilldown: "Religion"
     },
      {
        name: "Social Science",
        y: 40.23,
        drilldown: "Social Science"
      },
      {
        name: "Science",
        y: 35.58,
        drilldown: "Science"
      },
      {
        name: "Math",
        y: 30.02,
        drilldown: "Math"
      },
      {
        name: "Mathematics",
        y: 25.92,
        drilldown: "Mathematics"
      },
      {
       name: "ICT",
       y: 20.92,
       drilldown: "ICT"
     },
     {
       name: "Agriculture",
       y: 15.92,
       drilldown: "Agriculture"
     },
     {
       name: "Life & Work",
       y: 10.92,
       drilldown: "Life & Work"
     },
     {
       name: " H. Science",
       y: 5.92,
       drilldown: " H. Science"
     },
      {
        name: "Art & Crafts",
        y: 2.62,
        drilldown: "Art & Crafts"
      }
    ]
  }
],
 
});
});



$(document).ready(function(){
       // Build the chart
Highcharts.chart('container6', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Result in Percentage'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '{point.y:.1f}%',
        },
        showInLegend: true,
      }
    },
    series: [{
      name: 'Highest',
      colorByPoint: true,
      data: [{
        name: 'Pass',
        y: 61.41,
        sliced: true,
        selected: true,
        color:'blue'
      },{
        name: 'Fail',
        y: 20.67,
        color: 'Orange'
      }]
    }]
  });
});
