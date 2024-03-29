import "./bootstrap";

import Chart from "chart.js/auto";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const voutCtx = document.getElementById("vout").getContext("2d");
    new Chart(voutCtx, {
        type: "line",
        data: {
            labels: Array.from({ length: voutData.length }, (_, i) => i + 1),
            datasets: [
                {
                    label: "VOUT value",
                    data: voutData,
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                    fill: false,
                    pointRadius: 0,
                },
            ],
        },
        options: {
            scales: {
                x: {
                    type: "linear",
                    position: "bottom",
                },
            },
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const positionCtx = document.getElementById("position").getContext("2d");
    new Chart(positionCtx, {
        type: "line",
        data: {
            labels: Array.from({ length: pvalue.length }, (_, i) => i + 1),
            datasets: [
                {
                    label: "P value",
                    data: pvalue,
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                    fill: false,
                    pointRadius: 0,
                },
            ],
        },
        options: {
            scales: {
                x: {
                    type: "linear",
                    position: "bottom",
                },
            },
        },
    });
});
// buat grafik