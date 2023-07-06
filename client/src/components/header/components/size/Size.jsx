import React, { useEffect, useRef, useState } from 'react'
import { sizeData } from './data'
// import cookies from 'js-cookie'
import "./Size.scss"

const Size = () => {
    const sizeRef = useRef()
    const [openSize, setOpenSize] = useState(false)
    const [selectedSize, setSelectedSize] = useState(<p className='size__unit'>m<sup>2</sup></p>)

    const handleOpenSize = () => {
        setOpenSize(!openSize);
    }

    const handleChangeSize = (name) => {
        setOpenSize(false)
        setSelectedSize(name)
        // cookies.set("sizeUnit", name)
    };

    // const handleChangeSize = useCallback((name) => {
    //     setOpenSize(false)
    //     setSelectedSize(name)
    //     // cookies.set("sizeUnit", name)
    // }, [])

    // error er talis
    // const handleChangeSize = useMemo((name) => {
    //     setOpenSize(false)
    //     setSelectedSize(name)
    //     // cookies.set("sizeUnit", name)
    // }, [])

    useEffect(() => {
        const checkIfClickedOutside = (e) => {
            if (openSize && sizeRef.current && !sizeRef.current.contains(e.target)) {
                setOpenSize(false)
            }
        }
        document.addEventListener("mousedown", checkIfClickedOutside)

        return () => {
            document.removeEventListener("mousedown", checkIfClickedOutside)
        }
    }, [openSize])

    // console.log(selectedSize);

    return (
        <div className='size' ref={sizeRef}>
            <div
                className="size__choose"
                onClick={handleOpenSize}
            >
                {selectedSize}
            </div>

            <ul className={!openSize ? "size__dropdown" : "size__dropdown-active"}>
                {sizeData.map(({ id, name }) => (
                    <li
                        key={id}
                        onClick={() => handleChangeSize(name)}
                    >{name}
                    </li>
                ))}
            </ul>
        </div>
    )
}

export default Size