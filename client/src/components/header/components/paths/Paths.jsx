import React from 'react'
import { useTranslation } from 'react-i18next'
import { NavLink } from 'react-router-dom'
import { headerRoutes } from './data'
import './Paths.scss'

const Paths = () => {
    const { t } = useTranslation()

    return (
        <ul className='list'>
            {headerRoutes.map((el) => {
                return (
                    <li key={el.id}>
                        <NavLink
                            className="list__navlink"
                            to={el.path}
                        >
                            {t(`${el.name}`)}
                        </NavLink>
                    </li>
                )
            })}
        </ul>
    )
}

export default Paths