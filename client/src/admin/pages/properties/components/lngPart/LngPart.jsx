import React, { useEffect, useState } from 'react'
import Flag from 'react-world-flags'
import { flags } from '../dropdowns/data'
import { TextLarg } from '../inputs/TextLarg'
import './Styles.scss'

export const LngPart = ({ title, value, id, style, required, onChange, setIsCompleted }) => {
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

    const handleLanguageChange = (language, value) => {
        switch (language) {
            case 'am':
                setArm(value);
                setIsCompleted((prevIsCompleted) => ({
                    ...prevIsCompleted,
                    [id + 'Am']: value.trim() !== '',
                }));
                break;
            case 'ru':
                setRus(value);
                setIsCompleted((prevIsCompleted) => ({
                    ...prevIsCompleted,
                    [id + 'Ru']: value.trim() !== '',
                }));
                break;
            case 'en':
                setEng(value);
                setIsCompleted((prevIsCompleted) => ({
                    ...prevIsCompleted,
                    [id + 'En']: value.trim() !== '',
                }));
                break;
            default:
                break;
        }
    };

    return (
        <div key={id} style={{ width: style }}>
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
                    onChange={(e) => {
                        // setArm(e.target.value);
                        onChange(e);
                        // setIsCompleted((prevIsCompleted) => ({
                        //     ...prevIsCompleted,
                        //     am: e.target.value.trim() !== '',
                        // }));
                        handleLanguageChange('am', e.target.value);
                    }}
                />
                : activeFlag === "ru"
                    ? <TextLarg
                        id={id + "Ru"}
                        value={rus}
                        title={title}
                        required={required}
                        placeholder={`Գրեք ` + placeholder}
                        onChange={(e) => {
                            // setRus(e.target.value);
                            onChange(e);
                            // setIsCompleted((prevIsCompleted) => ({
                            //     ...prevIsCompleted,
                            //     ru: e.target.value.trim() !== '',
                            // }));
                            handleLanguageChange('ru', e.target.value);
                        }}

                    />
                    : <TextLarg
                        id={id + "En"}
                        value={eng}
                        title={title}
                        required={required}
                        placeholder={`Գրեք ` + placeholder}
                        onChange={(e) => {
                            // setEng(e.target.value);
                            onChange(e);
                            // setIsCompleted((prevIsCompleted) => ({
                            //     ...prevIsCompleted,
                            //     [id]: e.target.value.trim() !== "",
                            // }));
                            handleLanguageChange('en', e.target.value);
                        }}
                    />}
        </div >
    )
}
