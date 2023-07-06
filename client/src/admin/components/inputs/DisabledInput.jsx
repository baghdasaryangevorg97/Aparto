import React from 'react'
import './Inputs.scss'

export const DisabledInput = ({ name, value }) => {
    return (
        <label className='disabled__label'>
            {name}
            <input
                type='text'
                name={name}
                defaultValue={value}
                disabled
                className="disabled__input"
            />
        </label>
    )
}
