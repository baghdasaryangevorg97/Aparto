import React, { useEffect, useState } from 'react'
import baseApi from '../../../../../apis/baseApi'

export const CommunitySelect = ({ title, id, required, value, defValue, valueId, streetData, onChange, onStreetChange, data, style }) => {
    const [streets, setStreets] = useState([])
    const [communityId, setCommunityId] = useState(valueId ? valueId : 1)

    const getStreetsByCommunityId = async () => {
        try {
            const { data } = await baseApi.get(`/api/getAllAddresses/${communityId}`)
            setStreets(data)
        } catch (error) {
            console.log(`Error: ${error.message}`)
        }
    }

    useEffect(() => {
        getStreetsByCommunityId()
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [communityId])

    const handleChange = (e) => {
        let id = e.target.value.replace(/\D/g, "")
        // let idSend = e.target.value
        setCommunityId(id)
        onChange(e)
    }

    return (
        <div style={{ display: "flex", flexDirection: "column", gap: "16px", width: "283px" }}>
            <label className='addproperties__card-singleselect'>
                {title}
                <select
                    id={id}
                    required={required}
                    value={value}
                    onChange={handleChange}
                    style={{ width: style }}
                    className="addproperties__card-singleselect-dropdown"
                >
                    {data?.map(({ id, name, getOptionName, value }) => {
                        return (
                            <option
                                key={id}
                                // value={getOptionName + id}
                                value={id === 1 ? getOptionName : getOptionName + id}
                                selected={value === defValue}
                            >{name}
                            </option>
                        )
                    })}
                </select>
            </label>
            <label className='addproperties__card-singleselect' style={{ width: "283px" }}>
                {streetData?.title}
                <select
                    id={id}
                    required={required}
                    defaultValue={value}
                    onChange={(e) => onStreetChange(e.target.value)}
                    className="addproperties__card-singleselect-dropdown"
                >
                    {streets.id === 1
                        ? <option>{streets.am}</option>
                        : streets?.map(({ id, am }) => {
                            return (
                                <option
                                    key={id}
                                    // value={id}
                                    value={id === 1 ? '' : id}
                                    selected={streetData?.streetId === id}
                                >{am}
                                </option>
                            )
                        })
                    }
                </select>
            </label>
        </div>
    )
}
