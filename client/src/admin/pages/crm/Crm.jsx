import React from 'react'
import progress from '../../../assets/imgs/progress.png'
import './Crm.scss'

const Crm = () => {
    return (
        <article className='crm'>
            {/* <h3>CRM</h3> */}
            <img width="100%" height="100%" src={progress} alt="Progress" />
        </article>
    )
}

export default Crm