import React, { useEffect, useState } from 'react'
import { file, remove } from '../../../../svgs/svgs'
import { useDispatch } from 'react-redux'
import { API_BASE_URL } from '../../../../../apis/config'
import { setUploadFile } from '../../../../../store/slices/propertySlice'
import './Styles.scss'

export const FileUpload = ({ value }) => {
    const [upload, setUpload] = useState(value ? value : [])
    const dispatch = useDispatch()

    const uploadFile = (e) => {
        const files = Array.from(e.target.files)

        const uniqueFiles = files.filter((file) => {
            return !upload.some((uploadedFile) => uploadedFile.name === file.name)
        });

        setUpload((prev) => [...prev, ...uniqueFiles])
    };

    const removeFile = (file) => {
        setUpload((prev) => prev.filter((uploadedFile) => uploadedFile !== file))
    }

    const uploadFormData = () => {
        const formData = new FormData()
        upload.forEach((file, index) => {
            formData.append(`file${index}`, file)
        })
        dispatch(setUploadFile(formData))
    }

    useEffect(() => {
        uploadFormData()
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [upload])

    return (
        <div className='fileUpload'>
            <label className='fileUpload__label'>
                {file.icon} <p>Կցել Փաստաթուղթ</p>
                <input
                    id='uploadFile'
                    type='file'
                    name='File'
                    onChange={uploadFile}
                    multiple
                    accept='.xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf'
                />
            </label>
            <div style={{ display: 'flex', alignItems: "flex-end", flexDirection: 'column', gap: '4px' }}>
                {upload?.map((el) => {
                    const isFile = el instanceof File;

                    return (
                        <div key={el.name || el} style={{ display: 'flex', gap: '7px' }}>
                            <p>{el.name || el}</p>
                            <button
                                type='button'
                                onClick={() => removeFile(el)}
                                style={{ background: "transparent" }}
                            >{remove.icon}
                            </button>
                            {!isFile && value && <a style={{ fontSize: "14px", color: "#61636b" }} target='_blank' href={API_BASE_URL + `/files/` + el} rel="noreferrer">View</a>}
                        </div>
                    )
                })}
            </div>
        </div >
    );
};
