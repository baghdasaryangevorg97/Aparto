import React from 'react'

export const EditInput = ({ id, type, placeholder, name, onChange, value }) => {
    return (
        <label className='dash__label'>
            {type === 'tel'
                ? name + ' (+374)' : type === 'password'
                    ? name + ' password' : name}
            <input
                // id={id}
                type={type}
                placeholder={placeholder}
                name={name}
                className="dash__input"
                minLength={type === 'text' ? "3" : null}
                pattern={type === 'tel'
                    ? "[\\+]374(4[134]|55|77|88|9[134689])\\d{6}"
                    : type === 'email'
                        ? "[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,4}$"
                        : null}
                required={type === 'tel' ? false : true}
                onChange={onChange}
                value={value}
            />
        </label>
    )
}
