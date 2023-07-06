import React from 'react'
import { useSelector } from 'react-redux'
import { Loader } from '../../../../../components/loader/Loader'
import { Item } from './components/Item'
import './Styles.scss'

export const List = () => {
    const { propertyData, filteredData } = useSelector((state) => state.property)

    return (
        <div className="propertyList">
            {!propertyData && !filteredData
                ? <Loader />
                : filteredData === null
                    ? <Item data={propertyData} />
                    : <Item data={filteredData} />
            }
        </div>
    )
}
