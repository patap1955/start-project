import ymaps from "ymaps";

// YANDEX MAPS
const yandexMap = document.getElementById("ymaps");
(() => {
    ymaps
        .load("https://api-maps.yandex.ru/2.1/?lang=ru_RU")
        .then((maps) => {
            const mapContainer = document.createElement("div");

            mapContainer.style.height = "100%";
            mapContainer.style.width = "100%";
            mapContainer.id = "mapContainer";
            const map = new maps.Map(
                mapContainer,
                {
                    // 51.367258, 42.078642
                    center: [56.237432, 44.002465],
                    zoom: 16,
                },
                { yandexMapDisablePoiInteractivity: true },
                {
                    searchControlProvider: "yandex#search",
                }
            );
            let positions = map.getGlobalPixelCenter();
            //            positions = [
            //                positions[0] + 420,
            //                positions[1]
            //            ]
            const offsetPos = map.options
                .get("projection")
                .fromGlobalPixels(positions, map.getZoom());
            const myPlacemark = new maps.Placemark(offsetPos, {
                iconLayout: "default#image",
                iconImageSize: [50, 50],
                iconImageOffset: [-8, -72],
            });
            // const placemark = new maps.Placemark( map.getCenter(),
            //     {
            //         iconLayout: 'default#image',
            //         iconImageSize: [ 50, 50 ],
            //         iconImageOffset: [ -8, -72 ]
            //     }
            // );
            map.geoObjects.add(myPlacemark);
            yandexMap.appendChild(mapContainer);
        })
        .catch((error) => console.log("Failed to load Yandex Maps", error));
})();
