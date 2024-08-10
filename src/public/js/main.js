/* global Chart, coreui */

/**
 * --------------------------------------------------------------------------
 * CoreUI Boostrap Admin Template main.js
 * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
 * --------------------------------------------------------------------------
 */

// Disable the on-canvas tooltip
Chart.defaults.pointHitDetectionRadius = 1;
Chart.defaults.plugins.tooltip.enabled = false;
Chart.defaults.plugins.tooltip.mode = "index";
Chart.defaults.plugins.tooltip.position = "nearest";
Chart.defaults.plugins.tooltip.external = coreui.ChartJS.customTooltips;
Chart.defaults.defaultFontColor = coreui.Utils.getStyle("--cui-body-color");
document.documentElement.addEventListener("ColorSchemeChange", () => {
    mainChart.options.scales.x.grid.color = coreui.Utils.getStyle(
        "--cui-border-color-translucent"
    );
    mainChart.options.scales.x.ticks.color =
        coreui.Utils.getStyle("--cui-body-color");
    mainChart.options.scales.y.border.color = coreui.Utils.getStyle(
        "--cui-border-color-translucent"
    );
    mainChart.options.scales.y.grid.color = coreui.Utils.getStyle(
        "--cui-border-color-translucent"
    );
    mainChart.options.scales.y.ticks.color =
        coreui.Utils.getStyle("--cui-body-color");
    mainChart.update();
});
const random = (min, max) =>
    // eslint-disable-next-line no-mixed-operators
    Math.floor(Math.random() * (max - min + 1) + min);

//# sourceMappingURL=main.js.map
