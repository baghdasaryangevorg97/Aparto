import React from 'react'
import choose from '../../../assets/imgs/chooseAvatar.png'

export const ImgUpload = ({ onChange }) => {
    return (
        <label className='imgUpload'>
            <img src={choose} alt="Choose Avatar" />
            <input
                type='file'
                name='Avatar'
                onChange={onChange}
                accept='image/png , image/jpeg , image/jpg , image.webp'
                // multiple
            />
        </label>
    )
}
