import React from 'react'
import { NavLink, Link } from 'react-router-dom'
import './Nav.scss'

const Nav = ({ title, data, use }) => {
    return (
        <nav className="footer__nav">
            <h4>{title}</h4>
            <ul className='footer__nav-list'>
                {data.map(({ id, name, path }) => (
                    <li key={id}>
                        <NavLink
                            className="footer__nav-link"
                            to={path}
                        >{name}</NavLink>
                    </li>
                ))}
            </ul>
            <Link
                className='footer__nav-sublink'
                to={`/${use}`}
            >{use}</Link>
        </nav>
    )
}

export default Nav