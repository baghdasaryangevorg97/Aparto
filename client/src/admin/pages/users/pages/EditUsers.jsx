import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { getUsers } from '../../../../store/slices/usersSlice'
import { getUserGlobal } from '../../../../store/slices/userGlobalSlice'
import { Loader } from '../../../../components/loader/Loader'
import { useNavigate, useParams } from 'react-router-dom'
import AddPart from '../../../components/addPart/AddPart'
import { SelectRole } from '../components/SelectRole'
import { ImgUpload } from '../../../components/inputs/ImgUpload'
import { EditInput } from '../../../components/inputs/EditInput'
import { DisabledInput } from '../../../components/inputs/DisabledInput'
import { RiDeleteBin5Fill } from 'react-icons/ri'
import baseApi from '../../../../apis/baseApi'
import { API_BASE_URL } from '../../../../apis/config'
import { error, success } from '../../../../components/swal/swal'
import './Styles.scss'

const EditUsers = () => {
    const [loading, setLoading] = useState(false)

    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(getUsers())
    }, [dispatch])

    const { users } = useSelector((state => state.users))

    const navigate = useNavigate()
    const params = useParams()
    const userId = Number(params.id)

    const currentUser = users?.find(item => item.id === userId)

    const email = currentUser?.email
    const [avatar, setAvatar] = useState(currentUser?.photo)
    const [uploaded, setUploaded] = useState([])
    const [avatarUrl, setAvatarUrl] = useState([])
    const [statusPhoto, setStatusPhoto] = useState(currentUser?.photo)
    const [role, setRole] = useState(currentUser?.role)
    const [am, setAm] = useState(currentUser?.full_name?.am)
    const [ru, setRu] = useState(currentUser?.full_name?.ru)
    const [en, setEn] = useState(currentUser?.full_name?.en)
    const [tel1, setTel1] = useState(currentUser?.phone?.tel1)
    const [tel2, setTel2] = useState(currentUser?.phone?.tel2)
    const [messengers, setMessengers] = useState(currentUser?.phone?.messengers)

    const addAvatar = (e) => {
        setAvatar(e.target.files[0]) // jnjel
        setUploaded(e.target.files[0])
        setStatusPhoto('changed')

        let selectedAvatar = e.target.files
        let selectedArray = Array.from(selectedAvatar)

        setAvatarUrl(selectedArray.map((file) => {
            return URL.createObjectURL(file)
        }))
    }

    const removeAvatar = () => {
        setAvatar()
        setAvatarUrl([])
        setUploaded([])
        setStatusPhoto('removed')
    }

    const changeStatus = () => {
        setLoading(true)

        let statusChangeInfo = {
            id: userId,
            status: currentUser?.status === "approved" ? "deactivated" : "approved"
        }

        baseApi.post('/api/changeStatus', statusChangeInfo)
            .then(res => {
                success(res.data.message)
                navigate(-1)
            })
            .catch(err => error(err.message))
            .finally(() => {
                setLoading(false)
            })
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        setLoading(true)

        let userInfo = {
            id: userId,
            full_name: {
                am: am,
                ru: ru,
                en: en,
            },
            phone: {
                tel1: tel1,
                tel2: tel2,
                messengers: messengers,
            },
            role: role,
        }

        const formData = new FormData()
        formData.append('file', uploaded)
        formData.append('fileName', uploaded?.name)
        formData.append('avatarChangeStatus', statusPhoto)
        formData.append('userEditedInfo', JSON.stringify(userInfo))

        baseApi.post('/api/editUser', formData)
            .then((res) => {
                success(res.data.status)
                dispatch(getUserGlobal())
            })
            .catch(err => error(err.message))
            .finally(() => {
                setLoading(false)
                navigate(-1)
            })
    }

    return (
        loading
            ? <Loader />
            : <article className='subUsers'>
                <AddPart
                    type="editUser"
                    changeStatus={changeStatus}
                    currentUser={currentUser}
                />
                <div className="subUsers__container">
                    <div className='subUsers__choose'>
                        {avatar && avatarUrl.length === 0
                            ? <div className='subUsers__uploaded'>
                                <img src={API_BASE_URL + '/images/' + currentUser.photo} alt="User" />
                                <button
                                    onClick={removeAvatar} //() => setAvatar()
                                ><RiDeleteBin5Fill /></button>
                            </div>
                            : null
                        }
                        {!avatarUrl.length === 0 || !avatar
                            ? <ImgUpload onChange={addAvatar} />
                            : avatarUrl.map((img, index) => {
                                return (
                                    <div key={index} className='subUsers__uploaded'>
                                        <img src={img} alt="Uploaded Avatar" />
                                        <button
                                            onClick={removeAvatar}
                                        ><RiDeleteBin5Fill /></button>
                                    </div>
                                )
                            })
                        }
                    </div>
                    <form id="editUserForm" onSubmit={handleSubmit} className='subUsers__form'>
                        <div className='subUsers__form-parts'>
                            <EditInput
                                type='text'
                                placeholder='Գրեք անուն ազգանուն'
                                name='Անուն'
                                onChange={(e) => setAm(e.target.value)}
                                value={am}
                            />
                            <EditInput
                                type='text'
                                placeholder='Գրեք անուն ազգանուն'
                                name='Անուն RUS'
                                onChange={(e) => setRu(e.target.value)}
                                value={ru}
                            />
                            <EditInput
                                type='text'
                                placeholder='Գրեք անուն ազգանուն'
                                name='Անուն ENG'
                                onChange={(e) => setEn(e.target.value)}
                                value={en}
                            />
                        </div>
                        <div className='subUsers__form-parts'>
                            <DisabledInput
                                name='էլ․ հասցե'
                                value={email}
                            />
                            <SelectRole
                                role={role}
                                setRole={setRole}
                                onChange={(e) => setRole(e.target.value)}
                                value={role}
                            />
                            <EditInput
                                type='tel'
                                placeholder='Գրեք hեռ․ համար'
                                name='Հեռ․ համար 1'
                                onChange={(e) => setTel1(e.target.value)}
                                value={tel1}
                            />
                        </div>
                        <div className='subUsers__form-parts-else'>
                            <EditInput
                                type='tel'
                                placeholder='Գրեք hեռ․ համար'
                                name='viber/ whatsapp / telegram'
                                onChange={(e) => setMessengers(e.target.value)}
                                value={messengers}
                            />
                            <EditInput
                                type='tel'
                                placeholder='Գրեք hեռ․ համար'
                                name='Հեռ․ համար 2'
                                onChange={(e) => setTel2(e.target.value)}
                                value={tel2}
                            />
                        </div>
                    </form>
                </div>
            </article>
    )
}

export default EditUsers