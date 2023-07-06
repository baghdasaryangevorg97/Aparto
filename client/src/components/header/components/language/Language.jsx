import React, { useRef, useState, useEffect } from 'react'
import { useTranslation } from 'react-i18next'
import { languageData } from './data'
import cookies from 'js-cookie'
import Flag from 'react-world-flags'
import './Language.scss'

const Language = () => {
    const { i18n } = useTranslation()
    const lngRef = useRef()
    const [openLng, setOpenLng] = useState(false)
    const [selectedLng, setSelectedLng] = useState(cookies.get("lngFlag") || "gb")

    const handleOpenLng = () => {
        setOpenLng(!openLng);
    }

    const handleChangeLng = (code) => {
        setOpenLng(false)
        i18n.changeLanguage(code)
        code === "en" ? setSelectedLng("gb") : setSelectedLng(code)
        code === "en" ? cookies.set("lngFlag", "gb") : cookies.set("lngFlag", code)
        cookies.set('lng', code)
    };

    useEffect(() => {
        const checkIfClickedOutside = (e) => {
            if (openLng && lngRef.current && !lngRef.current.contains(e.target)) {
                setOpenLng(false)
            }
        }
        document.addEventListener("mousedown", checkIfClickedOutside)

        return () => {
            document.removeEventListener("mousedown", checkIfClickedOutside)
        }
    }, [openLng])

    // console.log(selectedLng);

    return (
        <div className="language" ref={lngRef}>
            <div
                className="language__choose"
                onClick={handleOpenLng}
            >
                <Flag code={selectedLng} width="18" height="14" />
            </div>

            <ul className={!openLng ? "language__dropdown" : "language__dropdown-active"}>
                {languageData.map(({ code, country_code }) => (
                    <li key={code}>
                        <Flag
                            onClick={() => handleChangeLng(code)}
                            code={country_code}
                            width="18"
                            height="14"
                        />
                    </li>
                ))}
            </ul>
        </div>
    )
}

export default Language