import ymaps from 'ymaps';
(() => {
    ymaps
        .load("https://api-maps.yandex.ru/2.1/?lang=ru_RU")
        .then(maps => {
            const map = new maps.Map('map', {
                    // 56.147215, 40.456446
                    center: [56.147215, 40.456446],
                    zoom: 16
                },
                { yandexMapDisablePoiInteractivity: true, },
                {
                    searchControlProvider: 'yandex#search'
                }
            );
            let positions = map.getGlobalPixelCenter();
//            positions = [
//                positions[0] + 420,
//                positions[1]
//            ]
            const offsetPos = map.options.get('projection').fromGlobalPixels(positions, map.getZoom());
            const myPlacemark = new maps.Placemark(offsetPos,
                {
                    iconLayout: 'default#image',
                    iconImageSize: [ 50, 50 ],
                    iconImageOffset: [ -8, -72 ]
                });
            // const placemark = new maps.Placemark( map.getCenter(),
            //     {
            //         iconLayout: 'default#image',
            //         iconImageSize: [ 50, 50 ],
            //         iconImageOffset: [ -8, -72 ]
            //     }
            // );
            map.geoObjects.add( myPlacemark );

        })
        .catch(error => console.log('Failed to load Yandex Maps', error));
})()
