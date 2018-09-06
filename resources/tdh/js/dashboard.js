App = function() {
    "use strict";
    return App.charts = function() {
        function t() {
            return Math.floor(31 * Math.random()) + 10
        }

        function e(t, e) {
            $("#" + t).bind("plothover", function(t, a, i) {
                var r = $(".tooltip-chart").width();
                i ? $(".tooltip-chart").css({
                    top: i.pageY - e,
                    left: i.pageX - r / 2
                }).fadeIn(200) : $(".tooltip-chart").hide()
            })
        }
        var a, i, r, o, n, l, s, c, d, p, h, u, g, f, m, b;
        a = App.color.primary, $.plot($("#line-chart3"), [{
            data: [
                [0, 12],
                [1, 12.5],
                [2, 15],
                [3, 20],
                [4, 30],
                [5, 60]
            ],
            label: "Page Views"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 2,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .25
                        }, {
                            opacity: .25
                        }]
                    }
                },
                points: {
                    show: !0,
                    radius: 5,
                    lineWidth: 3
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                margin: {
                    left: 23,
                    right: 30,
                    top: 20,
                    botttom: 40
                },
                labelMargin: 15,
                axisMargin: 500,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.05)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [a],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                ticks: 3,
                max: 60,
                tickSize: 20,
                tickDecimals: 0
            }
        }), e("line-chart3", 70), i = App.color.primary, $.plot($("#bar-chart2"), [{
            data: [
                [0, 7],
                [1, 30],
                [2, 17],
                [3, 20],
                [4, 26],
                [5, 37],
                [6, 35],
                [7, 28],
                [8, 38],
                [9, 38],
                [10, 32]
            ],
            label: "Page Views"
        }], {
            series: {
                bars: {
                    order: 2,
                    align: "center",
                    show: !0,
                    lineWidth: 1,
                    barWidth: .6,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                shadowSize: 2
            },
            legend: {
                show: !1
            },
            grid: {
                margin: {
                    left: 23,
                    right: 30,
                    top: 20,
                    botttom: 40
                },
                labelMargin: 10,
                axisMargin: 200,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.05)",
                borderWidth: 1,
                borderColor: "rgba(0,0,0,0.0)"
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [i],
            xaxis: {
                ticks: 11,
                tickSize: 1,
                tickDecimals: 0,
                tickColor: "rgba(0,0,0,0.0)"
            },
            yaxis: {
                ticks: 4,
                tickDecimals: 0
            }
        }), e("bar-chart2", 60), r = App.color.primary, $.plot($("#line-chart1"), [{
            data: [
                [0, 20],
                [1, 30],
                [2, 25],
                [3, 39],
                [4, 35],
                [5, 40],
                [6, 30],
                [7, 45]
            ],
            label: "Page Views"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .35
                        }, {
                            opacity: .35
                        }]
                    }
                },
                points: {
                    show: !1
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                margin: {
                    left: -8,
                    right: -8,
                    top: 0,
                    bottom: 0
                },
                show: !1,
                labelMargin: 15,
                axisMargin: 500,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.15)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [r],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 4,
                tickDecimals: 0
            }
        }), e("line-chart1", 45), o = tinycolor(App.color.primary).brighten(9).toString(), n = tinycolor(App.color.primary).lighten(15).toString(), l = tinycolor(App.color.primary).lighten(20).toString(), s = tinycolor(App.color.primary).lighten(27).toString(), $.plot("#pie-chart4", [{
            label: "Linux",
            data: 45
        }, {
            label: "Windows",
            data: 25
        }, {
            label: "Mac OS",
            data: 20
        }, {
            label: "Android",
            data: 10
        }], {
            series: {
                pie: {
                    show: !0,
                    innerRadius: .35,
                    shadow: {
                        top: 5,
                        left: 15,
                        alpha: .3
                    },
                    stroke: {
                        width: 0
                    },
                    label: {
                        show: !0,
                        formatter: function(t, e) {
                            return '<div style="font-size:12px;text-align:center;padding:2px;color:#333;">' + t + "</div>"
                        }
                    },
                    highlight: {
                        opacity: .08
                    }
                }
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart arrow-none'> <div class='label'> <div class='label-x'> %x.0% </div> </div></div>",
                defaultTheme: !1
            },
            grid: {
                hoverable: !0,
                clickable: !0
            },
            colors: [o, n, l, s],
            legend: {
                show: !1
            }
        }), c = tinycolor(App.color.primary).lighten(25).toString(), d = tinycolor(App.color.primary).brighten(3).toString(), $.plot($("#bar-chart1"), [{
            data: [
                [0, 20],
                [1, 30],
                [2, 19],
                [3, 28],
                [4, 30],
                [5, 37],
                [6, 35],
                [7, 38],
                [8, 48]
            ],
            label: "Page Views"
        }, {
            data: [
                [0, 10],
                [1, 20],
                [2, 15],
                [3, 23],
                [4, 24],
                [5, 29],
                [6, 25],
                [7, 33],
                [8, 35]
            ],
            label: "Unique Visitor"
        }], {
            series: {
                bars: {
                    align: "center",
                    show: !0,
                    lineWidth: 1,
                    barWidth: .6,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                shadowSize: 2
            },
            legend: {
                show: !1
            },
            grid: {
                margin: 0,
                show: !1,
                labelMargin: 10,
                axisMargin: 500,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.15)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [c, d],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 4,
                tickDecimals: 0
            }
        }), e("bar-chart1", 60), p = tinycolor(App.color.primary).lighten(7).toString(), h = App.color.primary, $.plot("#linechart-mini1", [{
            data: [
                [1, 10],
                [2, 60],
                [3, 40],
                [4, 50],
                [5, 30]
            ],
            canvasRender: !0
        }, {
            data: [
                [1, 30],
                [2, 40],
                [3, 25],
                [4, 40],
                [5, 65]
            ],
            canvasRender: !0
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .7
                        }, {
                            opacity: .7
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                shadowSize: 0,
                curvedLines: {
                    apply: !0,
                    active: !0,
                    monotonicFit: !0
                }
            },
            legend: {
                show: !1
            },
            grid: {
                show: !1,
                hoverable: !0,
                clickable: !0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [p, h],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 5,
                tickDecimals: 0
            }
        }), e("linechart-mini1", 45),
            function() {
                var t = App.color.primary,
                    a = [],
                    i = 100;

                function r() {
                    for (a.length > 0 && (a = a.slice(1)); a.length < i;) {
                        var t = (a.length > 0 ? a[a.length - 1] : 50) + 10 * Math.random() - 5;
                        t < 0 ? t = 0 : t > 100 && (t = 100), a.push(t)
                    }
                    for (var e = [], r = 0; r < a.length; ++r) e.push([r, a[r]]);
                    return e
                }
                var o = 500,
                    n = $.plot("#live-data", [r()], {
                        series: {
                            shadowSize: 0,
                            lines: {
                                show: !0,
                                lineWidth: 1,
                                fill: !0,
                                fillColor: {
                                    colors: [{
                                        opacity: .2
                                    }, {
                                        opacity: .2
                                    }]
                                }
                            }
                        },
                        grid: {
                            show: !0,
                            margin: {
                                top: 3,
                                bottom: 0,
                                left: 0,
                                right: 0
                            },
                            labelMargin: 0,
                            axisMargin: 0,
                            hoverable: !0,
                            clickable: !0,
                            tickColor: "rgba(0,0,0,0)",
                            borderWidth: 0,
                            minBorderMargin: 0
                        },
                        tooltip: {
                            show: !0,
                            cssClass: "tooltip-chart",
                            content: "<div class='content-chart'> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                            defaultTheme: !1
                        },
                        colors: [t],
                        yaxis: {
                            show: !1,
                            autoscaleMargin: .2,
                            ticks: 5,
                            tickDecimals: 0
                        },
                        xaxis: {
                            show: !1,
                            autoscaleMargin: 0
                        }
                    });
                e("live-data", 45),
                    function t() {
                        n.setData([r()]), n.draw(), setTimeout(t, o)
                    }()
            }(), u = tinycolor(App.color.primary).lighten(22), g = App.color.primary, f = [
            [1, t()],
            [2, t()],
            [3, 2 + t()],
            [4, 3 + t()],
            [5, 5 + t()],
            [6, 10 + t()],
            [7, 15 + t()],
            [8, 20 + t()],
            [9, 25 + t()],
            [10, 30 + t()],
            [11, 35 + t()],
            [12, 25 + t()],
            [13, 15 + t()],
            [14, 20 + t()],
            [15, 45 + t()],
            [16, 50 + t()],
            [17, 65 + t()],
            [18, 70 + t()],
            [19, 85 + t()],
            [20, 80 + t()],
            [21, 75 + t()],
            [22, 80 + t()],
            [23, 75 + t()]
        ], m = [
            [1, t()],
            [2, t()],
            [3, 10 + t()],
            [4, 15 + t()],
            [5, 20 + t()],
            [6, 25 + t()],
            [7, 30 + t()],
            [8, 35 + t()],
            [9, 40 + t()],
            [10, 45 + t()],
            [11, 50 + t()],
            [12, 55 + t()],
            [13, 60 + t()],
            [14, 70 + t()],
            [15, 75 + t()],
            [16, 80 + t()],
            [17, 85 + t()],
            [18, 90 + t()],
            [19, 95 + t()],
            [20, 100 + t()],
            [21, 110 + t()],
            [22, 120 + t()],
            [23, 130 + t()]
        ], $.plot($("#line-chart-live"), [{
            data: m,
            showLabels: !0,
            label: "New Visitors",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: f,
            showLabels: !0,
            label: "Old Visitors",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 1.5,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .5
                        }, {
                            opacity: .5
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                points: {
                    show: !1,
                    fill: !0
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                show: !1,
                margin: {
                    top: -20,
                    bottom: 0,
                    left: 0,
                    right: 0
                },
                labelMargin: 0,
                axisMargin: 0,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0)",
                borderWidth: 0,
                minBorderMargin: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [u, g],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .2,
                ticks: 5,
                tickDecimals: 0
            }
        }), e("line-chart-live", 60), b = App.color.primary, $("#line-chart2"), $.plot("#line-chart2", [{
            data: [
                [1, 40],
                [2, 30],
                [3, 55],
                [4, 36],
                [5, 57],
                [6, 50],
                [7, 65],
                [8, 50],
                [9, 80],
                [10, 70]
            ],
            showLabels: !0,
            label: "New Visitors",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 2,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .35
                        }, {
                            opacity: .35
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                points: {
                    show: !0,
                    fill: !0,
                    radius: 4,
                    fillColor: b
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                show: !1,
                margin: {
                    left: -8,
                    right: -8,
                    top: 0,
                    botttom: 0
                },
                labelMargin: 0,
                axisMargin: 0,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0, 0, 0, 0)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [b],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 5,
                tickDecimals: 0
            }
        }), e("line-chart2", 60)
    }, App
}(), App = function() {
    "use strict";
    return App.dashboard = function() {
        function t(t, e) {
            $("#" + t).bind("plothover", function(t, a, i) {
                var r = $(".tooltip-chart").width();
                i ? $(".tooltip-chart").css({
                    top: i.pageY - e,
                    left: i.pageX - (r / 2 - 2)
                }).fadeIn(200) : $(".tooltip-chart").hide()
            })
        }
        var e, a, i, r, o, n, l, s, c, d, p;
        e = App.color.primary, a = tinycolor(App.color.primary).brighten(5).saturate(15), i = tinycolor(App.color.primary).brighten(15).saturate(15), $.plot($("#develop-chart"), [{
            data: [
                [1, 25],
                [2, 10],
                [3, 10],
                [4, 15],
                [5, 0],
                [6, 47],
                [7, 65],
                [8, 10]
            ],
            showLabels: !0,
            label: "Pedia",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: [
                [1, 20],
                [2, 25],
                [3, 30],
                [4, 35],
                [5, 55],
                [6, 42],
                [7, 15],
                [8, 25]
            ],
            showLabels: !0,
            label: "Internal Medicine",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: [
                [1, 10],
                [2, 30],
                [3, 25],
                [4, 30],
                [5, 35],
                [6, 15],
                [7, 10],
                [8, 15]
            ],
            showLabels: !0,
            label: "Surgery",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: [
                [1, 3],
                [2, 4],
                [3, 5],
                [4, 34],
                [5, 3],
                [6, 7],
                [7, 24],
                [8, 23]
            ],
            showLabels: !0,
            label: "OB",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: [
                [1, 23],
                [2, 3],
                [3, 22],
                [4, 34],
                [5, 33],
                [6, 12],
                [7, 4],
                [8, 15]
            ],
            showLabels: !0,
            label: "Dental",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: [
                [1, 0],
                [2, 3],
                [3, 4],
                [4, 1],
                [5, 7],
                [6, 3],
                [7, 9],
                [8, 2]
            ],
            showLabels: !0,
            label: "Animal Bite",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: .5,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                points: {
                    show: !1,
                    fill: !0
                },
                shadowSize: 0
            },
            legend: {
                show: !0,
                position: "nw",
                noColumns: 0,
                background: "green",
                container: $("#develop-chart-legend")
            },
            grid: {
                show: !1,
                margin: {
                    top: -20,
                    bottom: 0,
                    left: 0,
                    right: 0
                },
                labelMargin: 0,
                axisMargin: 0,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0)",
                borderWidth: 0,
                minBorderMargin: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [e, a, i],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .2,
                ticks: 5,
                tickDecimals: 0
            }
        }), t("develop-chart", 65), $('[data-toggle="counter"]').each(function(t, e) {
            var a = $(this),
                i = "",
                r = "",
                o = 0,
                n = 0,
                l = 0,
                s = 2.5;
            a.data("prefix") && (i = a.data("prefix")), a.data("suffix") && (r = a.data("suffix")), a.data("start") && (o = a.data("start")), a.data("end") && (n = a.data("end")), a.data("decimals") && (l = a.data("decimals")), a.data("duration") && (s = a.data("duration")), new CountUp(a.get(0), o, n, l, s, {
                suffix: r,
                prefix: i
            }).start()
        }), r = App.color.primary, $.plot($("#week-chart"), [{
            data: [
                [1, 25],
                [1.5, 25],
                [1.8, 29],
                [2, 27],
                [3, 37],
                [3.3, 33],
                [3.6, 40],
                [3.8, 43],
                [4, 57],
                [4.7, 62],
                [5.2, 56],
                [5.6, 64],
                [6, 65],
                [6.3, 70],
                [6.5, 65],
                [6.7, 67],
                [7, 30]
            ],
            label: "Page Views"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 4,
                    fill: !1
                },
                points: {
                    show: !1
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                margin: {
                    left: 30,
                    right: 30,
                    top: 20,
                    botttom: 40
                },
                labelMargin: 0,
                axisMargin: 500,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.15)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [r],
            xaxis: {
                min: 1,
                max: 7,
                mode: "time",
                ticks: [
                    [1, "Sun"],
                    [2, "Mon"],
                    [3, "Tue"],
                    [4, "Wed"],
                    [5, "Thu"],
                    [6, "Fri"],
                    [7, "Sat"]
                ],
                timeformat: "%a"
            },
            yaxis: {
                tickFormatter: function() {
                    return ""
                },
                min: 0,
                max: 80,
                ticks: 8
            }
        }), t("week-chart", 65), o = tinycolor(App.color.primary).brighten(9).toString(), n = tinycolor(App.color.primary).lighten(13).toString(), l = tinycolor(App.color.primary).lighten(20).toString(), s = tinycolor(App.color.primary).lighten(27).toString(), $.plot("#users-chart", [{
            data: 3,
            label: "Child"
        }, {
            data: 7,
            label: "Adolescence"
        }, {
            data: 6,
            label: "Young Adult"
        }, {
            data: 7,
            label: "Middle-Age"
        }, {
            data: 10,
            label: "Older Adult"
        }], {
            series: {
                pie: {
                    show: !0,
                    innerRadius: .7,
                    shadow: {
                        top: 5,
                        left: 15,
                        alpha: .3
                    },
                    stroke: {
                        width: 0
                    },
                    label: {
                        show: !1,
                        formatter: function(t, e) {
                            return '<div style="font-size:12px;text-align:center;padding:2px;color:#333;">' + t + "</div>"
                        }
                    },
                    highlight: {
                        opacity: .08
                    }
                }
            },
            grid: {
                hoverable: !0,
                clickable: !0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart arrow-none'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0% </div> </div></div>",
                defaultTheme: !1
            },
            colors: [o, n, l, s],
            legend: {
                show: !1
            }
        }), c = tinycolor(App.color.primary).lighten(7).toString(), d = App.color.primary, $.plot("#ads-chart", [{
            data: [
                [1, 60],
                [2, 90],
                [3, 35],
                [4, 70],
                [5, 40]
            ],
            canvasRender: !0,
            showLabels: !0,
            label: "Child",
            labelPlacement: "below"
        }, {
            data: [
                [1, 0],
                [2, 30],
                [3, 80],
                [4, 30],
                [5, 65]
            ],
            canvasRender: !0,
            showLabels: !0,
            label: "Adolescence",
            labelPlacement: "below"
        }, {
            data: [
                [1, 0],
                [2, 50],
                [3, 30],
                [4, 60],
                [5, 95]
            ],
            canvasRender: !0,
            showLabels: !0,
            label: "Young Adult",
            labelPlacement: "below"
        }, {
            data: [
                [1, 0],
                [2, 50],
                [3, 30],
                [4, 60],
                [5, 95]
            ],
            canvasRender: !0,
            showLabels: !0,
            label: "Middle-Age",
            labelPlacement: "below"
        }, {
            data: [
                [1, 0],
                [2, 50],
                [3, 30],
                [4, 60],
                [5, 95]
            ],
            canvasRender: !0,
            showLabels: !0,
            label: "Older Adult",
            labelPlacement: "below"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                shadowSize: 0,
                curvedLines: {
                    apply: !0,
                    active: !0,
                    monotonicFit: !0
                }
            },
            legend: {
                show: !0,
                position: "nw",
                background: "green",
                container: $("#ads-chart-legend")
            },
            grid: {
                show: !1,
                hoverable: !0,
                clickable: !0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [c, d],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 5,
                tickDecimals: 0
            }
        }), t("ads-chart", 65), p = tinycolor(App.color.light).darken(15).toString(), $.plot("#earnings-chart", [{
            data: [
                [1, 40],
                [2, 60],
                [3, 30],
                [4, 80],
                [5, 60]
            ],
            canvasRender: !0,
            showLabels: !1
        }], {
            series: {
                lines: {
                    show: !0,
                    fill: !0,
                    lineWidth: 4,
                    fillColor: {
                        colors: [{
                            opacity: .4
                        }, {
                            opacity: .4
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                shadowSize: 0,
                curvedLines: {
                    apply: !0,
                    active: !0,
                    monotonicFit: !0
                }
            },
            legend: {
                show: !1
            },
            grid: {
                show: !1,
                hoverable: !0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [p],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11
            },
            yaxis: {
                ticks: 9
            }
        }), t("earnings-chart", 45)
    }, App
}();