import React, { useEffect, useRef, useState } from 'react'
import { FaDollarSign } from 'react-icons/fa'
import { headerExchange } from './data'
import './Exchange.scss'

const Exchange = () => {
    const exRef = useRef()
    const [openEx, setOpenEx] = useState(false)
    const [selectedEx, setSelectedex] = useState(<FaDollarSign className='exchange__flag' />)

    const handleOpenEx = () => {
        setOpenEx(!openEx);
    }

    const handleChangeEx = (symbol) => {
        setOpenEx(false)
        setSelectedex(symbol)
    };

    useEffect(() => {
        const checkIfClickedOutside = (e) => {
            if (openEx && exRef.current && !exRef.current.contains(e.target)) {
                setOpenEx(false)
            }
        }
        document.addEventListener("mousedown", checkIfClickedOutside)

        return () => {
            document.removeEventListener("mousedown", checkIfClickedOutside)
        }
    }, [openEx])

    // console.log(selectedEx);

    return (
        <div className='exchange' ref={exRef}>
            <div
                className='exchange__choose'
                onClick={handleOpenEx}
            >
                {selectedEx}
            </div>

            <ul className={!openEx ? "exchange__dropdown" : "exchange__dropdown-active"}>
                {headerExchange.map(({ id, symbol }) => (
                    <li key={id} onClick={() => handleChangeEx(symbol)}>
                        {symbol}
                    </li>
                ))}
            </ul>
        </div>
    )
}

export default Exchange