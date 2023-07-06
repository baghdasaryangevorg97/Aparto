import React from 'react'
import { add } from '../../svgs/svgs'
import './StyleBtn.scss'

export const BtnAdd = ({ onClick }) => {
    return (
        <button onClick={onClick} className='btn__add'>
            {add.icon}
            <span>Ավելացնել</span>
            {/* <span>Ավելացնել {text}</span> */}
            {/* <span>Add {text}</span> */}
        </button>
    )
}
