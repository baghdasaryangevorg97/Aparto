import React from 'react'
import './Styles.scss'

export const Checkbox = ({ style, id, onChange, title, value }) => {
    // const isChecked = value === true;
    return (
        <div style={{ width: style }} className='checkbox'>
            <input
                type="checkbox"
                id={id}
                onChange={onChange}
                defaultChecked={value === true ? true : false}
            />
            {title}
        </div>
    )
}
