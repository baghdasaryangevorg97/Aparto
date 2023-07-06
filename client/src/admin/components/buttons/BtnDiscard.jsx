import React from 'react'
import { useNavigate } from 'react-router-dom';
import './StyleBtn.scss'

export const BtnDiscard = ({ text }) => {
    const navigate = useNavigate();

    return (
        <button onClick={() => navigate(-1)} className='btn__discard'>{text}</button>
    )
}
