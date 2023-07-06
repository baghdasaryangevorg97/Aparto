import React from 'react'
import { Link } from 'react-router-dom'
import logo from '../../assets/imgs/logo.png'
import Nav from './components/nav/Nav'
import Smm from './components/smm/Smm'
import { customerData, ownersData, sourcesData, contactData } from './data'
import './Footer.scss'

const Footer = () => {
  return (
    <footer>
      <div className="container">
        <div className='footer'>
          <Link to='/'>  <img src={logo} alt="logo" /></Link>
          <Nav title="For Customers" data={customerData} use="Privacy Policy" />
          <Nav title="For Owners" data={ownersData} use="Terms of Use" />
          <Nav title="Other Sources" data={sourcesData} />
          <Smm title="Contact" data={contactData} />
        </div>
      </div>
    </footer >
  )
}

export default Footer