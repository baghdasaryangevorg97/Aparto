import React, { useState } from 'react'
import { more } from '../../../../../svgs/svgs'
import { Link } from 'react-router-dom'
import '../Styles.scss'

export const More = ({ id, status }) => {
    const [active, setActive] = useState(false)

    return (
        <div className='propertyList__item-right-more'>
            <div
                className='propertyList__item-right-more-icon'
                onClick={() => !active ? setActive(true) : setActive(false)}
            >
                {more.icon}
            </div>

            <div className={!active ? 'propertyList__item-right-more-menuClose' : 'propertyList__item-right-more-menu'}>
                <Link
                    className='propertyList__item-right-more-menu-link'
                    to={`edit/${id}`}
                >
                    Փոփոխել
                </Link>
                {status === "approved"
                    ? <button
                        className='propertyList__item-right-more-menu-item'
                        onClick={() => alert("Cooming Soon :)")}
                    >
                        Ապաակտիվացնել
                    </button>
                    : status === "deactive"
                        ? <button
                            className='propertyList__item-right-more-menu-item'
                            onClick={() => alert("Cooming Soon :)")}
                        >
                            Ակտիվացնել
                        </button>
                        : null
                }
                <button
                    style={{ color: "#D34545" }}
                    className='propertyList__item-right-more-menu-item'
                    onClick={() => alert("Cooming Soon :)")}
                >
                    Արխիվացնել
                </button>
            </div>
        </div>
    )
}
