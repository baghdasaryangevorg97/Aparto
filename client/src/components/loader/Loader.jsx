import React from 'react'
import loader from '../../assets/imgs/loader.gif'

export const Loader = () => {
    return (
        <div className="loader">
            <img src={loader} alt="Loading..." />
        </div>
    )
}
