import React from "react"
import { MapContainer, TileLayer } from "react-leaflet"
import L from "leaflet"

export const icon = L.icon({
    iconSize: [25, 41],
    iconAnchor: [10, 41],
    popupAnchor: [2, -40],
    iconUrl: "https://unpkg.com/leaflet@1.7/dist/images/marker-icon.png",
    shadowUrl: "https://unpkg.com/leaflet@1.7/dist/images/marker-shadow.png"
});

// yerevani hasce
const MapSelect = () => {

    return (
        <MapContainer
            center={[40.1777112, 44.5126233]}
            zoom={13}
            scrollWheelZoom={true}
            style={{ height: "700px", zIndex: "1" }}
            whenReady={(map) => {
                map.target.once("click", function (e) {
                    // arajin kordinaty
                    const { lat, lng } = e.latlng
                    console.log(lat, lng)
                    L.marker([lat, lng], { icon, draggable: false }).addTo(map.target)

                    // erkrord kordinaty
                    var pos = e.latlng;
                    var marker = L.marker(
                        pos, {
                        draggable: true
                    });

                    // marker.on('drag', function () {
                    // });
                    // marker.on('dragstart', function () {
                    //     map.target.off('click', mapClickListen);
                    // });
                    marker.on('dragend', function (e) {
                        const { lat, lng } = e.target._latlng
                        console.log(lat, lng);
                    });
                    marker.addTo(map.target);
                })
            }}
        >
            <TileLayer
                attribution='&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
        </MapContainer>
    )
}

export default MapSelect