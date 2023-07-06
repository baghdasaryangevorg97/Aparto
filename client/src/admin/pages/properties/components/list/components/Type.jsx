import React from 'react'
import '../Styles.scss'

export const Type = ({ data }) => {
    return (
        <span
            style={{
                display: data === "Հասարակ" ? "none" : "block",
                background: data === "Տոպ"
                    ? "#2eaa50"
                    : data === "Շտապ"
                        ? "#4a46f1" : "#e7e9f0"
                // color: data === "Հասարակ" ? "#0f1013" : "#ffffff",
            }}
        >{data}
        </span>
    )
}
