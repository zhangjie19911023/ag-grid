<div class="note" style="display: none" fixVersionNote id="fix_version_24_1_0">
    <p><b>Release 24.1.0 (12th Sep 2020)</b></p>

    <p>Minor release with bug fixes and small improvements.</p>

    <p><b>Feature Highlights:</b></p>
    <ul>
        <li>
            <code>Vue 3</code> Support.
        </li>
    </ul>

    <p><b>Deprecations:</b></p>

    <ul>
        <li>
            <code>colDef.suppressHeaderKeyboardEvent</code> should now be used instead of <code>gridOptions.suppressKeyboardEvent</code>. Note the methods: <code>navigateToNextHeader</code> and <code>tabToNextHeader</code> have been added to the grid options to allow custom header navigation. For more details see <a href="/javascript-grid-keyboard-navigation/#custom-navigation">Custom Navigation</a>.
        </li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_24_0_0">
    <p><b>Release 24.0.0 (9th Sep 2020)</b></p>

    <p><b>Feature Highlights:</b></p>

    <ul>
        <li>
            AG-1873: Allow more combining multiple column filters on one column
            (see <a href="/javascript-grid-filter-multi">Multi Filter</a>)
        </li>

        <li>
            AG-4291: Reactive Columns - Enhancements to Column Definitions including the following:
            <ul>
                <li>
                    Declarative Column Definitions for React resulting in application code that
                    fits more nicely with the React paradigm.
                </li>
                <li>
                    Revamped <a href="/javascript-grid-column-updating-definitions">Updating Column Definitions</a>
                    to make it easier to make changes to columns.
                    For example state items now have 'default' values (defaultWidth, defaultSort etc) which means
                    there is no longer any need for 'Immutable Columns' (which are gone).
                </li>
                <li>
                    Revamped <a href="/javascript-grid-column-state">Column State</a> to allow more powerful
                    and fine grained control of Column State without touching the Column Definitions. For example
                    partial state can be applied to impact certain Columns or to impact only certain Attributes,
                    providing fine grained control over Column State.
                </li>
            </ul>
        </li>

        <li>Accessibility Enhancements</li>
        <ul>
            <li>AG-4254 - Allow screen readers to read column names in the column tool panel</li>
            <li>AG-4394 - Add ARIA tags in the paging panel</li>
            <li>AG-4390 - Allow updates to sort order to be announced</li>
            <li>AG-2629 - Allow screen readers/keyboard navigation to access the column headers sort and filtering elements</li>
            <li>AG-4279 - Add ARIA label to row selection checkbox</li>
            <li>AG-4250 - Add role definitions to grouped rows to allow them to be read correctly by screen readers</li>
            <li>AG-4389 - Allow column menu tabs to be announced correctly in JAWS</li>
            <li>AG-4322 - Update ARIA role, label, title, sort tags for column headers</li>
            <li>AG-4314 - Allow passing the WAVE, AXE accessibility audit</li>
            <li>AG-4363 - Add ARIA labels to cell editors</li>
            <li>AG-1967 - Add Accessibility attributes across column header Filter/Sorting elements</li>
            <li>AG-4391 - Add aria-label to provided filter menu inputs</li>
            <li>AG-4393 - Allow using keyboard navigation to navigate to and access the pagination panel</li>
            (see <a href="/javascript-grid-accessibility">Accessibility</a>)
        </ul>

        <li>
            AG-2821 - Chart Themes (see <a href="/javascript-charts-themes">Chart Themes</a>,
            <a href="/javascript-grid-charts-integrated-customisation">Integrated Theme Based Customisation</a>)
        </li>

        <li>
            AG-4140 - Allow aggregation without totalling on pivot column groups (see
            <a href="/javascript-grid-pivoting/#expandable-pivot-column-groups">Expandable Pivot Groups</a>)
        </li>

        <li>
            AG-4266 - Add API methods indicating whether the undo/redo stack is empty (see
            <a href="/javascript-grid-undo-redo-edits/#example-undo-redo">Undo / Redo</a>)
        </li>
    </ul>

    <p><b>Breaking Changes:</b></p>

    <p><u>Reactive Columns</u></p>

    <ul>
        <li>Column stateful items (width, flex, hide, sort, aggFunc, pivot, pivotIndex, rowGroup, rowGroupIndex, initialPinned) always get re-applied when Column Definitions are updated.</li>
        <li>Grid Property 'immutableColumns' is now gone. Columns are immutable by default.</li>
        <li>Grid API 'getColumnState()' now returns back more information about columns. This is only a breaking change if your application isn't able to work with the extra details.</li>
        <li>Grid API 'setColumnsState()' is replaced with 'applyColumnState()'. The new method is similar but more powerful / flexible.</li>
        <li>Grid Property 'suppressSetColumnStateEvents' renamed to 'suppressColumnStateEvents'.</li>
        <li>Column Definition property sortedAt replaced with sortIndex.</li>
        <li>Grid API's 'getSortModel()' and 'setSortModel()' are deprecated as sort information is now part of Column State. Use get/applyColumnState() for sort information instead.</li>
    </ul>

    <p>See 'More Info' on AG-4291 for full details, these changes make more sense in context of the wider changes.</p>

    <p><u>Custom Aggregation</u></p>
    <ul>
        <li>
            Custom aggregation functions now take a params object, previously they took a list of values. See 'More Info' on AG-4291 for details.
        </li>
    </ul>

    <p><u>Row Deselection</u></p>
    <ul>
        <li>rowDeselection no longer has any affect as the grid now allows row deselection by default. To block row deselection set suppressRowDeselection to true..</li>
    </ul>

    <p><u>Configuring 'Full Width Group Row Inner Renderer'</u></p>
    <p>
        How <code>innerRenderer</code> was configured as a grid option was wrong and has been corrected to the correct way.
        The old way was using grid properties <code>groupRowInnerRenderer</code> and
        <code>groupRowInnerRendererParams</code>. The new correct way is to use
        <code>groupRowRendererParams.innerRenderer</code> and
        <code>groupRowRendererParams.innerRendererParams</code>.
    </p>

    <p><b>Removed Deprecations:</b></p>

    <p>The following have been deprecated for over a year and have now been removed:</p>

    <p><u>Grid Options</u></p>

    <ul>
        <li>pivotTotals (use pivotColumnGroupTotals = 'before' | 'after')</li>
        <li>gridAutoHeight (use domLayout = 'autoHeight')</li>
        <li>groupSuppressRow (remove row groups and perform custom sorting)</li>
        <li>suppressTabbing (use the grid callback suppressKeyboardEvent(params))</li>
        <li>showToolPanel (use gridOptions.sideBar)</li>
        <li>toolPanelSuppressRowGroups (use toolPanelParams.suppressRowGroups)</li>
        <li>toolPanelSuppressValues (use toolPanelParams.suppressValues)</li>
        <li>toolPanelSuppressPivots (use toolPanelParams.suppressPivots)</li>
        <li>toolPanelSuppressPivotMode (use toolPanelParams.suppressPivotMode)</li>
        <li>toolPanelSuppressColumnFilter (use toolPanelParams.suppressColumnFilter)</li>
        <li>toolPanelSuppressColumnSelectAll (use toolPanelParams.suppressColumnSelectAll)</li>
        <li>toolPanelSuppressSideButtons (use toolPanelParams.suppressSideButtons)</li>
        <li>toolPanelSuppressColumnExpandAll (use toolPanelParams.suppressColumnExpandAll)</li>
        <li>contractColumnSelection (use toolPanelParams.contractColumnSelection)</li>
        <li>enableSorting / enableServerSideSorting (use sortable=true on the column definition)</li>
        <li>enableFilter / enableServerSideFilter (use filter=true on the column definition)</li>
        <li>enableColResize (use resizable = true on the column definition)</li>
        <li>getNodeChildDetails() (use new tree data)</li>
        <li>doesDataFlower() (use new master detail)</li>
    </ul>

    <p><u>Column Definitions</u></p>

    <ul>
        <li>suppressSorting (use colDef.sortable=false)</li>
        <li>suppressFilter (use colDef.filter=false)</li>
        <li>suppressResize (use colDef.resizable=false)</li>
        <li>suppressToolPanel (use coldDef.suppressColumnsToolPanel)</li>
        <li>tooltip (use colDef.tooltipValueGetter)</li>
    </ul>

    <p><u>Row Node</u></p>

    <ul>
        <li>canFlower</li>
        <li>flower</li>
        <li>childFlower</li>
    </ul>

    <p><u>Events</u></p>

    <ul>
        <li>floatingRowDataChanged (use pinnedRowDataChanged)</li>
    </ul>

</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_23_2_0">
    <p>Release 23.2.0 (5th Jun 2020)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-3253: Allow keyboard navigation through all parts of the grid
            (see <a href="/javascript-grid-keyboard-navigation/">Keyboard Navigation</a>)
        </li>

        <li>
            AG-4227: Add chart navigator to allowing panning and zooming
            (see <a href="/javascript-charts-navigator/">Chart Navigator</a>)
        </li>

        <li>Filter Enhancements</li>
        <ul>
            <li>
                AG-1594: All row values to be expanded to multiple values in set filter
                (see <a href="/javascript-grid-filter-set-filter-list/#multiple-values-per-cell">Set Filter - Multiple Values Per Cell</a>)
            </li>

            <li>
                AG-4220: Create Excel mode for set filter
                (see <a href="/javascript-grid-filter-set-excel-mode/">Set Filter - Excel Mode</a>)
            </li>

            <li>
                AG-1645: When using asynchronous values for set filter, setting filter model should work
                (see <a href="/javascript-grid-filter-api/">Filter API</a>)
            </li>

            <li>
                <div>
                    AG-2216 - Allow filter values to be loaded every time the user opens the set filter
                </div>
                <div>
                    AG-3089 - Update all asynchronously-loaded set filter values when any filters change
                </div>
                <div>
                    AG-2298 - Allow async set values to be fetched on-demand via an API, not only when filter opened initially
                </div>
                (see <a href="/javascript-grid-filter-set-filter-list/#refreshing-values">Set Filter - Refreshing Values</a>)
            </li>
        </ul>


        <li>Master Detail Enhancements</li>
        <ul>
            <li>
                AG-2546 - Allow Master / Detail to auto-height as detail data changes
                (see <a href="/javascript-grid-master-detail-height/#auto-height">Master Detail - Auto Height</a>)
            </li>

            <li>
                AG-2651 - Master/Detail refresh isRowMaster when updating data for a row
                (see <a href="/javascript-grid-master-detail-master-rows/#dynamic-master-rows">Dynamic Master Rows</a>)
            </li>

            <li>
                AG-3589 - Allow for dynamically changing master rows into leaf nodes
                (see <a href="/javascript-grid-master-detail-master-rows/#changing-dynamic-master-rows">Changing Dynamic Master Rows</a>)
            </li>

            <li>
                AG-3916 - Allow for the refresh of detail rows when using immutable data
                (see <a href="/javascript-grid-master-detail-refresh/#refresh-rows">Master Detail - Refresh Rows</a>)
            </li>
        </ul>

    </ul>

    <p>Deprecations:</p>

    <ul>
        <li>SetFilter.setLoading() is deprecated. The loading screen is displayed automatically when the set filter is retrieving values</li>
        <li>SetFilter.selectEverything() is deprecated. setModel should be used instead</li>
        <li>SetFilter.selectNothing() is deprecated. setModel should be used instead</li>
        <li>SetFilter.selectValue() is deprecated. setModel should be used instead</li>
        <li>SetFilter.unselectValue() is deprecated. setModel should be used instead</li>
        <li>SetFilter.isValueSelected() is deprecated. getModel should be used instead</li>
        <li>SetFilter.isEverythingSelected() is deprecated. getModel should be used instead</li>
        <li>SetFilter.isNothingSelected() is deprecated. getModel should be used instead</li>
        <li>SetFilter.getUniqueValueCount() is deprecated. getValues should be used instead</li>
        <li>SetFilter.getUniqueValue() is deprecated. getValues should be used instead</li>

        <li>Provided filter filterParams.applyButton has been deprecated. Use filterParams.buttons instead</li>
        <li>Provided filter filterParams.clearButton has been deprecated. Use filterParams.buttons instead</li>
        <li>Provided filter filterParams.resetButton has been deprecated. Use filterParams.buttons instead</li>
    </ul>

</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_23_1_0">
    <p>Release 23.1.0 (1st May 2020)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-3576: Allow dragging multiple columns between grids
            (see <a href="/javascript-grid-row-dragging-to-grid/#dragging-multiple-records-between-grids">Dragging Multiple Records Between Grids</a>)
        </li>

        <li>
            AG-3625: Allow the grid to respond to DnD data based on the row position
            (see <a href="/javascript-grid-row-dragging-to-grid/#example-two-grids-with-drop-position">Row Dragging Drop Position</a>)
        </li>

        <li>
            AG-4066: Allow Grid colours to be changed using CSS variables
            (see <a href="/javascript-grid-themes-customising/#setting-parameters-css-variables">Changing colours with CSS variables</a>)
        </li>

        <li>
            AG-3312: Add Histogram Charts
            (see <a href="/javascript-charts-histogram-series/">Histogram Series</a>)
        </li>

        <li>
            AG-3472: Add the ability to listen to click events on Charts
            (see <a href="/javascript-charts-events/">Chart Events</a>)
        </li>

        <li>
            AG-588: Add tooltips to Set Filter List
            (see <a href="/javascript-grid-filter-set-filter-list/#filter-value-tooltips">Set Filter Tooltips</a>)
        </li>

        <li>AG-2162: Add option to close filter popup when Apply button is clicked
            (see <a href="/javascript-grid-filter-provided/#providedFilterParams">'closeOnApply' Filter Param</a>)
        </li>

        <li>
            AG-2187: Allow floating filters to be enabled/disabled on a per-column basis
            (see <a href="/javascript-grid-floating-filters/#floating-filters">Floating Filters on a per-column basis</a>)
        </li>
    </ul>

    <p>Deprecations:</p>

    <ul>
        <li>Grid API updateRowData() deprecated, replaced with applyTransaction()</li>
        <li>Grid API batchUpdateRowData() deprecated, replaced with applyTransactionAsync()</li>
        <li>Grid Property 'batchUpdateWaitMillis' deprecated, replaced with 'asyncTransactionWaitMillis'</li>
        <li>Grid Property 'deltaRowDataMode' deprecated, replaced with 'immutableData'</li>
        <li>Grid Property 'deltaColumnMode' deprecated, replaced with 'immutableColumns'</li>
        <li>RowDataTransaction Property 'addIndex' will be removed in a future major release</li>
        <li>RowDataTransaction Property 'addIndex' will be removed in a future major release</li>
        <li>Set Filter Param 'suppressSyncValuesAfterDataChange' will be removed in a future major release</li>
        <li>Set Filter Param 'suppressRemoveEntries' will be removed in a future major release</li>
        <li>Filter Param 'newRowsAction' will be removed in a future major release (newRowsAction = 'keep' will become the default behaviour)</li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_23_0_0">
    <p>Release 23.0.0 (17th Mar 2020)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-3110 - Allow charts to be created outside of grid
            (see <a href="/javascript-charts-overview/">Standalone Charting</a>).
        </li>

        <li>
            AG-2832 - Add new 'Alpine Theme'
            (see <a href="/javascript-grid-themes-provided/#themes-summary">Themes Summary</a>).
        </li>

        <li>AG-3872 - Improve Server-Side Row Model docs and examples
            (see <a href="/javascript-grid-server-side-model/">Server-Side Row Model</a>).
        </li>

        <li>
            AG-2025 - Add keyboard navigation to context menu
            (see <a href="/javascript-grid-context-menu/">Context Menu</a>).

        </li>

        <li>
            AG-3203 - Add API to download charts
            (see <a href="/javascript-grid-charts-integrated-chart-range-api/#saving-and-restoring-charts">Saving and Restoring Charts</a>).
        </li>

        <li>
            AG-3678 - Add additional chart lifecycle events to aid persisting charts
            (see <a href="/javascript-grid-charts-integrated-chart-events/">Chart Events</a>).
        </li>
    </ul>

    <p>Breaking Changes:</p>

    <ul>
        <li>
            <p>
                AG-3110 - We have undertaken a major rewrite of the Sass code behind our provided themes, with the goal of making it easier to write custom themes.
                See <a href="/javascript-grid-themes-v23-migration/">Migrating themes to ag-Grid 23.x</a> to understand why we've made these changes, and exactly what we've changed.
            </p>
        </li>

        <li>
            <p>
                AG-3802 - Migrate <code>ag-grid-angular</code> & <code>@ag-grid-community/angular</code> to use the Angular CLI to build.
                Angular 6+ is now the minimum supported version of Angular.
            </p>
        </li>

        <li>
            <p>
                AG-3110 - Tooltip renderer params: if a series has no `title` set, the tooltip renderer
                will receive the `title` as it, it won't be set to the value of the `yName` as before.
            </p>
        </li>

        <li>
            AG-3110 - Legend API changes:
            <ul>
                <li>legend.padding -> legend.spacing</li>
                <li>legend.itemPaddingX -> legend.layoutHorizontalSpacing</li>
                <li>legend.itemPaddingY -> legend.layoutVerticalSpacing</li>
                <li>legend.markerPadding -> legend.itemSpacing</li>
                <li>legend.markerStrokeWidth -> legend.strokeWidth</li>
                <li>legend.labelColor -> legend.textColor</li>
                <li>legend.labelFontStyle -> legend.fontStyle</li>
                <li>legend.labelFontWeight -> legend.fontWeight</li>
                <li>legend.labelFontSize -> legend.fontSize</li>
                <li>legend.labelFontFamily -> legend.fontFamily</li>
            </ul>
        </li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_22_1_0">
    <p>Release 22.1.0 (6th Dec 2019)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-1630 - Add Excel-like Fill Handle
            (see <a href="/javascript-grid-range-selection-fill-handle/">Fill Handle</a>).
        </li>
        <li>
            AG-2566 - Allow specifying column width as reminder viewport view
            (see <a href="/javascript-grid-resizing/#column-flex">Column Flex</a>).
        </li>
        <li>
            AG-169 - Allow Undo / Redo of Cell Editing
            (see <a href="/javascript-grid-undo-redo-edits/">Undo / Redo Edits</a>).
        </li>
        <li>
            AG-3318	- Allow charts to be saved and restored
            (see <a href="/javascript-grid-charts-chart-range-api/#saving-and-restoring-charts">Saving and Restoring Charts</a>).
        </li>
        <li>
            AG-2819 - Add support for Time Series charts
            (see <a href="/javascript-grid-charts-customisation-cartesian/#example-time-series-chart">Time Series Charting</a>).
        </li>
        <li>
            AG-332 - Allow exporting Master Detail to Excel
            (see <a href="/javascript-grid-master-detail/#exporting-master-detail-data">Exporting Master / Detail Data</a>).
        </li>
    </ul>
</div>


<div class="note" style="display: none" fixVersionNote id="fix_version_22_0_0">
    <p>Release 22.0.0 (11th Nov 2019)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            Charts is now out of Beta!
            (see <a href="/javascript-grid-charts-integrated-overview/">Charts</a>).
        </li>

        <li>
            AG-1329 - Modularise Grid Features to reduce grid bundle size
            (see <a href="/javascript-grid-modules/">Modularisation</a>).
        </li>

        <li>
            AG-3269 - A new pivotChart API has been added to charts.
            (see <a href="/javascript-grid-charts-chart-range-api/#pivot-charts">Pivot Chart API</a>).
        </li>

        <li>
            AG-2200 - Allow filters to be arranged using column groups in the filters tool panel
            (see <a href="/javascript-grid-tool-panel-filters/">Filters Tool Panel</a>).
        </li>
        <li>
            AG-2363 - Add filter search to the filters tool panel
            (see <a href="/javascript-grid-tool-panel-filters/">Filters Tool Panel</a>).
        </li>
        <li>
            AG-1862 - Allow custom column layouts in the Columns Tool Panel
            (see <a href="/javascript-grid-tool-panel-columns/#custom-column-layout">Custom Column Tool Panel Layout</a>).
        </li>
        <li>
            AG-3131 - Allow custom filter layouts in the Filters Tool Panel
            (see <a href="javascript-grid-tool-panel-filters/#custom-filters-layout">Custom Filters Tool Panel Layout</a>).
        </li>
        <li>
            AG-1991 - Allow filters and columns tool panel to have API calls to expand/collapse column groups/filters
            (see <a href="/javascript-grid-tool-panel-columns/#expand-collapse-column-groups">Expand / Collapse Column Groups</a>)
            (see <a href="/javascript-grid-tool-panel-filters/#expand-collapse-filter-groups">Expand / Collapse Filter Groups</a>).
        </li>

        <li>
            AG-1026	- Allow sidebar to be placed in the left or right position of the grid
            (see <a href="/javascript-grid-side-bar/#sidebardef-configuration">Side Bar Configuration</a>).
        </li>
        <li>
            AG-907 - Rollup Support Added
            (see <a href="/ag-grid-building-rollup/">Rollup</a>).
        </li>
    </ul>

    <p>Breaking Changes:</p>
    <ul>
        <li>
            In taking Charts out of Beta it was neccessary to to make numourous interface / chart option changes
            (see <a href="/javascript-grid-charts-chart-range-api/">Chart API</a> and <a href="/javascript-grid-charts-customisation/">Chart Customisation</a>).
        </li>
        <li>
            AG-3316 - agGridReact needs to be updated to use the updated react lifecycle hooks.
            React 16.3 is now the minimum version supported by AgGridReact.
        </li>
        <li>
            AG-3383 - Property selectAllOnMiniFilter no longer used, its the default behaviour for Set Filter.
        </li>
        <li>
            AG-3369 - syncValuesLikeExcel is enabled by default.
        </li>
        <li>
            AG-3345 / AG-3347 - tool panels are now kept in sync with the column order in the grid. To revert enable the following Tool Panel property: 'suppressSyncLayoutWithGrid'.
        </li>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_21_2_0">
    <p>Release 21.2.0 (30th Aug 2019)</p>

    <p>Feature Highlights:</p>

    <span style="font-weight: bold"></span>
    <ul>
        <li>
            AG-3215 - Add Pivot Chart
            (see <a href="/javascript-grid-charts-pivot-chart/">Pivot Chart</a>).
        </li>

        <li>
            AG-3036 / AG-3160 - Add Scatter / Bubble Charts
            (see <a href="/javascript-grid-charts-customisation-scatter/">Scatter Charts</a>).
        </li>

        <li>AG-2762 - Pagination - prevent separation of children from their parent rows with Master Detail and Row Grouping
            (see <a href="/javascript-grid-pagination/#childRows">Pagination & Child Rows</a>).
        </li>

        <li>AG-1643 - RichSelect - Allow typing to automatically scroll to item</li>

        <li>AG-3165 - Chart API - Add support for extra / custom aggregations
            (see <a href="/javascript-grid-charts-chart-range-api/#chart-range-api-1">Chart API</a>).
        </li>

        <li>AG-3154 - Charts - Allow user formatting changes to be saved / restored
            (see <a href="/javascript-grid-charts-customisation/#saving-user-preferences">Saving User Preferences</a>).
        </li>

        <li>AG-3184 - Charts - Add ability to unlink / detach charts from grid data
            (see <a href="/javascript-grid-charts-chart-toolbar/#unlinking-charts">Unlinking Charts</a>).
        </li>

        <li>AG-2736 - Accessibility - Enhance support for Screen Readers with additional ARIA Roles
            (see <a href="/javascript-grid-accessibility/">Accessibility</a>).
        </li>

        <li>AG-3196 - Security - Add Section to Docs for OWASP and CSP
            (see <a href="/javascript-grid-security/">Security</a>).
        </li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_21_1_0">
    <p>Release 21.1.0 (18th July 2019)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-3002 - Charts: Add Chart Format Panel
            (see <a href="/javascript-grid-charts-chart-toolbar/#chart-format">Chart Format Panel</a>).
        </li>

        <li>
            AG-2833 - Charts: Add Area Charts
            (see <a href="/javascript-grid-charts-customisation-area/">Area Charts</a>).
        </li>

        <li>AG-1708 - Row dragging: Allow dragging between grids or between the grid and a external element
            (see <a href="/javascript-grid-drag-and-drop/">Drag & Drop</a>).
        </li>

        <li>
            AG-3012 - Master/Detail: Detail row state now kept when detail row is closed
            (see <a href="/javascript-grid-master-detail/#keeping-row-details">Keeping Detail Rows</a>).
        </li>

        <li>AG-2912 - Master/Detail: Keep detail state when scrolled out of view.</li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_21_0_0">
    <p>Release 21.0.0 (4th June 2019)</p>

    <p>Feature Highlights:</p>

    <ul>

        <li>
            AG-3008 / AG-3009 - Integrated Charts - a major new component has been added to ag-Grid which provides integrated charting from within the grid (see <a href="/javascript-grid-charts-integrated-overview/#user-created-charts">User Created Charts</a> and
            <a href="/javascript-grid-charts-integrated-overview/#application-created-charts">Application Created Charts</a>).
        </li>

        <li>
            AG-2946 - Filters Refactor - The simple provided filters (number, text, date) were part of the first
            grid release and the design was built on top of as new requirements were catered for. All the
            additional requirements made the original design difficult to maintain - the old design was
            coming to it's 'end of life'. For that reason the simple provided filters were rewritten from scratch.
            The has the benefits of a) implementing floating filters is now simpler; b) all provided filters
            now work in a more consistent way; c) code is easier to follow for anyone debugging through the
            ag-Grid code. The documentation for column filters was also rewritten from scratch to make it
            easier to follow.
        </li>

        <li>
            AG-2804 - Scroll Performance Improvements - Now when you scroll vertically the performance is vastly
            improved over the previous version of the grid. We make better use of debounced scrolling, animation
            and animation frames.
        </li>

        <li>
            AG-2999 - Change of License Messaging - Now anyone can try out ag-Grid Enterprise without needing
            a license from us. We want everyone to give ag-Grid Enterprise a trial. You only need to get in touch
            with us if you decided to start using ag-Grid inside your project.
        </li>

        <li>
            AG-2983 - Improved customisation for icons (see <a href="/javascript-grid-icons/">Custom Icons</a>).
        </li>

        <li>AG-2663 - React - Declarative Column Definitions Now Reactive.</li>
        <li>AG-2536 - React - Component Container Configurable (see <a href="/react-more-details/#control-react-components-container">Control React Components Container</a>).</li>
        <li>AG-2656 - React - Allow React Change Detection to be Configurable (see <a href="/react-more-details/#react-row-data-control">Row Data Control</a>).</li>
        <li>AG-2257 - All Frameworks - Expand & Improve Testing Documentation (see <a href="/javascript-grid-testing/">ag-Grid Testing</a>).</li>
    </ul>


    <p>Breaking Changes:</p>
    <ul>
        <li>
            AG-2946 - Number and Date Column Filters – Null Comparator is replaced with includeBlanksInEquals, includeBlanksInLessThan and includeBlanksInGreaterThan. (see <a href="/javascript-grid-filter-provided-simple/#blank-cells-date-and-number-filters">Blank Cells - Date and Number Filters</a>).
        </li>

        <li>
            AG-2946 - Floating Filters: floatingFilterParams.debounceMs is no longer a property, instead the floating filter uses the property of the same name form filterParams.
        </li>

        <li>
            AG-2946 - Custom Floating Filters – params.onParentModelChanged() is no longer used -instead you call methods on the parent filter directly. Also IFloatingFilter no longer takes generics. (see
            <a href="/javascript-grid-floating-filter-component/">Custom Floating Filters</a>).
        </li>

        <li>
            AG-2984 - Replaced all SVG icons with a WebFont (see <a href="/javascript-grid-icons/">Custom Icons</a>).
        </li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_20_2_0">
    <p>Release 20.2.0 (22nd Mar 2019)</p>

    <p>Breaking Changes:</p>
    <ul>
        <li>
            AG-1707 - Change Tree Data filtering to additionally include child nodes when parent node passes filter
            (see <a href="/javascript-grid-tree-data/#tree-data-filtering">Tree Data Filtering</a>).
        </li>
    </ul>

    <p>Feature Highlights:</p>

    <ul>
        <li>AG-2722 - Add ability to create custom filters without input filter fields, ie isNull (see <a href="/javascript-grid-filtering/#adding-custom-filter-options">Custom Filter Options</a>).
        </li>

        <li>AG-2121 - Allow column-spanning across row header groups when they belong to the same column group</li>

        <li>AG-1936 - Add the ability to change the header checkbox and the drag handle icons</li>

        <li>AG-2143 - Add new property to load the grid with the sidebar hidden</li>
    </ul>
</div>


<div class="note" style="display: none" fixVersionNote id="fix_version_20_1_0">
    <p>Release 20.1.0 (22nd Feb 2019)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>AG-1617 - <a href="https://www.ag-grid.com/javascript-grid-tooltip-component">
                Allow for Custom Tooltip Components</a></li>

        <li>AG-2166 - <a href="https://www.ag-grid.com/javascript-grid-filtering/#adding-custom-filter-options">
                Allow for defining Custom Filters that appear in Filter Option List</a></li>

        <li>AG-1049 - <a href="https://www.ag-grid.com/javascript-grid-loading-cell-renderer">
                Allow for Custom Loading Renderer Component
            </a></li>

        <li>AG-2185 - <a href="https://www.ag-grid.com/nodejs-server-side-operations">
                New Server-Side Row Model guide for Node.js with MySql</a></li>

        <li>AG-1972 - Performance improvements for small changes to large datasets</li>
        <li>AG-2289 - Better management of Column Definitions after grid is created</li>
        <li>AG-2305 - Lazy row height calculation for dynamic row heights</li>
        <li>AG-1485 - Raise events for cellKeyPress and cellKeyDown</li>
        <li>AG-2628 - Provide capability to suppress keyboard actions from the grid</li>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_20_0_0">
    <p>Release 20.0.0 (11th Jan 2019)</p>

    <p>Breaking Changes:</p>

    <ul>
        <li>
            AG-939 - The structure of Containers and Viewports has changed to improve scroll performance, so
            custom themes, will most likely need to be updated to reflect these changes.
            See <a href="/javascript-grid-styling/">Themes</a> for more information.
        </li>
        <li>
            AG-2235 - We have restructured our themes, so If you create custom themes extending
            our sass files, you will need to update the @import path.<br>
            See how to customise your themes <a href="https://github.com/ag-grid/ag-grid-customise-theme">here</a>
        </li>
        <li>
            <code>ag-grid-vue</code> now has a dependency on <code>vue-property-decorator</code>
        </li>
        <li>
            <code>ag-grid-vue</code>Event bindings are now bound with <code>@</code> instead of <code>:</code>. Please
            refer to <a href="https://www.ag-grid.com/vuejs-grid/">Configuring ag-Grid and Vue.js</a>.
        </li>
    </ul>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-1709 Server-Side Row Model - Add support for Master / Detail
            <a href="https://www.ag-grid.com/javascript-grid-server-side-model-master-detail">Server-Side Master Detail</a>.
        </li>
        <li>
            AG-2448 Add declarative support to vue component (column defs)
            <a href="https://www.ag-grid.com/vuejs-grid/#declarative_definition">Using Markup to Define Grid Definitions</a>.
        </li>
        <li>
            AG-2280 Allow event handler in Vue too support more idiomatic conventions
            <a href="https://www.ag-grid.com/vuejs-grid/#configuring-ag-grid-in-vuejs">Configuring ag-Grid in Vue</a>.
        </li>
        <li>
            AG-939 Improve horizontal and vertical scrolling in other browsers.
        </li>
    </ul>

    <p>Deprecation:</p>
    <ul>
        <li>AG-644 Refactor of sorting, filtering and resizing properties</li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_19_1_1">
    <p>Release 19.1.1 (30th Oct 2018)</p>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-904 <a href="https://www.ag-grid.com/best-polymer-data-grid/">Polymer 3 Datagrid</a>.
        </li>
        <li>
            AG-726 <a href="https://www.ag-grid.com/javascript-grid-excel/">Export to XLSX</a>.
        </li>
        <li>
            AG-1591 <a href="https://www.ag-grid.com/javascript-grid-column-definitions/#column-changes/">Allow Delta Changes to Column Definitions</a>.
        </li>
    </ul>

</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_19_0_0">
    <p>Release 19.0.0 (7th Sept 2018)</p>

    <p>Breaking Changes:</p>

    <ul>
        <li>
            The NPM package name for the free module of ag-Grid is now <code>ag-grid-community</code>
            instead of <code>ag-grid</code>. This means you install with <code>npm install ag-grid-community</code>
            and then you reference like <code>import {Grid, GridOptions} from "ag-grid-community"</code>.
        </li>
        <li>
            ag-Grid received a major overhaul of the Tool Panels in version 19.0.0. The old property 'showToolPanel' is
            no longer used and the Tool Panel is also not included by default. For more details see:
            <a href="https://www.ag-grid.com/javascript-grid-side-bar/#configuring-the-side-bar">Configuring the Side Bar</a>.
        </li>
    </ul>

    <p>Feature Highlights:</p>

    <ul>
        <li>
            AG-1201 The Status Bar is now customizable with
            <a href="https://www.ag-grid.com/javascript-grid-status-bar-component/">Custom Status Panel Components</a>.
        </li>

        <li>
            AG-1915 The Side Bar is now customizable with
            <a href="https://www.ag-grid.com/javascript-grid-tool-panel-component/">Custom Tool Panel Components</a>.
        </li>

        <li>
            AG-1914 A new <a href="https://www.ag-grid.com/javascript-grid-tool-panel-filters/">Filters Tool Panel</a>
            has been added to the Side Bar.
        </li>

        <li>
            AG-1881 Lazy load hierarchical data with
            <a href="http://localhost:8080/javascript-grid-server-side-model-tree-data/">Server-Side Tree Data</a>.
        </li>

        <li>
            AG-1961 Debounce block loading with Infinite and Server-Side Row Models using the new grid options
            property: 'blockLoadDebounceMillis'.
        </li>

        <li>
            AG-1363 columnApi.resetColumnState() can now optionally raise column based events.
        </li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_18_0_0">
    <p>Release 18.0.0 (12th Jun 2018)</p>

    <ul>
        <li>
            AG-1844
            Grid is now laid out using CSS Flex. Before this the grid had it's own layout mechanism
            called Border Layout. This had the following disadvantages:
            <ul>
                <li>
                    The grid had a timer (layout interval) where every 500ms it was checking the width and
                    height of the grid and then laying out contents again if the width or height changed.
                </li>
                <li>
                    Extra DIV elements were required for the layout.
                </li>
            </ul>
            The new mechanism no longer uses the layout interval so the grid is no longer polling every 500ms.
            The DOM is also now cleaner as the extra div's associated with the border layout are now gone.
        </li>
        <li>
            AG-1807
            New strategy for <a href="../javascript-grid-for-print/">Printing</a> using auto-height.
        </li>
        <li>
            AG-1350
            Added support for <a href="../javascript-grid-row-spanning/">Row Spanning</a>.
        </li>
        <li>
            AG-1768
            Now possible to switch between <a href="https://www.ag-grid.com/javascript-grid-width-and-height/#auto-height">Auto Height</a>
            and Normal Height dynamically.
        </li>
        <li>
            AG-678
            <a href="https://www.ag-grid.com/javascript-grid-grouping/#grouping-footers">Grouping Footers</a> now provides an option for
            a 'grand' total across all groups.
        </li>
        <li>
            AG-1793
            When in pivot mode you can now include <a href="https://www.ag-grid.com/javascript-grid-pivoting/#pivotRowTotals">Pivot Row Totals</a>
        </li>
        <li>
            AG-1569
            To help clarify Row Model usage, we have renamed as follows:
            <ul>
                <li>In-Memory Row Model -> <a href="https://www.ag-grid.com/javascript-grid-client-side-model/">Client-Side Row Model</a></li>
                <li>Enterprise Row Model -> <a href="https://www.ag-grid.com/javascript-grid-server-side-model/">Server-Side Row Model</a></li>
            </ul>
        </li>
        <li>
            AG-865
            The Server-Side Row Model now preserves group state after sorting has been performed.
        </li>
        <li>
            <p>AG-424
                Text, Number and Date filters now support two filter conditions instead of just one. The user through the UI
                can decide which sort of logic to apply: 'AND'/'OR'</p>

            <p>This also means that the model for the filter changes when two conditions are applied.</p>

            <p>The ability to add an additional filter condition can be suppressed with
                <code>filterParams.suppressAndOrCondition = true</code></p>

            <p>The documentation of each filter has been updated to reflect these changes accordingly:

            <ul>
                <li><a href="../javascript-grid-filter-text/">text filter</a></li>
                <li><a href="../javascript-grid-filter-number/">number filter</a></li>
                <li><a href="../javascript-grid-filter-date/">date filter</a></li>
            </ul></p>
        </li>
    </ul>
</div>

<div class="note" style="display: none" fixVersionNote id="fix_version_17_1_0">
    <p>Release 17.1.0 (13th Apr 2018)</p>

    <ul>
        <li>
            AG-1730
            Deprecate <a href="../javascript-grid-for-print">for print</a>, the same functionality can be achieved with
            <a href="../javascript-grid-width-and-height/#autoHeight">domLayout: 'autoHeight'</a>
        </li>
        <li>
            AG-1626 – <a href="../javascript-grid-filter-quick/">Quick filter</a> now filters
            using multiple words, eg search for “Tony Ireland” to bring back all rows with “Tony” in the name column and
            “Ireland” in the country column.
        </li>
        <li>
            AG-1405 – Support for <a href="https://www.ag-grid.com/javascript-grid-row-height/#auto-row-height">
                automatic text wrapping</a>.
        </li>
        <li>
            AG-1682 - New guides for connecting
            <a href="../oracle-server-side-operations/">Enterprise Row Model to Oracle</a> and
            <a href="../spark-server-side-operations/">Enterprise Row Model to Apache Spark</a>.
        </li>
        <li>
            AG-1675 – BREAKING CHANGE - The
            <a href="../javascript-grid-filter-set/#set-filter-model">set filter model</a>
            was changed to be consistent with other filter models. For backwards compatibility,
            this change can be toggled off using the grid property
            <code>enableOldSetFilterModel</code>. Both models will be supported for releases for
            the next 6 months. After this one major ag-Grid release will have the old model
            deprecated and then the following release will have it dropped.
        </li>
    </ul>
</div>

<!-- For testing purposes only -->
<!--<div class="note" style="display: none" fixVersionNote id="fix_version_16_0_0">
    <p>Release Notes for Version 16.0.0</p>

    <p>Blah blah blah</p>
</div>
<div class="note" style="display: none" fixVersionNote id="fix_version_15_0_0">
    <p>Release Notes for Version 15.0.0</p>

    <p>Blah blah blah</p>
</div>-->
