import React from 'react'
import './Login.scss'
import { LoginForm } from './components/form/LoginForm'
import { useSelector } from 'react-redux'
import { Loader } from '../../../components/loader/Loader'

const Login = () => {
    const { loading } = useSelector(state => state.auth)

    return (
        <article className='login' >
            {loading
                ? <Loader />
                : <>
                    <h3>Մուտք</h3>
                    <LoginForm />
                </>}
        </article >
    )
}

export default Login