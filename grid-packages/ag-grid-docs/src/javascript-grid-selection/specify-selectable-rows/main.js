var gridOptions = {
    columnDefs: [
        { field: "athlete" },
        { field: "age", maxWidth: 100 },
        {
            field: "country",
            minWidth: 180,
            headerCheckboxSelection: true,
            checkboxSelection: true
        },
        { field: "year", maxWidth: 120 },
        { field: "date", minWidth: 150 },
        { field: "sport" },
        { field: "gold", aggFunc: 'sum' },
        { field: "silver", aggFunc: 'sum' },
        { field: "bronze", aggFunc: 'sum' },
    ],
    defaultColDef: {
        flex: 1,
        minWidth: 150,
        sortable: true,
        resizable: true,
        filter: true,
    },
    rowSelection: 'multiple',
    suppressMenuHide: true,
    isRowSelectable: function(rowNode) {
        return rowNode.data ? rowNode.data.year < 2007 : false;
    }
};

// setup the grid after the page has finished loading
document.addEventListener('DOMContentLoaded', function() {
    var gridDiv = document.querySelector('#myGrid');
    new agGrid.Grid(gridDiv, gridOptions);

    agGrid.simpleHttpRequest({ url: 'https://raw.githubusercontent.com/ag-grid/ag-grid/master/grid-packages/ag-grid-docs/src/olympicWinnersSmall.json' })
        .then(function(data) {
            gridOptions.api.setRowData(data);
        });
});
