import React, { useEffect, useState } from 'react'
import baseApi from '../../../../../apis/baseApi'
import './Styles.scss'

export const ManagerSelect = ({ title, value, id, onChange, style, required }) => {
  const [data, setData] = useState([])

  const getManagers = async () => {
    try {
      const { data } = await baseApi.get('/api/getAdminModerator')
      setData(data)
    } catch (error) {
      console.log(`Error: ${error.message}`)
    }
  }

  useEffect(() => {
    getManagers()
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
    <label className='addproperties__card-singleselect'>
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
  )
}

// {
//   // id: "example", hin version haskanal xi er drac //nshelov yntreq ancum ein required y
//   id: "",
//   name: "Ընտրեք"
// },