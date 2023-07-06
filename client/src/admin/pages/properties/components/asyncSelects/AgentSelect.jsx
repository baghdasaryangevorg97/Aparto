import React, { useEffect, useState } from 'react'
import { useSelector } from 'react-redux'
import baseApi from '../../../../../apis/baseApi'
import './Styles.scss'

export const AgentSelect = ({ title, value, id, onChange, style, required }) => {
    const { role } = useSelector((state => state.userGlobal.userGlobal))

    const [data, setData] = useState([])

    const getAgents = async () => {
        try {
            const { data } = await baseApi.get('/api/getAgent')
            setData(data)
        } catch (error) {
            console.log(`Error: ${error.message}`)
        }
    }

    useEffect(() => {
        getAgents()
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [])

    const parsedNames = [
        {
            id: "",
            name: "Ընտրեք"
        },
        ...data.map(item => {
            const parsedName = JSON.parse(item.full_name)
            return {
                id: item.id,
                name: parsedName.am
            }
        })
    ]

    return (
        role !== "agent"
            ? <label className='addproperties__card-singleselect'>
                {title}
                <select
                    id={id}
                    required={required}
                    onChange={onChange}
                    style={{ width: style }}
                    className="addproperties__card-singleselect-dropdown"
                >
                    {parsedNames?.map(({ id, name }) => {
                        return (
                            <option
                                key={id}
                                value={id}
                                selected={name === value}
                            >{name}
                            </option>
                        )
                    })}
                </select>
            </label>
            : <div className='agentSelect'>
                {title}
                <input
                    className='agentSelect__input'
                    type='text'
                    disabled
                    value={value}
                />
            </div>

    )
}
