<?php
//header('Content-Type: application/json; charset=utf-8');
function my_json_decode($s) {
    $s = str_replace(
        array('"',  "'"),
        array('\"', '"'),
        $s
    );
    $s = preg_replace('/(\w+):/i', '"\1":', $s);
    return json_decode(sprintf('{%s}', $s));
}
$jsondata = my_json_decode('{
    series: [{
        name: "2021",
        data: [18, 7, 15, 29, 18, 12, 9]
    }, {
        name: "2020",
        data: [-13, -18, -9, -14, -5, -17, -15]
    }],
    chart: {
        height: 300,
        stacked: !0,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "33%",
            borderRadius: 12,
            startingShape: "rounded",
            endingShape: "rounded"
        }
    },
    colors: [config.colors.primary, config.colors.info],
    dataLabels: {
        enabled: !1
    },
    stroke: {
        curve: "smooth",
        width: 6,
        lineCap: "round",
        colors: [o]
    },
    legend: {
        show: !0,
        horizontalAlign: "left",
        position: "top",
        markers: {
            height: 8,
            width: 8,
            radius: 12,
            offsetX: -3
        },
        labels: {
            colors: e
        },
        itemMargin: {
            horizontal: 10
        }
    },
    grid: {
        borderColor: s,
        padding: {
            top: 0,
            bottom: -8,
            left: 20,
            right: 20
        }
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        labels: {
            style: {
                fontSize: "13px",
                colors: e
            }
        },
        axisTicks: {
            show: !1
        },
        axisBorder: {
            show: !1
        }
    },
    yaxis: {
        labels: {
            style: {
                fontSize: "13px",
                colors: e
            }
        }
    },
    responsive: [{
        breakpoint: 1700,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "32%"
                }
            }
        }
    }, {
        breakpoint: 1580,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "35%"
                }
            }
        }
    }, {
        breakpoint: 1440,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "42%"
                }
            }
        }
    }, {
        breakpoint: 1300,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "48%"
                }
            }
        }
    }, {
        breakpoint: 1200,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "40%"
                }
            }
        }
    }, {
        breakpoint: 1040,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 11,
                    columnWidth: "48%"
                }
            }
        }
    }, {
        breakpoint: 991,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "30%"
                }
            }
        }
    }, {
        breakpoint: 840,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "35%"
                }
            }
        }
    }, {
        breakpoint: 768,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "28%"
                }
            }
        }
    }, {
        breakpoint: 640,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "32%"
                }
            }
        }
    }, {
        breakpoint: 576,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "37%"
                }
            }
        }
    }, {
        breakpoint: 480,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "45%"
                }
            }
        }
    }, {
        breakpoint: 420,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "52%"
                }
            }
        }
    }, {
        breakpoint: 380,
        options: {
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "60%"
                }
            }
        }
    }],
    states: {
        hover: {
            filter: {
                type: "none"
            }
        },
        active: {
            filter: {
                type: "none"
            }
        }
    }
}');

var_dump($jsondata);

?>