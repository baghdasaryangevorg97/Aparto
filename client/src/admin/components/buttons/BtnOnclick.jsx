import React from 'react'
import './StyleBtn.scss'

export const BtnOnclick = ({ onClick, text }) => {
    return (
        <button onClick={onClick} className='btn__onclick'>
            <span>{text}</span>
        </button>
    )
}