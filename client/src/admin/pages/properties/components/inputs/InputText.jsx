import React from 'react'
import './Styles.scss'

export const InputText = ({ title, value, id, style, required, height, placeholder, onChange }) => {
    return (
        <label className='cardText'>
            {title}
            <textarea
                id={id}
                defaultValue={value ? value : null}
                required={required}
                type="text"
                placeholder={placeholder}
                className='cardText-full'
                style={{ width: style, height: height ? height : "42px" }}
                onChange={onChange}
                rows="14"
                cols="10"
                wrap="soft"
            />
        </label>
    )
}
