import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom'
import { useDispatch, useSelector } from 'react-redux'
import { editPropertyData, getPropertyData } from '../../../../store/slices/propertySlice'
import { Loader } from '../../../../components/loader/Loader'
import AddPart from '../../../components/addPart/AddPart'
import { Card } from '../components/card/Card'
import { SingleSelect } from '../components/dropdowns/SingleSelect'
import { EditableSelect } from '../components/dropdowns/EditableSelect'
import { InputNum } from '../components/inputs/InputNum'
import { InputNumSymbol } from '../components/inputs/InputNumSymbol'
import { CommunitySelect } from '../components/asyncSelects/CommunitySelect'
import { LngPartEdit } from '../components/lngPart/LngPartEdit'
import { LngPartSmall } from '../components/lngPart/LngPartSmall'
import { InputText } from '../components/inputs/InputText'
import { YandexMap } from '../components/yandexMap/YandexMap'
import { AgentSelect } from '../components/asyncSelects/AgentSelect'
import { ManagerSelect } from '../components/asyncSelects/ManagerSelect'
import { EditOwner } from '../components/owner/EditOwner'
import { Keywords } from '../components/keywords/Keywords'
import { FileUpload } from '../components/inputs/FileUpload'
import { ImgsUpload } from '../components/imgsUpload/ImgsUpload'
import { InputNumSingle } from '../components/inputs/InputNumSingle'
import { Checkbox } from '../../../components/checkboxes/Checkbox'
import { NumSelector } from '../components/inputs/NumSelector'
import './Styles.scss'

const EditProperties = () => {
    const { id } = useParams()
    const propertyId = Number(id)

    const dispatch = useDispatch()

    const { filteredProperty, propertyData } = useSelector((state) => state.property)

    useEffect(() => {
        dispatch(getPropertyData({ filteredProperty }))
    }, [dispatch, filteredProperty])


    const currentProperty = propertyData?.find(item => item.id === propertyId)
    // console.log(currentProperty)//

    const currentPropertyData = currentProperty?.am
    const currentPropertyKeywords = currentProperty?.keywords
    const currentPropertyFiles = currentProperty?.file
    const currentPropertyImgs = currentProperty?.photo

    const center = currentPropertyData?.slice(0, 9)
    const right = currentPropertyData?.slice(9, 12)

    const [loading, setLoading] = useState(false)
    const [editProperty, setEditProperty] = useState('')

    const handleStreetChange = (value) => {
        setEditProperty((prev) => ({
            ...prev,
            location: {
                ...prev.location,
                street: Number(value)
            }
        }))
    }

    const editProp = (e, name, type) => {
        const { id, value, checked } = e.target

        setEditProperty((prev) => {
            let obj = {}

            if (type === 'text') {
                const nestedKey = id.slice(0, -2);

                obj = {
                    [name]: {
                        ...prev[name],
                        [nestedKey]: {
                            ...prev[name]?.[nestedKey],
                            [id]: value,
                        },
                    },
                }
            } else {
                obj = {
                    [name]: {
                        ...prev[name],
                        [id]: checked ? checked : value,
                    },
                }
            }

            return { ...prev, ...obj }
        })
    }
    // console.log("edit", editProperty)//
    // console.log(uploadPhoto.entries().next().done)//
    // console.log(uploadFile.entries().next().done)//

    const handleSubmit = (e) => {
        e.preventDefault()
        setLoading(true)
        dispatch(editPropertyData({ editProperty, propertyId }))
    }

    return (
        loading
            ? <Loader />
            : <article className='editproperties'>
                <AddPart type="editProperties" />

                {!currentPropertyData
                    ? <Loader />
                    : <form
                        id="editPropertiesForm"
                        className='addproperties__main'
                        onSubmit={handleSubmit}
                    >
                        {/* Center part */}
                        <div className='addproperties__center'>
                            {center?.map(({ name, title, fields, added }) => {
                                return (
                                    <Card
                                        key={name}
                                        title={title}
                                        width="680px"
                                        child={fields.map(({ key, title, type, option, value, communityId, communityStreet, allAnswers, style, required, height, placeholder }) => {
                                            return (
                                                <div key={key}>
                                                    {type === "select"
                                                        ? <SingleSelect
                                                            id={key}
                                                            title={title}
                                                            data={option}
                                                            value={value}
                                                            style={style}
                                                            required={required}
                                                            onChange={(e) => editProp(e, name)}
                                                        />
                                                        : type === "multiselect"
                                                            ? <EditableSelect
                                                                id={key}
                                                                title={title}
                                                                name={name}
                                                                data={option}
                                                                value={value}
                                                                style={style}
                                                                required={required}
                                                                onChange={(e) => editProp(e, name)}
                                                            />
                                                            : type === "text"
                                                                ? <LngPartEdit
                                                                    id={key}
                                                                    title={title}
                                                                    value={allAnswers}
                                                                    style={style}
                                                                    required={required}
                                                                    onChange={(e) => editProp(e, name, type)}
                                                                />
                                                                : type === "communitySelect"
                                                                    ? <CommunitySelect
                                                                        id={key}
                                                                        title={title}
                                                                        data={option}
                                                                        defValue={value}
                                                                        valueId={communityId}
                                                                        streetData={communityStreet}
                                                                        style={style}
                                                                        required={required}
                                                                        onChange={(e) => editProp(e, name, type)}
                                                                        onStreetChange={(value) => handleStreetChange(value)}
                                                                    />
                                                                    : type === "inputNumber"
                                                                        ? <InputNum
                                                                            id={key}
                                                                            title={title}
                                                                            value={value}
                                                                            placeholder="Ex."
                                                                            style={style}
                                                                            required={required}
                                                                            onChange={(e) => editProp(e, name)}
                                                                        />
                                                                        : type === "inputText"
                                                                            ? <InputText
                                                                                id={key}
                                                                                title={title}
                                                                                value={value}
                                                                                placeholder={placeholder}
                                                                                style={style}
                                                                                required={required}
                                                                                onChange={(e) => editProp(e, name)}
                                                                            />
                                                                            : type === "map"
                                                                                ? <YandexMap
                                                                                    title={title}
                                                                                    defValue={value}
                                                                                    style={style}
                                                                                    height='200px'
                                                                                />
                                                                                : type === 'inputNumberSingle'
                                                                                    ? <InputNumSingle
                                                                                        id={key}
                                                                                        title={title}
                                                                                        placeholder={placeholder}
                                                                                        style={style}
                                                                                        required={required}
                                                                                        value={value}
                                                                                        onChange={(e) => editProp(e, name)}
                                                                                    />
                                                                                    : type === 'inputNumberSymbol'
                                                                                        ? <InputNumSymbol
                                                                                            id={key}
                                                                                            title={title}
                                                                                            data={option}
                                                                                            value={value}
                                                                                            style={style}
                                                                                            required={required}
                                                                                            onChange={(e) => editProp(e, name, type)}
                                                                                        />
                                                                                        : type === "checkbox"
                                                                                            ? <Checkbox
                                                                                                id={key}
                                                                                                title={title}
                                                                                                style={style}
                                                                                                value={value}
                                                                                                onChange={(e) => editProp(e, name)}
                                                                                            />
                                                                                            : type === "imgsUpload"
                                                                                                ? <ImgsUpload
                                                                                                    value={currentPropertyImgs}
                                                                                                    style={style} />

                                                                                                : type === "numSelect"
                                                                                                    ? <NumSelector
                                                                                                        id={key}
                                                                                                        title={title}
                                                                                                        data={option}
                                                                                                        style={style}
                                                                                                        value={value}
                                                                                                        required={required}
                                                                                                        onChange={(e) => editProp(e, name)}
                                                                                                    />
                                                                                                    : type === "keyword"
                                                                                                        ? <Keywords
                                                                                                            title={title}
                                                                                                            style={style}
                                                                                                            value={currentPropertyKeywords}
                                                                                                        />
                                                                                                        : null
                                                    }
                                                </div>
                                            )
                                        })}
                                        addedChild={added.map(({ key, style, title, type }) => {
                                            return (
                                                <LngPartEdit
                                                    key={key}
                                                    id={key}
                                                    title={title}
                                                    style={style}
                                                    onChange={(e) => editProp(e, name, type)}
                                                />
                                            )
                                        })}
                                    />
                                )
                            })}
                        </div>

                        {/* Right part */}
                        <div className='addproperties__right'>
                            {right?.map(({ name, title, fields, added }) => {
                                return (
                                    <Card
                                        key={name}
                                        title={title}
                                        width="460px"
                                        child={fields.map(({ key, title, type, option, value, style, required, height, placeholder }) => {
                                            return (
                                                <div key={key}>
                                                    {type === "select"
                                                        ? <SingleSelect
                                                            id={key}
                                                            title={title}
                                                            data={option}
                                                            value={value}
                                                            style={style}
                                                            required={required}
                                                            onChange={(e) => editProp(e, name)}
                                                        />
                                                        : type === "inputNumber"
                                                            ? <InputNum
                                                                id={key}
                                                                title={title}
                                                                value={value}
                                                                placeholder="Ex."
                                                                style={style}
                                                                required={required}
                                                                onChange={(e) => editProp(e, name)}
                                                            />
                                                            : type === "inputText"
                                                                ? <InputText
                                                                    id={key}
                                                                    title={title}
                                                                    value={value}
                                                                    placeholder={placeholder}
                                                                    height={height}
                                                                    style={style}
                                                                    required={required}
                                                                    onChange={(e) => editProp(e, name)}
                                                                />
                                                                : type === "addField"
                                                                    ? <EditOwner
                                                                        data={option}
                                                                        onChange={(e) => editProp(e, name)}
                                                                    />
                                                                    : type === "uploadFile"
                                                                        ? <FileUpload
                                                                            value={currentPropertyFiles}
                                                                        />
                                                                        : type === "agentSelect"
                                                                            ? <AgentSelect
                                                                                id={key}
                                                                                title={title}
                                                                                value={value}
                                                                                style={style}
                                                                                required={required}
                                                                                onChange={(e) => editProp(e, name)}
                                                                            />
                                                                            : type === "managerSelect"
                                                                                ? <ManagerSelect
                                                                                    id={key}
                                                                                    title={title}
                                                                                    value={value}
                                                                                    style={style}
                                                                                    required={required}
                                                                                    onChange={(e) => editProp(e, name)}
                                                                                />
                                                                                : null
                                                    }
                                                </div>
                                            )
                                        })}
                                        addedChild={added.map(({ key, title, type }) => {
                                            return (
                                                <div key={key} style={{ width: "100%" }}>
                                                    <LngPartSmall
                                                        id={key}
                                                        title={title}
                                                        onChange={(e) => editProp(e, name, type)}
                                                    />
                                                </div>
                                            )
                                        })}
                                    />
                                )
                            })}
                        </div>
                    </form>
                }
            </article>
    )
}

export default EditProperties