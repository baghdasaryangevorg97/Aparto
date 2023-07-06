import React from 'react'
import { useSelector } from 'react-redux'
import { Loader } from '../../../../../components/loader/Loader'
import { Link } from 'react-router-dom'
import { admin, userIcon, shevron, agent, } from '../../../../svgs/svgs'
import { API_BASE_URL } from '../../../../../apis/config'
import { capitalize } from '../../../../../helpers/formatters'
import './User.scss'

const User = () => {
    const { userGlobal } = useSelector((state => state.userGlobal))
    // const { userGlobal, loading } = useSelector((state => state.userGlobal))

    return (
        !userGlobal
            ? <Loader />
            : <Link to='/dashboard/profile' className='user'>
                <div className='user__info'>
                    {!userGlobal.photo?.length && userGlobal.role === "admin"
                        ? admin.icon
                        : !userGlobal.photo?.length && userGlobal.role === "moderator"
                            ? userIcon.icon
                            : !userGlobal.photo?.length && userGlobal.role === "agent"
                                ? agent.icon
                                : <img src={API_BASE_URL + '/images/' + userGlobal.photo} alt="User" />
                    }
                    <div className='user__info-text'>
                        {userGlobal.full_name?.en?.split(' ')[1]
                            ? <p>{userGlobal.full_name?.en?.split(' ')[0] + " " + userGlobal.full_name?.en?.split(' ')[1][0] + "."} </p>
                            : <p>{userGlobal.full_name?.en?.split(' ')[0]}</p>}
                        <span>{
                            userGlobal.role !== undefined
                                ? capitalize(userGlobal.role)
                                : <></>
                        }</span>
                    </div>
                </div>
                {shevron.icon}
            </Link >

    )
}
export default User