import React from 'react'
import './Styles.scss'

export const InputNumSymbol = ({ id, data, title, value, onChange, style, required }) => {
    return (
        <label className='cardText' id={id}>
            {title}
            <div style={{ display: "flex", gap: "12px" }}>
                {data?.map((el) => {

                    if (value) {
                        var currentValue = value[el.id] || value;
                    }

                    return (
                        <div key={el.id}>
                            <input
                                id={el.id}
                                required={required}
                                type="text"
                                placeholder={el.name}
                                className='cardText-price'
                                style={{ width: style }}
                                onChange={onChange}
                                defaultValue={currentValue}
                            />
                            <span>{el.symbol}</span>
                        </div>
                    )
                })}
            </div>
        </label>
    )
}
