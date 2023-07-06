import React, { useEffect, useRef, useState } from "react"
import { YMaps, Map, ZoomControl, Placemark } from "react-yandex-maps"
import { useDispatch } from "react-redux"
import { setYandex } from "../../../../../store/slices/propertySlice"
import './YandexMap.scss'

const mapOptions = {
    modules: ["geocode", "SuggestView"],
    defaultOptions: { suppressMapOpenBlock: true }
}

export const YandexMap = ({ title, defValue, style, height }) => {
    const dispatch = useDispatch()

    const initialState = {
        title: "",
        center: defValue ? defValue : [40.177200, 44.503490],
        zoom: 17,
    }

    const [state, setState] = useState({ ...initialState })
    const [placemark, setPlacemark] = useState(defValue ? defValue : [])
    const [mapConstructor, setMapConstructor] = useState(null)
    const mapRef = useRef(null)
    const searchRef = useRef(null)

    // search popup
    useEffect(() => {
        if (mapConstructor) {
            new mapConstructor.SuggestView(searchRef.current).events.add("select", function (e) {
                const selectedName = e.get("item").value
                mapConstructor.geocode(selectedName).then((result) => {
                    const newCoords = result.geoObjects.get(0).geometry.getCoordinates()
                    setPlacemark(newCoords)
                    setState((prevState) => ({ ...prevState, center: newCoords }))
                    dispatch(setYandex(newCoords))
                })
            })
        }
    }, [dispatch, mapConstructor])

    // change placemark
    const handleClick = (event) => {
        const coords = event.get('coords')
        dispatch(setYandex(coords))
        setPlacemark(coords)
    }

    return (
        <YMaps query={{ apikey: "e04526f5-e9c9-42b5-9b1f-a65d6cd5b19e", lang: "en_RU" }}>
            {title}
            <div className="yandex__map">
                <input
                    ref={searchRef}
                    placeholder="Search..."
                    disabled={!mapConstructor}
                    className="yandex__map-search"
                />
                <Map
                    {...mapOptions}
                    state={state}
                    onLoad={setMapConstructor}
                    instanceRef={mapRef}
                    width={style}
                    height={height}
                    onClick={handleClick}
                >
                    <Placemark geometry={placemark} />
                    <ZoomControl />
                </Map>
            </div>
        </YMaps>
    )
}



// https://codesandbox.io/s/yandex-map-search-organization-dutdr?file=/src/YmapsComponent.tsx:633-668
// https://gribnoysup.github.io/react-yandex-maps/#/sandbox/clustering/clusterer-create - miqani ket nshvac
// https://gribnoysup.github.io/react-yandex-maps/#/sandbox/controls/listbox - hasceneri dropdown

// {/* <FullscreenControl /> */}
// {/* <GeolocationControl options={{ float: "right", noPlacemark: "true" }} {...geolocationOptions} /> */}
// onBoundsChange={handleBoundsChange}

// {/* <div >
//                 <div >
//                     <p title={state.title}>
//                         {state.title}
//                     </p>
//                     // <BtnCustom type="button" onClick={handleReset} text='Default place' />
//                 </div>
//                 // <BtnCustom type="button" onClick={handleSubmit} disabled={Boolean(!state.title.length)} text='Get Data of this address' />
//             </div> */}

// const geolocationOptions = {
//     defaultOptions: { maxWidth: 128 },
//     defaultData: { content: "Determine" },
// };

    // const handleSubmit = () => {
    //     console.log(state)//
    //     console.log(placemark)//
    //     // console.log({ title: state.title, center: mapRef.current.getCenter() })//
    //     // console.log({ title: searchRef.current.value, center: mapRef.current.getCenter() })//
    // };

    // reset state & search
    // const handleReset = () => {
    //     setState({ ...initialState })
    //     searchRef.current.value = ""
    //     mapRef.current.setCenter(initialState.center)
    //     mapRef.current.setZoom(initialState.zoom)
    // };

    // change title on mouse scroll
    // const handleBoundsChange = () => {
    //     const newCoords = mapRef.current.getCenter();
    //     mapConstructor.geocode(newCoords).then((res) => {
    //         const nearest = res.geoObjects.get(0);
    //         const foundAddress = nearest.properties.get("text")
    //         const [centerX, centerY] = nearest.geometry.getCoordinates()
    //         const [initialCenterX, initialCenterY] = initialState.center
    //         if (centerX !== initialCenterX && centerY !== initialCenterY) {
    //             setState((prevState) => ({ ...prevState, title: foundAddress }))
    //         }
    //     })
    // }


// DONT NEEDED YET
// import React, { useState } from 'react'
// import { YMaps, Map, SearchControl, Placemark } from "react-yandex-maps";

// const YandexMap = () => {
//     const [center, setCenter] = useState([40.1953005, 44.5642199])
//     const [zoom, setZoom] = useState(10)
//     const [placemarkCoordinates, setPlacemarkCoordinates] = useState(null)

//     const handleSearchResult = (result) => {
//         const firstResult = result.get(0)
//         if (firstResult) {
//             setCenter(firstResult.geometry.getCoordinates())
//             setZoom(15);
//             setPlacemarkCoordinates(firstResult.geometry.getCoordinates())
//         }
//     };

//     return (
//         <YMaps query={{ apikey: "8ffb1ed9-37fa-4567-8d01-82d384e36a7c" }}>
//             <div style={{ height: '400px' }}>
//                 <Map
//                     defaultState={{ center, zoom }}
//                     width="100%"
//                     height="100%"
//                 >
//                     <SearchControl
//                         options={{ float: 'right' }}
//                         onResultSelect={(e) => handleSearchResult(e.originalEvent.target._items)}
//                     />
//                     {placemarkCoordinates && <Placemark geometry={placemarkCoordinates} />}
//                     {/* <Placemark geometry={[40.1953005, 44.5642199]} /> */}
//                 </Map >
//             </div>
//         </YMaps >
//     )
// }
// export default YandexMap

// https://codesandbox.io/s/yandex-map-search-organization-dutdr?file=/src/YmapsComponent.tsx:283-321

// vor im danninery dnem mejy
// https://codesandbox.io/s/confident-matsumoto-nj0dr

// import React, { Component } from "react";
// import { YMaps, Map, ZoomControl, Placemark } from "react-yandex-maps";

// export default class YandexMap extends Component {
//     map = React.createRef();
//     ymaps = React.createRef();

//     render() {
//         return (
//             <YMaps query={{
//                 apikey: "29294198-6cdc-4996-a870-01e89b830f3e",
//                 lang: "en_RU"
//                 // ns: 'use-load-option',
//                 // load: 'package.full'

//                 // ns: 'ymaps',
//                 // load: ['package.full', 'overlay.Polygon'].join(','),
//                 // apikey: "8ffb1ed9-37fa-4567-8d01-82d384e36a7c",
//                 // coordorder: 'longlat',
//             }}>
//                 <Map
//                     state={{ center: [40.1953005, 44.5642199], zoom: 13 }}
//                     instanceRef={this.map}
//                     onLoad={(ymapsInstance) => {
//                         this.ymaps.current = ymapsInstance;
//                         this.addSearchControlEvents();
//                     }}
//                     width="100%"
//                     height="400px"
//                     modules={["control.SearchControl"]}
//                 >
//                     <ZoomControl
//                         options={{ float: "none", position: { top: 100, right: 10 } }}
//                     />
//                     <Placemark geometry={[40.1953005, 44.5642199]} />
//                 </Map>
//             </YMaps>
//         );
//     }

//     addSearchControlEvents = () => {
//         const map = this.map.current;
//         const ymaps = this.ymaps.current;

//         const searchControl = new ymaps.control.SearchControl({
//             options: {
//                 float: "left",
//                 floatIndex: 300,
//                 provider: "yandex#search",
//                 geoObjectStandardPreset: "islands#blueDotIcon",
//                 placeholderContent: "Поиск мест и адресов",
//                 maxWidth: 320,
//                 size: "large"
//             }
//         });
//         map.controls.add(searchControl);

//         searchControl.events.add("resultselect", function (e) {
//             const searchCoords = searchControl.getResponseMetaData().SearchResponse
//                 .Point.coordinates;
//             const display = searchControl.getResponseMetaData().SearchResponse
//                 .display;

//             //console.log(searchControl.getResponseMetaData());

//             if (display && display === "multiple") {
//                 map.setCenter([searchCoords[1], searchCoords[0]], 11);
//             }
//         });
//     };
// }