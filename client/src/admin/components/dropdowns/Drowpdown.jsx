import React from 'react'
import '../inputs/Inputs.scss'

export const Drowpdown = ({ id, value, onChange, data, width }) => {
    return (
        <select
            id={id}
            value={value}
            onChange={onChange}
            className="dash__input-dropdown"
            style={{ width: width }}
        >
            {data.map((el) => {
                return (
                    <option
                        className="dash__input-dropdown-options"
                        key={el.name}
                        value={el.name}
                    >
                        {el.name}
                    </option>
                )
            })}
        </select>
    )
}
