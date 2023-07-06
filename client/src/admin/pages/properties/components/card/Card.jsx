import React from 'react'
import '../../pages/Styles.scss'

export const Card = ({ title, child, addedChild, width }) => {
    return (
        <div className='addproperties__card' style={{ width: width }}>
            <h2>{title}</h2>
            <div className='addproperties__card-block'>
                {child}
                {addedChild}
            </div>
        </div>
    )
}
