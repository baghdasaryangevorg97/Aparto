import React from 'react'
import { useSesionState } from '../../../hooks/useSessionState'
import { Tab } from './components/tab/Tab'
import { Searches } from './components/searches/Searches'
import { Addresses } from './components/addresses/Addresses'
import { Exchange } from './components/exchange/Exchange'
import './Configs.scss'

const Configs = () => {
    const [active, setActive] = useSesionState('searches', 'configs')

    return (
        <article className='configs'>
            <Tab
                active={active}
                setActive={setActive}
            />
            {active === "searches"
                ? <Searches />
                : active === "addresses"
                    ? <Addresses />
                    : <Exchange />
            }
        </article>
    )
}

export default Configs