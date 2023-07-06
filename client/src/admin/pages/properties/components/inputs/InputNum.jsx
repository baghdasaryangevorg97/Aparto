import React from 'react'
import './Styles.scss'

export const InputNum = ({ title, value, id, placeholder, onChange, style, required }) => {
    return (
        <label className='cardText'>
            {title}
            <input
                id={id}
                defaultValue={value ? value : null}
                required={required}
                // min={0}
                type="text"
                placeholder={placeholder}
                className='cardText-hug'
                style={{ width: style }}
                onChange={onChange}
            />
        </label>
    )
}
