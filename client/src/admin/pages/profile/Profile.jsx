import React from 'react'
import { Personal } from './components/personal/Personal'
import { Password } from './components/password/Password'
import './Profile.scss'

const Profile = () => {
    return (
        <article className='profile'>
            <Personal />
            <Password />
        </article>
    )
}

export default Profile