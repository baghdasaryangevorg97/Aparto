import React, { useState } from 'react'
import { ownerAdd, remove } from '../../../../svgs/svgs'
import './Styles.scss'
import '../inputs/Styles.scss'

export const AddOwner = ({ data, onChange }) => {
    const [active, setActive] = useState(false)
    const [activeTwo, setActiveTwo] = useState(false)

    const secondOwner = data?.slice(0, 2)
    const thirdOwner = data?.slice(2, data.length)

    return (
        <div className='addOwner'>
            <button
                type='button'
                className={!active ? 'addOwner__addBtn' : 'addOwner__addBtnHidden'}
                onClick={() => setActive(true)}
            >
                {ownerAdd.icon}
                Ավելացնել սեփականատեր
            </button>

            <div className={active ? 'addOwner__labelsActive' : 'addOwner__labels'}>
                <button
                    type='button'
                    className='addOwner__labelsActive-remove'
                    onClick={() => setActive(false)}
                    style={{ display: activeTwo ? "none" : "flex" }}
                >
                    {remove.icon}
                    Հեռացնել
                </button>
                {secondOwner?.map(({ title, key, placeholder, style }) => {
                    return (
                        <label
                            className='cardText'
                            key={key}
                        >
                            {title}
                            <input
                                id={key}
                                type="text"
                                placeholder={placeholder ? placeholder : "Ex."}
                                className='cardText-full'
                                minLength="3"
                                style={{ width: style }}
                                onChange={onChange}
                            />
                        </label>
                    )
                })}
                <button
                    type='button'
                    className={!activeTwo ? 'addOwner__addBtn' : 'addOwner__addBtnHidden'}
                    onClick={() => setActiveTwo(true)}
                >
                    {ownerAdd.icon}
                    Ավելացնել սեփականատեր
                </button>
            </div>

            <div className={activeTwo ? 'addOwner__labelsActive' : 'addOwner__labels'} style={{ paddingTop: "16px" }}>
                <button
                    type='button'
                    className='addOwner__labelsActive-remove'
                    onClick={() => setActiveTwo(false)}
                >
                    {remove.icon}
                    Հեռացնել
                </button>
                {activeTwo && thirdOwner?.map(({ title, key, placeholder, style }) => {
                    return (
                        <label
                            className='cardText'
                            key={key}
                        >
                            {title}
                            <input
                                id={key}
                                type="text"
                                placeholder={placeholder ? placeholder : "Ex."}
                                className='cardText-full'
                                minLength="3"
                                style={{ width: style }}
                                onChange={onChange}
                            />
                        </label>
                    )
                })}
            </div>

        </div>
    )
}
