import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from "react-redux"
import { getExchangeData, setExchangeData } from '../../../../../store/slices/configsSlice'
import { InputSymbol } from '../../../properties/components/inputs/InputSymbol'
import { BtnOnclick } from '../../../../components/buttons/BtnOnclick'
import { error } from '../../../../../components/swal/swal'
import './Exchange.scss'

export const Exchange = () => {
    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(getExchangeData())
    }, [dispatch])

    const { exchange } = useSelector((state) => state.configs)

    const [value, setValue] = useState('')

    const addExchange = () => {
        if (value.length < 3 && value.length !== 0) {
            error("Գրեք իրական կուրսը!")
        } else if (Number(value) === exchange?.amount) {
            error("Փոփոխություն չկա!")
        } else if (value.length >= 3) {
            let ex = {
                exchange: value
            }
            dispatch(setExchangeData({ ex }))
            setValue('')
        } else {
            error("Լրացրեք դոլարի կուրսը!")
        }
    }

    return (
        <section className='exchange'>
            {exchange && 
            <h6>դոլարի կուրս {exchange.amount ? `- 1 USD = ${exchange.amount} AMD` : null}
            <br/>
            <br/>
            վերջին թարմացում - {exchange.date}
            </h6>}

            <div className='exchange__form'>
                <InputSymbol
                    id="exchangeField"
                    type="number"
                    placeholder="Մուտքագրեք դոլարի կուրսը"
                    name="price"
                    value={value}
                    onChange={(e) => setValue(e.target.value)}
                    width="350px"
                />
                <BtnOnclick
                    onClick={addExchange}
                    text="Պահպանել"
                />
            </div>
        </section>
    )
}
