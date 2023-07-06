import React from 'react'
import './Smm.scss'
import Tel from '../../../../assets/icons/footerTel.png'
import Mail from '../../../../assets/icons/footerMail.png'

const Smm = ({ title, data }) => {
    return (
        <nav className='footer__smm'>
            <h4>{title}</h4>
            <ul className='footer__smm-list'>
                {data.map(({ id, name, href }) => (
                    <li key={id}>
                        {href.includes("tel")
                            ? <a href={href}><img src={Tel} alt="icon" />{name}</a>
                            : <a href={href}><img src={Mail} alt="icon" />{name}</a>
                        }
                    </li>
                ))}
            </ul>
        </nav>
    )
}

export default Smm