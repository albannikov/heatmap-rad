


    console.log('test');
    
    

/**
 * Get map points from backend
 * @returns {Promise}
 */
async function fetchData() {
    const response = await fetch('data.php');
    const json = await response.json();
    return json;
}

async function fetchNewData() {
    const response = await fetch('datacopy.php');
    const json = await response.json();
    return json;
}

ymaps.ready(async function () {
    var map = new ymaps.Map('YMapsID', {
        center: [62.134265, 77.458448],
        controls: ['zoomControl', 'typeSelector',  'fullscreenControl'],
        zoom: 12, type: 'yandex#map'
        // 'yandex#map' - тип карты "схема";
        // 'yandex#satellite' - тип карты "спутник";
        // 'yandex#hybrid' - тип карты "гибрид".
    }),

    buttons = {
        dissipating: new ymaps.control.Button({
            data: {
                content: 'Рассеивание'
            },
            options: {
                selectOnClick: false,
                maxWidth: 150
            }
        }),
        opacity: new ymaps.control.Button({
            data: {
                content: 'Прозрачность заливки'
            },
            options: {
                selectOnClick: false,
                maxWidth: 200
            }
        }),
        radius: new ymaps.control.Button({
            data: {
                content: 'Радиус'
            },
            options: {
                selectOnClick: false,
                maxWidth: 150
            }
        }),
        gradient: new ymaps.control.Button({
            data: {
                content: 'Инверсия цветов'
            },
            options: {
                selectOnClick: false,
                maxWidth: 150
            }
        }),
        heatmap: new ymaps.control.Button({
            data: {
                content: 'Показать | скрыть'
            },
            options: {
                selectOnClick: false,
                maxWidth: 150
            }
        })
    },

    gradients = [{
        0.1: 'rgba(128, 255, 0, 0.7)',
        0.2: 'rgba(255, 255, 0, 0.8)',
        0.7: 'rgba(234, 72, 58, 0.9)',
        1.0: 'rgba(162, 36, 25, 1)'
    }, {
        0.1: 'rgba(162, 36, 25, 0.7)',
        0.2: 'rgba(234, 72, 58, 0.8)',
        0.7: 'rgba(255, 255, 0, 0.9)',
        1.0: 'rgba(128, 255, 0, 1)'
    }],
    radiuses = [5, 10, 20, 30],
    opacities = [0.4, 0.6, 0.8, 1];

    let data = await fetchData();

    ymaps.modules.require(['Heatmap'], function (Heatmap) {
        var heatmap = new Heatmap(data, {
            gradient: gradients[0],
            radius: radiuses[1],
            opacity: opacities[2]
        });
        heatmap.getData(map);
        heatmap.setMap(map);
        

        
       
buttonFiltr.onclick = async function() {    
     let newData = await fetchNewData();
     heatmap.setData(newData); 
   
  };






        buttons.dissipating.events.add('press', function () {
            heatmap.options.set(
                'dissipating', !heatmap.options.get('dissipating')
            );
        });
        buttons.opacity.events.add('press', function () {
            var current = heatmap.options.get('opacity'),
                index = opacities.indexOf(current);
            heatmap.options.set(
                'opacity', opacities[++index == opacities.length ? 0 : index]
            );
        });
        buttons.radius.events.add('press', function () {
            var current = heatmap.options.get('radius'),
                index = radiuses.indexOf(current);
            heatmap.options.set(
                'radius', radiuses[++index == radiuses.length ? 0 : index]
            );
        });
        buttons.gradient.events.add('press', function () {
            var current = heatmap.options.get('gradient');
            heatmap.options.set(
                'gradient', current == gradients[0] ? gradients[1] : gradients[0]
            );
        });
        buttons.heatmap.events.add('press', function () {
            heatmap.setMap(
                heatmap.getMap() ? null : map
            );
        });

        for (var key in buttons) {
            if (buttons.hasOwnProperty(key)) {
                map.controls.add(buttons[key]);
            }
        }
    });
});



