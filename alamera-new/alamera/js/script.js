// Add the CROs
$(function() {

    $(".mapcontainer").mapael({
        map: {
            name: "world_countries",
            zoom: {
                enabled: true
            },
            defaultArea: {
                attrs: {
                    fill: "#EEE",
                    stroke: "#232323",
                    "stroke-width": 0.3
                },
                attrsHover: {
                    animDuration: 0
                },
                text: {
                    attrs: {
                        cursor: "pointer",
                        "font-size": 10,
                        fill: "#000"
                    },
                    attrsHover: {
                        animDuration: 0
                    }
                },
                eventHandlers: {
                    click: function(e, id, mapElem, textElem) {
                        var newData = {
                            'areas': {}
                        };
                        if (mapElem.originalAttrs.fill == "#5ba4ff") {
                            newData.areas[id] = {
                                attrs: {
                                    fill: "#eee"
                                }
                            };
                        } else {
                            newData.areas[id] = {
                                attrs: {
                                    fill: "#5ba4ff"
                                }
                            };
                        }
                        $(".mapcontainer").trigger('update', [{
                            mapOptions: newData
                        }]);
                    }
                }
            }

        },
        areas: {
            "department-29": {

                eventHandlers: {
                    click: function() {},
                    dblclick: function(e, id, mapElem, textElem) {
                        var newData = {
                            'areas': {}
                        };
                        if (mapElem.originalAttrs.fill == "#5ba4ff") {
                            newData.areas[id] = {
                                attrs: {
                                    fill: "#0088db"
                                }
                            };
                        } else {
                            newData.areas[id] = {
                                attrs: {
                                    fill: "#5ba4ff"
                                }
                            };
                        }
                        $(".mapcontainer").trigger('update', [{
                            mapOptions: newData
                        }]);
                    }
                }
            }
        }
    });
});