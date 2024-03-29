var MapsVector = function () {

    var setMap = function () {
        var data = {
            map: 'world_mill_en',
            backgroundColor: null,
            borderColor: '#333333',
            borderOpacity: 0.5,
            borderWidth: 1,
            color: '#c6c6c6',
            enableZoom: true,
            hoverColor: '#c9dfaf',
            hoverOpacity: null,
            values: sample_data,
            normalizeFunction: 'linear',
            scaleColors: ['#b6da93', '#427d1a'],
            selectedColor: '#c9dfaf',
            selectedRegion: null,
            showTooltip: true,
            onRegionOver: function (event, code) {
                //sample to interact with map
                if (code == 'ca') {
                    event.preventDefault();
                }
            },
            onRegionClick: function (element, code, region) {
                //sample to interact with map
                var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                alert(message);
            }
        };

        //data.map = name + '_en';
        var map = jQuery('#vmap_world');
        if (!map) {
            return;
        }
        //map.width();
        console.log(map.parent().width());
        map.vectorMap(data);
    }


    return {
        //main function to initiate map samples
        init: function () {
            setMap();

            // redraw maps on window or content resized 
            Metronic.addResizeHandler(function(){
                setMap();
            });
        }

    };

}();