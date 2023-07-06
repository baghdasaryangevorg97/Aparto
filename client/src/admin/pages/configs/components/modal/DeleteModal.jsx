import React from 'react'
import { BtnOnclick } from '../../../../components/buttons/BtnOnclick'
import './Modal.scss'

export const DeleteModal = ({ modal, setModal, rowData, onClick }) => {
    return (
        <div className={!modal ? "modal-close" : "modal-open"}>
            <div className='modal__card'>
                <h3>Հեռացնել Հասցե</h3>

                <p>Համոզվիր, որ չունես գույքեր “{rowData?.am}” փողոցի վրա։ Ֆիլտրիր գույքերդ ըստ փողոցի անվան Properties էջում:</p>

                <BtnOnclick
                    text="Հեռացնել"
                    onClick={onClick}
                />

                <button
                    className='modal__card-discard'
                    onClick={() => setModal(false)}
                >
                    Չեղարկել
                </button>
            </div>
        </div>
    )
}
