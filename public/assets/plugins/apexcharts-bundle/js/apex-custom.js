$(function () {
    "use strict";
    // chart 1
    var options = {
        series: [
            {
                name: "Likes",
                data: [14, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5],
            },
        ],
        chart: {
            foreColor: "#9ba7b2",
            height: 360,
            type: "line",
            zoom: {
                enabled: false,
            },
            toolbar: {
                show: true,
            },
            dropShadow: {
                enabled: true,
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
            type: "datetime",
            categories: [
                "1/11/2000",
                "2/11/2000",
                "3/11/2000",
                "4/11/2000",
                "5/11/2000",
                "6/11/2000",
                "7/11/2000",
                "8/11/2000",
                "9/11/2000",
                "10/11/2000",
                "11/11/2000",
                "12/11/2000",
            ],
        },
        title: {
            text: "Line Chart",
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
                gradientToColors: ["#f41127"],
                shadeIntensity: 1,
                type: "horizontal",
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100],
            },
        },
        markers: {
            size: 4,
            colors: ["#f41127"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7,
            },
        },
        colors: ["#f41127"],
        yaxis: {
            title: {
                text: "Engagement",
            },
        },
    };
});
