import React, { useState } from 'react'
import { flags } from '../../../properties/components/dropdowns/data'
import Flag from 'react-world-flags'
import { BtnOnclick } from '../../../../components/buttons/BtnOnclick'
import { useDispatch } from 'react-redux'
import { addStructureField } from '../../../../../store/slices/structureSlice'
import { capitalize } from '../../../../../helpers/formatters'
import { error, success } from '../../../../../components/swal/swal'
import './Modal.scss'

export const Modal = ({ title, active, setActive, name }) => {
    const [arm, setArm] = useState('')
    const [rus, setRus] = useState('')
    const [eng, setEng] = useState('')

    const [activeFlag, setActiveFlag] = useState('am')

    const dispatch = useDispatch()

    const postAddedField = () => {
        if (arm && rus && eng) {

            const uniqueId = name + capitalize(eng.toLowerCase().split(' ').join('')) + 'Added'

            const am = {
                name: name,
                key: uniqueId,
                title: arm
            }
            const ru = {
                name: name,
                key: uniqueId,
                title: rus
            }
            const en = {
                name: name,
                key: uniqueId,
                title: eng
            }

            setArm("")
            setRus("")
            setEng("")
            setActiveFlag('am')

            const addedField = { am, en, ru }
            // console.log(addedField)//
            dispatch(addStructureField({ addedField }))
            setActive(true)
            success('Դաշտն ավելացվեց:')
        } else {
            error("Լրացրեք բոլոր լեզուները!")
        }
    }

    return (
        <div className={active ? "modal-close" : "modal-open"}>
            <div className='modal__card'>
                <h3>Ավելացնել Դաշտ</h3>

                <p>Դուք ցանկանում եք ավելացնել նոր դաշտ “{title}” բաժնում</p>

                <div>
                    <div className="modal__card-flags">
                        {flags.map(({ country_code }) => (
                            <Flag
                                key={country_code}
                                code={country_code}
                                onClick={() => setActiveFlag(country_code)}
                                className={activeFlag === country_code ? 'modal__card-flags-flagActive' : 'modal__card-flags-flag'}
                                width="36"
                                height="20"
                            />
                        ))}
                    </div>

                    {activeFlag === "am"
                        ? <label className='modal__card-label'>
                            դաշտի անվանում *
                            <input
                                value={arm}
                                type="text"
                                placeholder='Նշեք դաշտի անվանումը'
                                minLength="3"
                                onChange={(e) => setArm(e.target.value)}
                            />
                        </label>
                        : activeFlag === "ru"
                            ? <label className='modal__card-label'>
                                դաշտի անվանում {activeFlag}*
                                <input
                                    value={rus}
                                    type="text"
                                    placeholder='Նշեք դաշտի անվանումը'
                                    minLength="3"
                                    onChange={(e) => setRus(e.target.value)}
                                />
                            </label>
                            : <label className='modal__card-label'>
                                դաշտի անվանում {activeFlag}*
                                <input
                                    value={eng}
                                    type="text"
                                    placeholder='Նշեք դաշտի անվանումը'
                                    minLength="3"
                                    onChange={(e) => setEng(e.target.value)}
                                />
                            </label>}
                </div>

                <BtnOnclick
                    text="Պահպանել"
                    onClick={postAddedField}
                />

                <button
                    className='modal__card-discard'
                    onClick={() => setActive(true)}
                >
                    Չեղարկել
                </button>
            </div>
        </div>
    )
}
