import React from 'react'
import { MapContainer, Marker, Popup, TileLayer } from 'react-leaflet'
import MapPopup from './components/MapPopup'

// masivi hasce
const Map = () => {
    return (
        <MapContainer
            style={{ height: "700px", zIndex: "1" }}
            center={[40.1953005, 44.5642199]}
            zoom={15}
            scrollWheelZoom={false}>
            <TileLayer
                attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
            <Marker
                position={[40.1953005, 44.5642199]}
            // eventHandlers={{
            //     click: () => {
            //         alert('marker clicked')
            //     },
            // }}
            >
                <Popup>
                    <MapPopup/>
                </Popup>
            </Marker>
        </MapContainer>
    )
}

export default Map