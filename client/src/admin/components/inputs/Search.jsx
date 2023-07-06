import React from 'react'
import { search } from '../../svgs/svgs'
import './Inputs.scss'

export const Search = ({ value, placeholder, onChange }) => {
    return (
        <label className="dash__search">
            <span>
                {search.icon}
            </span>
            <input
                type='text'
                placeholder={placeholder}
                value={value}
                onChange={onChange}
            />
        </label>
    )
}
