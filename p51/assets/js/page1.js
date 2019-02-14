let Weather = {
    ApiWeather: 'http://api.apixu.com/v1/current.json?key=3433f5fa760f4aee81f95221190602&q=Malijai',
    temperature: $('#temperature'),
    temperatureRess: document.getElementById('temperatureRess'),


    // Initialisation de la map et des clusters
    init: function () {
        Weather.apiWeather();
    },

    ajaxGet: function (url, callback) {
        let req = new XMLHttpRequest();
        req.open("GET", url);
        req.addEventListener("load", function () {
            if (req.status >= 200 && req.status < 400) {
                callback(req.responseText);

            } else {
                console.error(req.status + "" + req.statusText + "" + url);
            }
        });

        req.addEventListener("error", function () {
            console.error("erreur reseau avec l'url " + url);
        });
        req.send(null);
    },

    //requete ajax et
    apiWeather: function () {
        Weather.ajaxGet(Weather.ApiWeather, function (reponse) {

            let stations = JSON.parse(reponse);

            Weather.temperature.text(stations.current.temp_c);
            Weather.temperatureRess.text(stations.current.condition.feelslike_c);
        })

    }
}
Weather.init();


