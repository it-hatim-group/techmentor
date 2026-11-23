$(function () {
    "use strict";
    var e = {
        series: [
            {
                name: "Sessions",
                data: [14, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5],
            },
        ],
        chart: {
            foreColor: "#9ba7b2",
            height: 310,
            type: "area",
            zoom: {
                enabled: !1,
            },
            toolbar: {
                show: !0,
            },
            dropShadow: {
                enabled: !0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: 0.1,
            },
        },
        stroke: {
            width: 5,
            curve: "smooth",
        },
        xaxis: {
            //type: "datetime",
            categories: [
                "JAN",
                "FEB",
                "MAR",
                "APR",
                "MAY",
                "JUN",
                "JUL",
                "AUG",
                "SEP",
                "OCT",
                "NOV",
                "DEC",
            ],
        },
        title: {
            text: "Sessions",
            align: "left",
            style: {
                fontSize: "16px",
                color: "#666",
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                gradientToColors: ["#0d6efd"],
                shadeIntensity: 1,
                type: "vertical",
                opacityFrom: 0.7,
                opacityTo: 0.2,
                stops: [0, 100, 100, 100],
            },
        },
        markers: {
            size: 5,
            colors: ["#0d6efd"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7,
            },
        },
        dataLabels: {
            enabled: !1,
        },
        colors: ["#0d6efd"],
        grid: {
            show: true,
            borderColor: "rgba(0, 0, 0, 0.15)",
            strokeDashArray: 4,
        },
    };
});
