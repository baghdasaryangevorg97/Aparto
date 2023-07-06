import React, { useState } from 'react'
import './Styles.scss'

export const NumSelector = ({ id, title, data, value, style, onChange }) => {
    const [state, setState] = useState(value ? value : null)
    // value = id + state // aranc id u sra ashxatuma hasknal inja sa

    return (
        <label className='cardText' style={{ width: style }}>
            {title}
            <div id={id} style={{ display: "flex", gap: "4px" }}>
                {data?.map((el) => (
                    <button
                        type="button"
                        key={el.value}
                        id={el.id}
                        value={el.value}
                        onClick={(e) => { onChange(e); setState(el.value) }}
                        className='cardText-numSelector'
                        style={{ backgroundColor: state === el.value ? "#cfd1da" : "#f3f4f8" }}
                    >
                        {el.value}
                    </button>
                ))}
            </div>
        </label>
    )
}
