//https://react-select.com/home nayel package-y
import React from 'react'

export const SelectRole = ({ onChange, value }) => {
    return (
        <label className='dash__label'>
            {/* Role */}
            Հաստիք
            <select value={value} name="role" id="user_role" className='dash__input-selectrole' onChange={onChange} required>
                <option value="" >Հաստիք</option>
                <option value="admin">Admin</option>
                <option value="moderator">Moderator</option>
                <option value="agent">Agent</option>
            </select>
        </label>
    )
}
