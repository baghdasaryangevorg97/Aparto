import React from 'react'
import { YMaps, Map, ZoomControl, Placemark } from "react-yandex-maps"
import './YandexMap.scss'

export const YMap = ({ value, width, height }) => {
    const mapOptions = {
        modules: ["geocode", "SuggestView"],
        defaultOptions: { suppressMapOpenBlock: true }
    }

    const initialState = {
        title: "",
        center: value,
        zoom: 17,
    }

    return (
        <YMaps query={{ apikey: "e04526f5-e9c9-42b5-9b1f-a65d6cd5b19e", lang: "en_RU" }}>
            <div className="yandex__map" >
                <Map
                    {...mapOptions}
                    state={initialState}
                    width={width}
                    height={height}
                >
                    <Placemark geometry={value} />
                    <ZoomControl />
                </Map>
            </div>
        </YMaps>
    )
}
