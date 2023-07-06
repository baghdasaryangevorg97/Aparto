import React from 'react'
import { down, up } from '../../../../svgs/svgs'
import './Styles.scss'

export const AdvancedBtn = ({ onClick, status }) => {
    return (
        <button onClick={onClick} className="advancedBtn">
            {/* Advanced Filters */}
            Ֆիլտրներ {status ? down.icon : up.icon}
        </button>
    )
}
