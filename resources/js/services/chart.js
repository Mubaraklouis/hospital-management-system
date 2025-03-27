// import Chart from 'chart.js/auto';

/*
 * Graph : this is the class that allows us to use charts in the website
 * chartBluePrint: Is a function used to get a chart type and it properties
 *
 **/
class Graph{
chartBluePrint(ctx,graphType,colors,pat,date1,date2,date3,date4,date5,date6,date7){
        new Chart(ctx, {
            type: graphType,
            data: {
              labels: [date1,date2,date3,date4,date5,date6,date7],
              datasets: [{
                label: 'total patient',
                data: [pat.date7, pat.date6, pat.date5, pat.date4, pat.date3, pat.date2,pat.date1],
                borderWidth: 1,
                borderColor: "#6200FF",
                backgroundColor:colors
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
    }
}

export default Graph;
