var columnDefs = [
    { field: 'Month', width: 150, chartDataType: 'category' },
    { field: 'Sunshine (hours)', chartDataType: 'series' },
    { field: 'Rainfall (mm)', chartDataType: 'series' },
];

var gridOptions = {
    defaultColDef: {
        editable: true,
        sortable: true,
        flex: 1,
        minWidth: 100,
        filter: true,
        resizable: true,
    },
    popupParent: document.body,
    columnDefs: columnDefs,
    enableRangeSelection: true,
    enableCharts: true,
    onChartCreated: onChartCreated,
    onChartRangeSelectionChanged: onChartRangeSelectionChanged,
    onChartDestroyed: onChartDestroyed,
};

var chart = null;

function onChartCreated(event) {
    console.log('Created chart with ID ' + event.chartId);
    chart = event.chartModel.chart;
    updateTitle();
}

function onChartRangeSelectionChanged(event) {
    console.log('Changed range selection of chart with ID ' + event.chartId);
    updateTitle();
}

function onChartDestroyed(event) {
    console.log('Destroyed chart with ID ' + event.chartId);
    chart = null;
}

function updateTitle() {
    var cellRange = gridOptions.api.getCellRanges()[1];
    var columnCount = cellRange.columns.length;
    var rowCount = cellRange.endRow.rowIndex - cellRange.startRow.rowIndex + 1;

    chart.title.enabled = true;
    chart.title.text = 'Monthly Weather';

    chart.subtitle.enabled = true;
    chart.subtitle.text = 'Using series data from ' + columnCount + ' column(s) and ' + rowCount + ' row(s)';
}

// setup the grid after the page has finished loading
document.addEventListener('DOMContentLoaded', function() {
    var gridDiv = document.querySelector('#myGrid');
    new agGrid.Grid(gridDiv, gridOptions);

    agGrid
        .simpleHttpRequest({
            url:
                'https://raw.githubusercontent.com/ag-grid/ag-grid/master/grid-packages/ag-grid-docs/src/weather_se_england.json',
        })
        .then(function(data) {
            gridOptions.api.setRowData(data);
        });
});
