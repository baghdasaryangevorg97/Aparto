import React from 'react'
import { useDispatch } from 'react-redux'
import { login } from '../../../../../store/slices/authSlice'
import { LoginMail } from '../inputs/LoginMail'
import { LoginPassword } from '../inputs/LoginPassword'
import { BtnCustom } from '../../../../components/buttons/BtnCustom'
import '../../../../components/inputs/Inputs.scss'

export const LoginForm = () => {
    const dispatch = useDispatch()

    const handleLogin = (e) => {
        e.preventDefault()
        let email = e.target.loginEmail.value;
        let password = e.target.loginPassword.value;
        dispatch(login({ email, password }))
        e.target.loginEmail.value = ""
        e.target.loginPassword.value = ""
    }

    return (
        <form onSubmit={handleLogin} autoComplete="off">
            <LoginMail id="loginEmail" />
            <LoginPassword id="loginPassword" />
            <BtnCustom type="submit" text="Մուտք" />
        </form>
    )
}
