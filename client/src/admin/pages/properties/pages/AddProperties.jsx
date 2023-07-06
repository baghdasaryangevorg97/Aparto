import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import AddPart from '../../../components/addPart/AddPart'
import { Loader } from '../../../../components/loader/Loader'
import { addPropertyData, getPropertyStructure } from '../../../../store/slices/propertySlice'
import { Card } from '../components/card/Card'
import { LngPart } from '../components/lngPart/LngPart'
import { LngPartEdit } from '../components/lngPart/LngPartEdit'
import { LngPartSmall } from '../components/lngPart/LngPartSmall'
import { SingleSelect } from '../components/dropdowns/SingleSelect'
import { MultiSelect } from '../components/dropdowns/MultiSelect'
import { CommunitySelect } from '../components/asyncSelects/CommunitySelect'
import { YandexMap } from '../components/yandexMap/YandexMap'
import { InputNum } from '../components/inputs/InputNum'
import { InputText } from '../components/inputs/InputText'
import { InputNumSingle } from '../components/inputs/InputNumSingle'
import { InputNumSymbol } from '../components/inputs/InputNumSymbol'
import { NumSelector } from '../components/inputs/NumSelector'
import { Checkbox } from '../../../components/checkboxes/Checkbox'
import { Keywords } from '../components/keywords/Keywords'
import { ImgsUpload } from '../components/imgsUpload/ImgsUpload'
import { FileUpload } from '../components/inputs/FileUpload'
import { AddOwner } from '../components/owner/AddOwner'
import { AgentSelect } from '../components/asyncSelects/AgentSelect'
import { ManagerSelect } from '../components/asyncSelects/ManagerSelect'
import { error } from '../../../../components/swal/swal'
import './Styles.scss'

const AddProperties = () => {
    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(getPropertyStructure())
    }, [dispatch])

    const { structure, yandex, postAddLoading } = useSelector((state) => state.property)
    const center = structure?.slice(0, 9)
    const right = structure?.slice(9, 12)

    const [loading, setLoading] = useState(false)
    const [addProperty, setAddProperty] = useState('')

    const [isCompleted, setIsCompleted] = useState({
        announcementTitleAm: false,
        announcementTitleRu: false,
        announcementTitleEn: false,
        announcementDescAm: false,
        announcementDescRu: false,
        announcementDescEn: false,
    })

    const handleStreetChange = (value) => {
        setAddProperty((prev) => ({
            ...prev,
            location: {
                ...prev.location,
                street: Number(value)
            }
        }))
    }

    const addProp = (e, name, type) => {
        let { id, value, checked } = e.target

        setAddProperty((prev) => {
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
                        // [id]: checked ? checked : type === "communitySelect" ? value.replace(/\d/g, "") : value, // vor gna nornorq nornorq11 i texy
                        [id]: checked ? checked : value,
                    },
                }
            }

            return { ...prev, ...obj }
        })
    }
    // console.log("add",addProperty)//

    const handleSubmit = (e) => {
        e.preventDefault()
        setLoading(true)

        const areAllLanguagesCompleted = Object.values(isCompleted).every((value) => value === true)

        if (!areAllLanguagesCompleted) {
            error('Լրացրեք բոլոր լեզուները!')
            setLoading(false)
        } else if (!yandex.length) {
            error('Նշեք Yandex-ի վրա գտնվելու վայրը!')
            setLoading(false)
        } else {
            dispatch(addPropertyData({ addProperty }))
            setLoading(false)
        }
    }

    return (
        (loading && !postAddLoading) || (!loading && postAddLoading)
            ? <Loader />
            : <article className='addproperties'>
                <AddPart type="addProperties" />

                {!structure
                    ? <Loader />
                    : <form
                        id="addPropertiesForm"
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
                                        child={fields.map(({ key, title, type, option, communityStreet, style, required, placeholder }) => {
                                            return (
                                                <div key={key}>
                                                    {type === "select"
                                                        ? <SingleSelect
                                                            id={key}
                                                            title={title}
                                                            data={option}
                                                            style={style}
                                                            required={required}
                                                            onChange={(e) => addProp(e, name)}
                                                        />
                                                        : type === "multiselect"
                                                            ? <MultiSelect
                                                                id={key}
                                                                title={title}
                                                                name={name}
                                                                data={option}
                                                                style={style}
                                                                required={required}
                                                                onChange={(e) => addProp(e, name)}
                                                            />
                                                            : type === "text"
                                                                ? <LngPart
                                                                    id={key}
                                                                    title={title}
                                                                    style={style}
                                                                    required={required}
                                                                    setIsCompleted={setIsCompleted}
                                                                    onChange={(e) => addProp(e, name, type)}
                                                                />
                                                                : type === "communitySelect"
                                                                    ? <CommunitySelect
                                                                        id={key}
                                                                        title={title}
                                                                        required={required}
                                                                        data={option}
                                                                        streetData={communityStreet}
                                                                        style={style}
                                                                        onChange={(e) => addProp(e, name, type)}
                                                                        onStreetChange={(value) => handleStreetChange(value)}
                                                                    />
                                                                    : type === "inputNumber"
                                                                        ? <InputNum
                                                                            id={key}
                                                                            title={title}
                                                                            placeholder="Ex."
                                                                            style={style}
                                                                            required={required}
                                                                            onChange={(e) => addProp(e, name)}
                                                                        />
                                                                        : type === "inputText"
                                                                            ? <InputText
                                                                                id={key}
                                                                                title={title}
                                                                                placeholder={placeholder}
                                                                                style={style}
                                                                                required={required}
                                                                                onChange={(e) => addProp(e, name)}
                                                                            />
                                                                            : type === "map"
                                                                                ? <YandexMap
                                                                                    title={title}
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
                                                                                        onChange={(e) => addProp(e, name)}
                                                                                    />
                                                                                    : type === 'inputNumberSymbol'
                                                                                        ? <InputNumSymbol
                                                                                            id={key}
                                                                                            title={title}
                                                                                            data={option}
                                                                                            style={style}
                                                                                            required={required}
                                                                                            onChange={(e) => addProp(e, name, type)}
                                                                                        />
                                                                                        : type === "checkbox"
                                                                                            ? <Checkbox
                                                                                                id={key}
                                                                                                title={title}
                                                                                                style={style}
                                                                                                onChange={(e) => addProp(e, name)}
                                                                                            />
                                                                                            : type === "numSelect"
                                                                                                ? <NumSelector
                                                                                                    id={key}
                                                                                                    title={title}
                                                                                                    data={option}
                                                                                                    style={style}
                                                                                                    // required={required}
                                                                                                    onChange={(e) => addProp(e, name)}
                                                                                                />
                                                                                                : type === "keyword"
                                                                                                    ? <Keywords
                                                                                                        title={title}
                                                                                                        style={style}
                                                                                                    />
                                                                                                    : type === "imgsUpload"
                                                                                                        ? <ImgsUpload
                                                                                                            style={style} />
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
                                                    onChange={(e) => addProp(e, name, type)}
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
                                        child={fields.map(({ key, title, type, option, style, required, height, placeholder }) => {
                                            return (
                                                <div key={key}>
                                                    {type === "select"
                                                        ? <SingleSelect
                                                            id={key}
                                                            title={title}
                                                            data={option}
                                                            style={style}
                                                            required={required}
                                                            onChange={(e) => addProp(e, name)}
                                                        />
                                                        : type === "inputNumber"
                                                            ? <InputNum
                                                                id={key}
                                                                title={title}
                                                                placeholder="Ex."
                                                                style={style}
                                                                required={required}
                                                                onChange={(e) => addProp(e, name)}
                                                            />
                                                            : type === "inputText"
                                                                ? <InputText
                                                                    id={key}
                                                                    title={title}
                                                                    placeholder={placeholder}
                                                                    height={height}
                                                                    style={style}
                                                                    required={required}
                                                                    onChange={(e) => addProp(e, name)}
                                                                />
                                                                : type === "addField"
                                                                    ? <AddOwner
                                                                        data={option}
                                                                        onChange={(e) => addProp(e, name)}
                                                                    />
                                                                    : type === "uploadFile"
                                                                        ? <FileUpload />
                                                                        : type === "agentSelect"
                                                                            ? <AgentSelect
                                                                                id={key}
                                                                                title={title}
                                                                                style={style}
                                                                                required={required}
                                                                                onChange={(e) => addProp(e, name)}
                                                                            />
                                                                            : type === "managerSelect"
                                                                                ? <ManagerSelect
                                                                                    id={key}
                                                                                    title={title}
                                                                                    style={style}
                                                                                    required={required}
                                                                                    onChange={(e) => addProp(e, name)}
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
                                                        onChange={(e) => addProp(e, name, type)}
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

export default AddProperties

    // else if (name === "location" && key === "street") {
    //     obj = {
    //         [name]: {
    //             ...prev[name],
    //             [key]: value,
    //         },
    //     };
    // }
    //  else if (type === "inputNumberSymbol" && (name === "buildingDescription" || name === "price")) {
    //     obj = {
    //         [name]: {
    //             ...prev[name],
    //             [key]: {
    //                 ...prev[name]?.[key],
    //                 [id]: value,
    //             },
    //         },
    //     }
    // }

// const addProp = (e, name, type) => {
    //     let { id, value, checked, files } = e.target;

    //     console.log(name, type);

    //     setAddProperty((prev) => {
    //         let obj = {
    //             [name]: {
    //                 ...prev[name],
    //                 [id]: checked ? checked : value ? value : files,
    //             },
    //         };
    //         return { ...prev, ...obj };
    //     });
    // }

// if (!sendedImgs) {
//     dispatch(addPropertiesImgs({ uploadPhoto }))
// }
// if (!sendedFiles) {
//     dispatch(addPropertiesFiles({ uploadFile }))
// }
// if(!sendedImgs || !sendedFiles || addProperties.length){
//     dispatch(addPropertyData({addProperties}))
// }


      // if (Object.keys(addProperties).length === 0) {
        //     alert('addProperties is empty')
        //     return
        // }

        // if (uploadPhoto.entries().next().done) {
        //     alert('uploadPhoto is empty')
        //     return
        // }

        // if (uploadFile.entries().next().done) {
        //     alert('uploadFile is empty')
        //     return
        // }

    // old,only addeds
    // const getStrInfo = async () => {
    //     try {
    //         const { data } = await baseApi.get('/api/getAddFields')
    //         setStrInfo(data)
    //     } catch (err) {
    //         console.log(`Get Structure Info: ${err.message}`);
    //     }
    // }
