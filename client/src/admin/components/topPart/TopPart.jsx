import React from 'react'
import { useSelector } from 'react-redux'
import { useNavigate, useLocation } from 'react-router-dom'
import { BtnAdd } from '../buttons/BtnAdd'
import './TopPart.scss'

const TopPart = ({ data, type }) => {
    const { role } = useSelector((state => state.userGlobal.userGlobal))
    const { pathname } = useLocation()
    const navigate = useNavigate()

    let newPath = pathname.split('/')[2]

    return (
        <div className='topPart'>
            <h3>
                {/* {data?.length === 1 ? data?.length + ' ' + capitalize(newPath.slice(0, -1)) : data?.length === 0 ? 'No Data' : data?.length + ' ' + capitalize(newPath)} */}
                {newPath === "users" ? data?.length + " Օգտատեր" : null}
                {newPath === "properties" && data?.length !== undefined ? data?.length + " Գույք" : null}
            </h3>

            {(role === "admin" && type === "users") || type === "properties"
                ? <BtnAdd onClick={() => navigate('add')} />
                : null
            }
        </div>
    )
}

export default TopPart