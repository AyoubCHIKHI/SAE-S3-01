// ../assets/js/carte.js

document.addEventListener("DOMContentLoaded", function () {
    // Initialisation de la carte centrée sur la France
    const map = L.map('map').setView([46.603354, 1.888334], 6);

    // Couche de fond OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // ajout des marqueur
    const markers = [
        { lat: 48.830984476882584, lon: 2.3388590070525854, text: "Paris - Siège de l'association" },
        { lat: 48.127091050746216, lon: -1.6923763033717514, text: "EGEE BRETAGNE" },
        { lat: 48.70510793708534, lon: 6.129533626201256, text: "Grand Est" },
        { lat: 45.62375614500134, lon: 2.8906775974057313, text: "Auvergne" },
        { lat: 46.98880602892889, lon: 3.1568406884328977, text: "" },
        { lat: 45.17949309855999, lon: 0.7096097683817756, text: "" },
        { lat: 49.22841525426587, lon: -1.2662089146549333, text: "" },
        { lat: 44.0950, lon:  6.1523, text: "" },
        { lat: 43.6833, lon: 2.4609, text: "" },
        { lat:  50.288, lon: 2.3071, text: "" },
        { lat: 43.6833, lon: 2.4609, text: "" },
    ];

    // ajout des points sur la carte

    markers.forEach(point => {
        L.marker([point.lat, point.lon])
            .addTo(map)
            .bindPopup(point.text);
    });
});
