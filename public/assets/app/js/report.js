var map = document.getElementById("map");
var lattitude = document.getElementById("lat");
var longitude = document.getElementById("lng");
var address = document.getElementById("location");

navigator.geolocation.getCurrentPosition(function (position) {
    var lat = -6.306092685425572;
    var lng = 106.75278814978535;

    lattitude.value = lat;
    longitude.value = lng;

    var mymap = L.map("map").setView([lat, lng], 13);

    var marker = L.marker([lat, lng]).addTo(mymap);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(mymap);

    var geocodingUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`;

    fetch(geocodingUrl)
        .then((response) => response.json())
        .then((data) => {
            address.value = data.display_name;
            marker
                .bindPopup(
                    `<b>Report Location</b><br />You are in ${data.display_name}`
                )
                .openPopup();
        })
        .catch((error) =>
            console.error("Error fetching reverse geocoding data:", error)
        );
});
