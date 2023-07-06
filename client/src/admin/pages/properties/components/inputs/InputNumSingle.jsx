import React from 'react'
import './Styles.scss'

export const InputNumSingle = ({ id, title, placeholder, required, style, onChange, value }) => {
    return (
        <label className='cardText'>
            {title}
            <input
                id={id}
                defaultValue={value ? value : null}
                required={required}
                // min={0}
                // type="number"
                type="text"
                placeholder={placeholder}
                className='cardText-hug'
                style={{ width: style }}
                onChange={onChange}
            />
            <span>$</span>
        </label>
    )
}