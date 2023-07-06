import React, { useState } from 'react'
import { Search } from '../../../../components/inputs/Search'
import DatePicker from "react-datepicker"
import "react-datepicker/dist/react-datepicker.css"
import { calendar } from '../../../../svgs/svgs'
import Table from '../../../../components/table/Table'
import { searchColumns, searchTypes, searches } from './data'
import './Searches.scss'

export const Searches = () => {
    const [search, setSearch] = useState("")
    const [date, setDate] = useState(null)
    const [select, setSelect] = useState("Որոնման տեսակ")

    return (
        <section className='searches'>
            <div className='searches__top'>
                <Search
                    value={search}
                    placeholder="Փնտրել"
                    onChange={(e) => setSearch(e.target.value.toLowerCase())}
                />
                <div className='searches__top-right'>
                    <select
                        className="dash__input-dropdown"
                        value={select}
                        onChange={(e) => setSelect(e.target.value)}
                    >
                        <option value="">Search Types</option>
                        {searchTypes.map(({ id, value }) => {
                            return (
                                <option key={id}>{value}</option>
                            )
                        })}
                    </select>
                    <DatePicker
                        className='searches__top-right-picker'
                        selected={date}
                        onChange={(date) => setDate(date)}
                        disabledKeyboardNavigation
                        placeholderText="Date Range"
                        withPortal
                    />
                    <span>{calendar.icon}</span>
                </div>
            </div>

            <div className='searches__bottom'>
                <Table
                    Data={searches}
                    Columns={searchColumns}
                    // type="searches"
                />
            </div>
        </section>
    )
}
