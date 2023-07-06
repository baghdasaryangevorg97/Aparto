import React from 'react'
import { useDispatch, useSelector } from 'react-redux'
// import { Loader } from '../../../../../components/loading/Loader'
import { logout } from '../../../../../store/slices/authSlice'
import { logOut } from '../../../../svgs/svgs'
import userImg from '../../../../../assets/imgs/user.png'
import { API_BASE_URL } from '../../../../../apis/config'
import { DisabledInput } from '../../../../components/inputs/DisabledInput'

export const Personal = () => {
    const dispatch = useDispatch()

    const { photo, full_name, role, phone, email } = useSelector((state => state.userGlobal.userGlobal))

    const hanldeLogOut = () => {
        dispatch(logout())
    }

    return (
        <>
            <div className='profile__top'>
                <h3>Անձնական Էջ</h3>
                <button onClick={hanldeLogOut} className='profile__top-logout'>
                    {logOut.icon}
                    <p>Դուրս Գալ Համակարգից</p>
                </button>
            </div>

            <div className='profile__data'>
                <div className='profile__data-userImg'>
                    {/* {!photo?.length */}
                    {photo === null
                        ? <img src={userImg} alt="User" />
                        : <img src={API_BASE_URL + '/images/' + photo} alt="User" />
                    }
                </div>
                <div className='profile__data-form'>
                    <div className='profile__data-form-parts'>
                        <DisabledInput
                            name='ԱՆուն'
                            value={full_name?.en}
                        />
                        <DisabledInput
                            name='հաստիք'
                            value={role}
                        />
                    </div>
                    <div className='profile__data-form-parts'>
                        {phone?.tel1?.length
                            ? <DisabledInput
                                name='Հեռախոսահամար'
                                value={phone?.tel1}
                            />
                            : null}
                        <DisabledInput
                            name='էլ. Փոստ'
                            value={email}
                        />
                    </div>
                </div>
            </div>
        </>
    )
}
