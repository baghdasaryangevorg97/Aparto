import React from 'react'
import Select from 'react-select'

export const EditableSelect = ({ title, id, name, data, value, style, required, onChange }) => {
    
    const handleChange = (selectedOptions) => {
        const selectedValues = selectedOptions.map((option) => option.value)
        const e = {
            target: {
                id,
                value: selectedValues,
            },
        }

        onChange(e, name)
    }

    return (
        <label className='addproperties__card-singleselect' >
            {title}
            <Select
                isMulti
                defaultValue={data?.filter((option) => value.includes(option.label))}
                // defaultValue={data.filter(function (option) {
                //     return option.label === value;
                // })}
                closeMenuOnSelect={false}
                options={data}
                placeholder="Ընտրեք"
                onChange={handleChange}
                styles={{
                    control: (baseStyles) => ({
                        ...baseStyles,
                        width: style,
                        borderRadius: "8px",
                        fontWeight: "400",
                        fontSize: "14px",
                        textTransform: "capitalize",
                        lineHeight: "16px",
                        borderColor: '#e7e9f0',
                        '&:hover': {
                            borderColor: '#e7e9f0',
                        },
                        boxShadow: 'none',
                        background: "#f3f4f8",
                        cursor: "pointer"
                    }),
                }}

            />
        </ label>
    )
}