import React, { useState } from 'react'
import { BtnAdd } from '../../../../components/buttons/BtnAdd'
import { Modal } from '../modal/Modal'
import { remove } from '../../../../svgs/svgs'
import { useDispatch } from 'react-redux'
import { removeStructureField } from '../../../../../store/slices/structureSlice'
import { success } from '../../../../../components/swal/swal'

export const Card = ({ title, name, fields, added, search }) => {
    const [active, setActive] = useState(true)

    active
        ? (document.body.style.overflow = "auto")
        : (document.body.style.overflow = "hidden")

    const dispatch = useDispatch()

    const postRemovedField = (key) => {
        const am = {
            name: name,
            id: key,
        }
        const ru = {
            name: name,
            id: key,
        }
        const en = {
            name: name,
            id: key,
        }
        const removedField = { am, en, ru }
        dispatch(removeStructureField({ removedField }))
        success('Դաշտը հեռացվեց:')
    }

    return (
        <div className='structure__center-card' style={{ display: search }}>
            <h4>{title}</h4>
            <ul>
                <li>
                    <span>Անվանում</span>
                </li>
                {fields?.map(({ key, title }) => {
                    return (
                        <li key={key}>
                            <p>{title.includes('*') ? title.slice(0, -1) : title}</p>
                        </li>
                    )
                })}
                {/* Avelacvacnery */}
                {added.length
                    ? added.map(({ key, title }) => {
                        return (
                            <li
                                key={key}
                                style={{ display: 'flex', justifyContent: "space-between" }}
                            >
                                <p>{title}</p>
                                <button
                                    onClick={() => postRemovedField(key)}
                                >{remove.icon}
                                </button>
                            </li>
                        );
                    })
                    : null}
            </ul>
            <div className='structure__center-card-btn'>
                <BtnAdd onClick={() => setActive(false)} />
            </div>
            <Modal
                name={name}
                title={title}
                active={active}
                setActive={setActive}
            />
        </div>
    )
}
