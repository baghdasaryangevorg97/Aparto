import React, { useState } from 'react'
import Flag from 'react-world-flags'
import { community, flags } from '../../../properties/components/dropdowns/data'
import { BtnOnclick } from '../../../../components/buttons/BtnOnclick'
import { useDispatch } from 'react-redux'
import { addConfigsAddress } from '../../../../../store/slices/configsSlice'
import { capitalize } from '../../../../../helpers/formatters'
import { error, success } from '../../../../../components/swal/swal'
import '../../../structure/components/modal/Modal.scss'
import './Modal.scss'

export const Modal = ({ open, setOpen }) => {
    const [arm, setArm] = useState('')
    const [rus, setRus] = useState('')
    const [eng, setEng] = useState('')
    const [selectedId, setSelectId] = useState('')

    const [activeFlag, setActiveFlag] = useState('am')

    const dispatch = useDispatch()

    const postAddedAddress = () => {
        if (selectedId && selectedId !== "1" && arm && rus && eng) {

            let uniqueId = "street" + capitalize(eng.toLowerCase().split(' ').join(''))

            let am = {
                id: uniqueId,
                value: arm,
                communityId: Number(selectedId)
            }
            let ru = {
                id: uniqueId,
                value: rus,
                communityId: Number(selectedId)
            }
            let en = {
                id: uniqueId,
                value: eng,
                communityId: Number(selectedId)
            }

            setArm("")
            setRus("")
            setEng("")
            setActiveFlag('am')
            setSelectId('')

            const addedAddress = { am, en, ru }
            setOpen(false)
            dispatch(addConfigsAddress({ addedAddress }))
            success('Հասցեն ավելացված է։')
        } else {
            error("Լրացրեք բոլոր դաշտերը!")
        }
    }

    return (
        <div className={!open ? "modal-close" : "modal-open"}>
            <div className='modal__card'>
                <h3>Ավելացնել Հասցե</h3>

                <p>Դուք ցանկանում եք ավելացնել հասցե հասցեների ցանկում</p>

                <div>
                    <label className='modal__label'>
                        Համայնք*
                        <select
                            value={selectedId}
                            onChange={(e) => setSelectId(e.target.value)}
                            className='modal__label-select'
                        >
                            {community.map((el) => {
                                return (
                                    <option
                                        // disabled={el.id === 1 ? "disabled" : null}
                                        key={el.id}
                                        value={el.id}
                                    >{el.value}
                                    </option>
                                )
                            })}
                        </select>
                    </label>

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
                            Հասցե*
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
                                Հասցե {activeFlag}*
                                <input
                                    value={rus}
                                    type="text"
                                    placeholder='Նշեք դաշտի անվանումը'
                                    minLength="3"
                                    onChange={(e) => setRus(e.target.value)}
                                />
                            </label>
                            : <label className='modal__card-label'>
                                Հասցե {activeFlag}*
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
                    onClick={postAddedAddress}
                />

                <button
                    className='modal__card-discard'
                    onClick={() => setOpen(false)}
                >
                    Չեղարկել
                </button>
            </div>
        </div>
    )
}
