// Type definitions for @ag-grid-community/core v24.0.0
// Project: http://www.ag-grid.com/
// Definitions by: Niall Crosby <https://github.com/ag-grid/>
import { LoggerFactory } from "./logger";
import { SideBarDef } from "./entities/sideBar";
import { IToolPanel } from "./interfaces/iToolPanel";
import { ManagedFocusComponent } from "./widgets/managedFocusComponent";
export declare class GridCore extends ManagedFocusComponent {
    private gridOptions;
    private gridOptionsWrapper;
    private rowModel;
    private resizeObserverService;
    private rowRenderer;
    private filterManager;
    private eGridDiv;
    private $scope;
    private quickFilterOnScope;
    private popupService;
    private columnController;
    loggerFactory: LoggerFactory;
    private columnApi;
    private gridApi;
    private clipboardService;
    private gridPanel;
    private sideBarComp;
    private eRootWrapperBody;
    private doingVirtualPaging;
    private logger;
    constructor();
    protected postConstruct(): void;
    getFocusableElement(): HTMLElement;
    private createTemplate;
    protected getFocusableContainers(): HTMLElement[];
    focusNextInnerContainer(backwards: boolean): boolean;
    focusInnerElement(fromBottom?: boolean): boolean;
    private focusGridHeader;
    private onGridSizeChanged;
    private addRtlSupport;
    getRootGui(): HTMLElement;
    isSideBarVisible(): boolean;
    setSideBarVisible(show: boolean): void;
    setSideBarPosition(position: 'left' | 'right'): void;
    closeToolPanel(): void;
    getSideBar(): SideBarDef;
    getToolPanelInstance(key: string): IToolPanel | undefined;
    refreshSideBar(): void;
    setSideBar(def: SideBarDef | string | boolean): void;
    getOpenedToolPanel(): string;
    openToolPanel(key: string): void;
    isToolPanelShowing(): boolean;
    protected destroy(): void;
    ensureNodeVisible(comparator: any, position?: string | null): void;
    protected onTabKeyDown(): void;
}
