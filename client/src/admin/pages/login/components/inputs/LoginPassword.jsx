import React from 'react'

export const LoginPassword = ({ id }) => {
    return (
        <input
            id={id}
            type="password"
            placeholder="Ծածկագիր"
            name="password"
            className="dash__input"
            autoComplete="new-password"
        />
    )
}
