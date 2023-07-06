import React from 'react'

export const Btn = ({ status, text }) => {
    return (
        <button
            type='button'
            disabled={true}
            style={{
                background: status === "approved" ? "#4BC76D" : status === "moderation" ? "#DBBA45" : "#4B7CC7",
                width: status === "approved" ? "97px" : "100%",
                color: "white",
                padding: "4px",
                borderRadius: "2px"
            }}
        >
            {text}
        </button>
    )
}
