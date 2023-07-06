import React from 'react'
import { useSelector } from 'react-redux'
import { NavLink } from 'react-router-dom'
import { adminDashboardRoutes, dashboardRoutes } from './data'
import "./Paths.scss"

const Paths = () => {
    const { role } = useSelector((state => state.userGlobal.userGlobal))

    return (
        <ul className='sidebar__list'>
            {role === "admin"
                ? adminDashboardRoutes.map((el) => {
                    return (
                        <li key={el.id}>
                            <NavLink
                                className="sidebar__list-navlink"
                                to={el.path}
                            >
                                {el.img.icon}
                                {el.name}
                            </NavLink>
                        </li>
                    )
                })
                : dashboardRoutes.map((el) => {
                    return (
                        <li key={el.id}>
                            <NavLink
                                className="sidebar__list-navlink"
                                to={el.path}
                            >
                                {el.img.icon}
                                {el.name}
                            </NavLink>
                        </li>
                    )
                })
            }
        </ul>
    )
}

export default Paths