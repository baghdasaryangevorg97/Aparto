import React, { useEffect } from 'react'
import { MapContainer, TileLayer, useMap } from "react-leaflet";
import { GeoSearchControl, OpenStreetMapProvider } from "leaflet-geosearch"

// yerevani hasce
const MapSearch = () => {

    function LeafletgeoSearch() {
        const map = useMap()

        // Get lng lat
        function searchEventHandler(result) {
            console.log(result.location)
        }

        useEffect(() => {
            const provider = new OpenStreetMapProvider()

            const searchControl = new GeoSearchControl({
                provider,
                marker: {
                    // icon
                    draggable: true
                }
            });

            map.addControl(searchControl)

            // Get lng lat
            map.on('geosearch/showlocation', searchEventHandler);

            return () => map.removeControl(searchControl)
        }, [map]);


        return null;
    }

    return (
        <MapContainer
            style={{ height: "700px", zIndex: "1" }}
            center={[40.1777112, 44.5126233]}
            zoom={13}
            scrollWheelZoom={false}>
            <TileLayer
                attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
            <LeafletgeoSearch />
        </MapContainer>
    )
}

export default MapSearch