import React, { useEffect, useState } from 'react'
import Flag from 'react-world-flags'
import { flags } from '../dropdowns/data'
import { TextLarg } from '../inputs/TextLarg'
import './Styles.scss'

export const LngPartSmall = ({ title, value, id, required, onChange }) => {
    const [activeFlag, setActiveFlag] = useState('am')
    const [arm, setArm] = useState('')
    const [rus, setRus] = useState('')
    const [eng, setEng] = useState('')

    useEffect(() => {
        if (value) {

            const keys = Object.keys(value)

            const keyWithAm = keys.find(key => key.includes('Am'))
            const valueWithAm = keyWithAm ? value[keyWithAm] : ''

            const keyWithEn = keys.find(key => key.includes('En'))
            const valueWithEn = keyWithEn ? value[keyWithEn] : ''

            const keyWithRu = keys.find(key => key.includes('Ru'))
            const valueWithRu = keyWithRu ? value[keyWithRu] : ''

            setArm(valueWithAm || '');
            setEng(valueWithEn || '');
            setRus(valueWithRu || '');
        }
    }, [value])

    let placeholder = title.endsWith("*")
        ? title?.split(" ").pop().slice(0, -1).toLowerCase() + "ը"
        : title?.toLowerCase()
        
    return (
        <div key={id}>
            <ul className="cardFlags">
                {flags.map(({ country_code }) => (
                    <li key={country_code}>
                        <Flag
                            code={country_code}
                            onClick={() => setActiveFlag(country_code)}
                            className={activeFlag === country_code ? 'cardFlags__flagActive' : 'cardFlags__flag'}
                            width="36"
                            height="20"
                        />
                    </li>
                ))}
            </ul>

            {activeFlag === "am"
                ? <TextLarg
                    id={id + "Am"}
                    value={arm}
                    title={title}
                    required={required}
                    placeholder={`Գրեք ` + placeholder}
                    onChange={(e) => { setArm(e.target.value); onChange(e) }}
                />
                : activeFlag === "ru"
                    ? <TextLarg
                        id={id + "Ru"}
                        value={rus}
                        title={title}
                        required={required}
                        placeholder={`Գրեք ` + placeholder}
                        onChange={(e) => { setRus(e.target.value); onChange(e) }}

                    />
                    : <TextLarg
                        id={id + "En"}
                        value={eng}
                        title={title}
                        required={required}
                        placeholder={`Գրեք ` + placeholder}
                        onChange={(e) => { setEng(e.target.value); onChange(e) }}
                    />}
        </div >
    )
}
