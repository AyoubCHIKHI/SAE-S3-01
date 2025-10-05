<script>
    // Initialisation de la carte
    const map = L.map('map').setView([48.858844, 2.294351], 13); // Coordonnées de Paris, zoom 13

    // Ajout des tuiles (fond de carte)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

    // Ajout d’un marqueur
    L.marker([48.858844, 2.294351])
    .addTo(map)
    .bindPopup('Notre association est ici !')
    .openPopup();
</script>
