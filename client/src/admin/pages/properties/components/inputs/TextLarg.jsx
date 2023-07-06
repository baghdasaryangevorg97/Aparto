import React from 'react'
import './Styles.scss'

export const TextLarg = ({ title, id, placeholder, required, value, onChange }) => {
    return (
        <label className='cardText'>
            {title}
            <textarea
                id={id}
                required={required}
                placeholder={placeholder}
                className='cardText-larg'
                value={value}
                onChange={onChange}
                rows="14"
                cols="10"
                wrap="soft"
            ></textarea>
        </label>
    )
}