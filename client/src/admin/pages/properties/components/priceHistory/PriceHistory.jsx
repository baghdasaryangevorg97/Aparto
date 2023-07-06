import React, { useState } from 'react'
import { moneyFormater } from '../../../../../helpers/formatters'
import { down, up } from '../../../../svgs/svgs'
import '../../pages/Styles.scss'

export const PriceHistory = ({ data }) => {
    const [price, setPrice] = useState(true)

    return (
        <div
            className='singleProperty__content-right-price-history'
            onClick={() => setPrice(!price)}
        >
            <p>
                Գնի պատմություն ։  {price ? down.icon : up.icon}
            </p>

            <div className={price ? 'singleProperty__content-right-price-history-list' : 'singleProperty__content-right-price-history-listActive'}>
                {!data || data?.length === 0
                    ? <div
                        className='singleProperty__content-right-price-history-listActive-view'
                    >
                        <p>Փոփոխություններ չեն կատարվել:</p>
                    </div>
                    : data?.map(({ price, date }) => {
                        return (
                            <div
                                className='singleProperty__content-right-price-history-listActive-view'
                                key={date + price}
                            >
                                <p>{moneyFormater(price)} </p>
                                <p>{date}</p>
                            </div>
                        )
                    })
                }
            </div>
        </div>
    )
}
