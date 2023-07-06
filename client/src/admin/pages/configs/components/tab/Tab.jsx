import React from 'react'
import '../../Configs.scss'

export const Tab = ({ active, setActive }) => {
  return (
    <nav className='configs__nav'>
      <ul className='configs__nav-list'>
        <li
          onClick={() => setActive('searches')}
          className={active === "searches" ? 'configs__nav-linkActive' : 'configs__nav-link'}
        >
          Որոնումներ
        </li>
        <li
          onClick={() => setActive('addresses')}
          className={active !== "addresses" ? 'configs__nav-link' : 'configs__nav-linkActive'}

        >
          Հասցեներ
        </li>
        <li
          onClick={() => setActive('exchange')}
          className={active !== "exchange" ? 'configs__nav-link' : 'configs__nav-linkActive'}

        >
          Փոխարժեք
        </li>
      </ul>

      {active === "searches"
        ? <h3>Օգտատերերի Որոնումներ</h3>
        : active === "addresses"
          ? <h3>Հասցեներ</h3>
          : <h3>Փոխարժեք</h3>
      }
    </nav>
  )
}
