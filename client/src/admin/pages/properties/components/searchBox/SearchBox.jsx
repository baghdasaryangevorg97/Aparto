import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { getPropertyData, setFilteredData } from '../../../../../store/slices/propertySlice'
import { Search } from '../../../../components/inputs/Search'
import { AdvancedBtn } from '../inputs/AdvancedBtn'
import { Drowpdown } from '../../../../components/dropdowns/Drowpdown'
import { SaleRent, EstateType, Community, Rooms, BuildingType, Situation, Status } from './data'
import { InputSymbol } from '../inputs/InputSymbol'
import { BtnCustom } from '../../../../components/buttons/BtnCustom'
import './SearchBox.scss'

export const SearchBox = () => {
    const [search, setSearch] = useState('')
    const [active, setActive] = useState(true)
    const [properties, setProperties] = useState('')

    const { propertyData } = useSelector((state) => state.property)

    const dispatch = useDispatch()

    useEffect(() => {
        if (search === "") {
            dispatch(setFilteredData(propertyData))
        } else {
            const filteredData = propertyData?.filter((property) =>
                property?.searchAllProperty?.some((value) =>
                    String(value).toLowerCase().includes(search.toLowerCase())
                )
            )
            dispatch(setFilteredData(filteredData))
        }
    }, [dispatch, propertyData, search])


    const propertiesSearch = (e) => {
        let { id, value } = e.target

        setProperties((prev) => {
            return { ...prev, [id]: value }
        })
    }

    const submitSearch = (e) => {
        e.preventDefault()
        setSearch('')
        dispatch(getPropertyData({ properties }))
    }

    // console.log(propertyData)//

    return (
        <div className="propertiySearchbox">
            <div className="propertiySearchbox__top">
                <Search
                    value={search}
                    placeholder='Փնտրել ըստ ID, Անուն, Փողոց, Հեռ․, Սեփականատեր կամ Գործակալ'
                    onChange={(e) => setSearch(e.target.value)}
                />
                <AdvancedBtn
                    status={active}
                    onClick={() => setActive(!active)}
                />
            </div>

            <form id="propertiesSearch" onSubmit={submitSearch} className='propertiySearchbox__form'>
                <div className={"propertiySearchbox__form-open"}>
                    <Drowpdown
                        id='prop_transactionType'
                        onChange={propertiesSearch}
                        data={SaleRent}
                        width="200px"
                    />
                    <Drowpdown
                        id='prop_propertyType'
                        onChange={propertiesSearch}
                        data={EstateType}
                        width="200px"
                    />
                    <Drowpdown
                        id='prop_community'
                        onChange={propertiesSearch}
                        data={Community}
                        width="200px"
                    />
                    <Drowpdown
                        id='prop_numberOfRooms'
                        onChange={propertiesSearch}
                        data={Rooms}
                        width="200px"
                    />
                    <InputSymbol
                        id='prop_minPrice'
                        type="number"
                        placeholder="Գին մին."
                        name="price"
                        onChange={propertiesSearch}
                        width="145px"
                    />
                    <InputSymbol
                        id='prop_maxPrice'
                        type="number"
                        placeholder="Գին մաքս."
                        name="price"
                        onChange={propertiesSearch}
                        width="145px"
                    />
                </div>
                <div className={active ? "propertiySearchbox__form-close" : "propertiySearchbox__form-open"}>
                    <Drowpdown
                        id='prop_buildingType'
                        onChange={propertiesSearch}
                        data={BuildingType}
                        width="200px"
                    />
                    <InputSymbol
                        id='prop_floor'
                        type="number"
                        placeholder="Հարկը"
                        onChange={propertiesSearch}
                        width="160px"
                    />
                    <InputSymbol
                        id='prop_statement'
                        type="number"
                        placeholder="Հարկայնություն"
                        onChange={propertiesSearch}
                        width="160px"
                    />
                    <Drowpdown
                        id='prop_houseCondition'
                        onChange={propertiesSearch}
                        data={Situation}
                        width="220px"
                    />
                    <InputSymbol
                        id='prop_minSquare'
                        type="text"
                        placeholder="Մակերես մին."
                        name="square"
                        onChange={propertiesSearch}
                        width="175px"
                    />
                    <InputSymbol
                        id='prop_maxSquare'
                        type="text"
                        placeholder="Մակերես մաքս."
                        name="square"
                        onChange={propertiesSearch}
                        width="175px"
                    />
                </div>
                <div className={active ? "propertiySearchbox__form-close" : "propertiySearchbox__form-open"}>
                    <Drowpdown
                        id='prop_status'
                        onChange={propertiesSearch}
                        data={Status}
                        width="200px"
                    />
                </div>
                <BtnCustom
                    form="propertiesSearch"
                    text="Փնտրել"
                />
            </form>
        </div>
    )
}

// For edit and view
// <Drowpdown
// value={situation}
// onChange={(e) => setSituation(e.target.value)}
// data={Situation}
// />