import React from 'react'
import logo from '../../../assets/imgs/logo.png'
import Paths from './components/paths/Paths'
import User from './components/user/User'
import './Sidebar.scss'

const Sidebar = () => {
  return (
    <div className='sidebar'>
      <img src={logo} alt="Logo" width="200px" />

      <nav className='sidebar__nav'>
        <Paths />
        <User />
      </nav>
    </div>
  )
}

export default Sidebar