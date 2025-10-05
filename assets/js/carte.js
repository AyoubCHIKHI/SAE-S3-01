// ../assets/js/carte.js

document.addEventListener("DOMContentLoaded", function () {
    // Initialisation de la carte centrée sur la France
    const map = L.map('map').setView([46.603354, 1.888334], 6);

    // Couche de fond OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Exemple de marqueurs
    const markers = [
        { lat: 48.830984476882584, lon: 2.3388590070525854, text: "Paris - Siège de l'association" },
        { lat: 48.127091050746216, lon: -1.6923763033717514, text: "EGEE BRETAGNE" },
        { lat: 48.70510793708534, lon: 6.129533626201256, text: "Lyon - Bureau régional" },
    ];

    markers.forEach(point => {
        L.marker([point.lat, point.lon])
            .addTo(map)
            .bindPopup(point.text);
    });

    // Ajout dynamique d’un marqueur au clic
    map.on('click', function (e) {
        const { lat, lng } = e.latlng;
        L.marker([lat, lng])
            .addTo(map)
            .bindPopup(`Nouveau marqueur à<br>Lat: ${lat.toFixed(4)}, Lng: ${lng.toFixed(4)}`);
    });
});
