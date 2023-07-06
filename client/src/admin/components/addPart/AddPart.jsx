import React from 'react'
import { useNavigate, useLocation } from 'react-router-dom'
import { back } from '../../svgs/svgs'
// import { capitalize } from '../../../helpers/formatters'
import { BtnDiscard } from '../buttons/BtnDiscard'
import { BtnCustom } from '../buttons/BtnCustom'
import './AddPart.scss'

const AddPart = ({ type, changeStatus, currentUser }) => {
  const navigate = useNavigate()
  const { pathname } = useLocation()

  let newPath = pathname.split('/')[2]

  return (
    <div className='addpart'>
      <div className='addpart__navigate'>
        <button onClick={() => navigate(-1)}>
          {back.icon}
          {/* <span>Back to All {capitalize(newPath)}</span> */}
          <span>Վերադառնալ {newPath === "users" ? "Օգտատերեր" : "Գույք"}</span>
        </button>

        {type === "addUsers" || type === "addProperties"
          // ? <h3>Add a New {newPath === "users" ? capitalize(newPath).slice(0, -1) : capitalize(newPath).slice(0, -3) + "y"}
          // : <h3>Edit {newPath === "users" ? capitalize(newPath).slice(0, -1) : capitalize(newPath).slice(0, -3) + "y"}
          ? <h3>Ավելացնել {newPath === "users" ? "Օգտատերեր" : "Գույք"}</h3>
          : <h3>Փոփոխել {newPath === "users" ? "Օգտատիրոջը" : "Գույքը"}</h3>}
      </div>

      {/* Add/Edit Users */}
      {type === "addUsers"
        ? <div className='addpart__btns'>
          <BtnDiscard text="Չեղարկել" />
          <BtnCustom
            form="addUserForm"
            // text={`Add This ${newPath === "users" ? capitalize(newPath).slice(0, -1) : capitalize(newPath).slice(0, -3) + "y"}`}
            text="Ավելացնել"
          />
        </div>
        : null
      }
      {type === "editUser"
        ? <div className='addpart__btns'>
          {currentUser?.status === "approved"
            ? <button className='addpart__btns-deactivate' onClick={changeStatus}>Ապաակտիվացնել</button>
            : <button className='addpart__btns-deactivate' onClick={changeStatus}>Ակտիվացնել</button>
          }
          <BtnDiscard text="Չեղարկել" />
          <BtnCustom
            form="editUserForm"
            // text={`Save ${newPath === "users" ? capitalize(newPath).slice(0, -1) : capitalize(newPath).slice(0, -3) + "y"}`}
            text="Պահպանել"
          />
        </div>
        : null
      }

      {/* Add/Edit Properties */}
      {type === "addProperties"
        ? <div className='addpart__btns'>
          <BtnDiscard text="Չեղարկել" />
          <BtnCustom
            form="addPropertiesForm"
            text="Ավելացնել"
          />
        </div>
        : null
      }
      {type === "editProperties"
        ? <div className='addpart__btns'>
          {/* {currentUser.status === "approved"
            ? <button className='addpart__btns-deactivate' onClick={changeStatus}>Ապաակտիվացնել</button>
            : <button className='addpart__btns-deactivate' onClick={changeStatus}>Ակտիվացնել</button>
          } */}
          <BtnDiscard text="Չեղարկել" />
          <BtnCustom
            form="editPropertiesForm"
            text="Պահպանել"
          />
        </div>
        : null
      }
    </div>
  )
}

export default AddPart