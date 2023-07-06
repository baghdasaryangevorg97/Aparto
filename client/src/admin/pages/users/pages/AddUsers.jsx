import React, { useState } from 'react'
import { Loader } from '../../../../components/loader/Loader'
import { useNavigate } from 'react-router-dom'
import AddPart from '../../../components/addPart/AddPart'
import { ImgUpload } from '../../../components/inputs/ImgUpload'
import { RiDeleteBin5Fill } from 'react-icons/ri'
import { AddInput } from '../../../components/inputs/AddInput'
import { SelectRole } from '../components/SelectRole'
import { capitalize } from '../../../../helpers/formatters'
import baseApi from '../../../../apis/baseApi'
import { error, goodJob } from '../../../../components/swal/swal'
import { addUserInputs } from '../data'
import './Styles.scss'

const AddUsers = () => {
    const [loading, setLoading] = useState(false)
    const [avatar, setAvatar] = useState()
    const [avatarUrl, setAvatarUrl] = useState([])
    const [info, setInfo] = useState({})

    const navigate = useNavigate()

    const handleAvatar = (e) => {
        setAvatar(e.target.files[0])

        let selectedAvatar = e.target.files
        let selectedArray = Array.from(selectedAvatar)

        setAvatarUrl(selectedArray.map((file) => {
            return URL.createObjectURL(file)
        }))
    }

    const handleChange = (e) => {
        let { id, value } = e.target

        setInfo((prev) => {
            return { ...prev, [id]: value }
        })
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        setLoading(true)

        let userInfo = {
            full_name: {
                am: capitalize(info.user_name_am),
                ru: capitalize(info.user_name_ru),
                en: capitalize(info.user_name_en),
            },
            email: info.user_mail,
            role: info.user_role,
        };

        const formData = new FormData()

        if (avatar) {
            formData.append('file', avatar)
            formData.append('fileName', avatar.name)
        }

        formData.append('userInfo', JSON.stringify(userInfo))

        baseApi.post('/api/addUser', formData)
            .then(res => {
                goodJob(`Password is - ${res.data.password}`)
                navigate(-1)
            })
            .catch(err => error(err.message))
            .finally(() => {
                setLoading(false)
            })
    }

    return (
        loading
            ? <Loader />
            : <article className='subUsers'>
                <AddPart type="addUsers" />
                <div className='subUsers__container'>
                    <div className='subUsers__choose'>
                        {avatarUrl.length === 0
                            ? <ImgUpload onChange={handleAvatar} multiple={false} />
                            : avatarUrl.map((img, index) => {
                                return (
                                    <div key={index} className='subUsers__uploaded'>
                                        <img src={img} alt="Uploaded Avatar" />
                                        <button
                                            onClick={() => setAvatarUrl(avatarUrl.filter((e) => e !== img))}
                                        ><RiDeleteBin5Fill />
                                        </button>
                                    </div>
                                )
                            })
                        }
                    </div>
                    <form id="addUserForm" onSubmit={handleSubmit} className='subUsers__form'>
                        <div className="subUsers__form-parts">
                            {addUserInputs.map(({ id, type, placeholder, name }) => {
                                return (
                                    <AddInput
                                        key={id}
                                        id={id}
                                        type={type}
                                        placeholder={placeholder}
                                        name={name}
                                        onChange={handleChange}
                                    />
                                )
                            })}
                            <SelectRole
                                // role={role}
                                // setRole={setRole}
                                onChange={handleChange}
                            />
                        </div>
                    </form>
                </div>
            </article>
    )
}

export default AddUsers