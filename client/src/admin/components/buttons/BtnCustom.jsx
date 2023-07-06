import React from 'react'
import './StyleBtn.scss'

//submiti pahy dzel
export const BtnCustom = ({ form, onClick, text }) => {
    return (
        <button type="submit" form={form} onClick={onClick} className='btn__add-this'>{text}</button>
    )
}

