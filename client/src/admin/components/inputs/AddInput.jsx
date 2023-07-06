import React from 'react'
import './Inputs.scss'

// ^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$ full name regex

export const AddInput = ({ id, type, placeholder, name, onChange }) => {
    return (
        <label className='dash__label'>
            {/* For English */}
            {/* {type === 'tel'
                ? name + ' (+374)' : type === 'password'
                    ? name + ' password' : name} */}
            {type === 'tel' ? name + ' (+374)' : name}
            <input
                id={id}
                type={type}
                placeholder={placeholder}
                name={name}
                className="dash__input"
                minLength={type === 'text' ? "3" : null}
                pattern={type === 'tel'
                    ? "[\\+]374(4[134]|55|77|88|9[134689])\\d{6}"
                    : type === 'email'
                        ? "[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,4}$"
                        : type === "password" ? ".{6,}"
                            : null}
                required={type === 'tel' ? false : true}
                onChange={onChange}
                title={type === "password" ? "Password min length is 6." : null}
            />
        </label>
    )
}

