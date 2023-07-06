import React from 'react'
import { dollar } from '../../../../../assets/svgs/svgs'
import './Styles.scss'

export const InputSymbol = ({ id, type, placeholder, name, onChange, width, value }) => {
    return (
        <label className="inputSymbol">
            <input
                id={id}
                type={type}
                placeholder={placeholder}
                name={name}
                onChange={onChange}
                style={{ width: width }}
                value={value}
            />
            {name === "price" ? <p>{dollar.icon}</p> : name === "square" ? <p>ք.մ.</p> : null}
        </label>
    )
}
