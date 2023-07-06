import React from 'react'
import { useNavigate } from 'react-router-dom'
import { API_BASE_URL, APP_BASE_URL } from '../../../../../../apis/config'
import noImg from '../../../../../../assets/imgs/noImg.png'
import { Type } from './Type'
import { moneyFormater } from '../../../../../../helpers/formatters'
import { bathrooms, floor, height, rooms, square, top, url } from '../../../../../svgs/svgs'
import { Btn } from './Btn'
import { More } from './More'
import { success } from '../../../../../../components/swal/swal'
import '../Styles.scss'

export const Item = ({ data }) => {
    const navigate = useNavigate()

    const copyToClipboard = async (id, type) => {
        const clipboard = `${APP_BASE_URL}/${type}/${id}`

        await navigator.clipboard.writeText(clipboard)
        success("Հասցեն պատճենված է։")
    }

    return (
        data?.map(({ id, home_id, photo, selectedTransationType, am, updatedAt, createdAt, status }) => {
            return (
                <div
                    key={id}
                    className="propertyList__item"
                >
                    <div
                        className='propertyList__item-view'
                        onClick={() => navigate(`${id}`)}
                    >
                        {photo.length !== 0
                            ? <img src={`${API_BASE_URL}/images/${photo[0].name}`} alt="propertyImg" loading='lazy' />
                            : <img src={noImg} alt="No Img" loading='lazy' />
                        }

                        <div className='propertyList__item-view-types'>
                            <span>{selectedTransationType === "sale" ? "Վաճառք" : "Վարձակալութուն"}</span>
                            <Type data={am[0].fields[4].value} />
                        </div>
                    </div>

                    <div className='propertyList__item-right'>
                        <div className="propertyList__item-right-main">
                            <h6>{am[0].fields[2].value}</h6>

                            <div className="propertyList__item-right-main-address">
                                <p>{am[1].fields[0].value}</p>
                                <h4>{am[1].fields[0].communityStreet.value} {am[1].fields[1]?.value},</h4>
                                <span>
                                    մուտք {am[1].fields[2]?.value},
                                    հարկ {am[3].fields[8].value},
                                    բնակարան {am[1].fields[3]?.value}
                                </span>
                            </div>

                            <div className='propertyList__item-right-main-global'>
                                <p>{"# "}{home_id}</p>
                                <p>{moneyFormater(am[2].fields[0].value)}</p>
                            </div>
                        </div>

                        <div className='propertyList__item-right-characters'>
                            <p>{rooms.icon} {am[3].fields[2].value} սենյակ</p>
                            <p>{bathrooms.icon}{am[3].fields[4].value} սանհանգույց</p>
                            <p>{square.icon}{am[3].fields[0].value} ք.մ</p>
                            <p>{floor.icon}{am[3].fields[8].value}/{am[4].fields[1].value} հարկ</p>
                            <p>{height.icon}{am[3].fields[1].value} մ</p>
                        </div>

                        <div className='propertyList__item-right-facality'>
                            {am[6]?.fields
                                ?.filter(el => el.value === true)
                                ?.slice(0, 5)
                                ?.map(({ key, title }) => {
                                    return (
                                        <p key={key}>{title}</p>
                                    )
                                })}
                        </div>

                        <div className='propertyList__item-right-info'>
                            <div className='propertyList__item-right-info-owner'>
                                <p>{am[9].fields[0].value}</p>
                                <p>{am[9].fields[1].value}</p>
                            </div>

                            <div className='propertyList__item-right-info-agent'>
                                <p>{am[11].fields[0].value}</p>
                                <p>{updatedAt} - {createdAt}</p>
                            </div>

                            <div className='propertyList__item-right-info-btns'>
                                {status === "approved"
                                    ? <div className='propertyList__item-right-info-btns-approved'>
                                        <Btn
                                            status="approved"
                                            text="Ակտիվ"
                                        />
                                        <button
                                            type='button'
                                            onClick={() => alert("Cooming Soon :)")}
                                        >
                                            {top.icon}
                                        </button>
                                        <button
                                            type='button'
                                            onClick={() => copyToClipboard(home_id, selectedTransationType)}
                                        >
                                            {url.icon}
                                        </button>
                                    </div>
                                    : status === "moderation"
                                        ? <Btn
                                            status="moderation"
                                            text="Վերանայման"
                                        />
                                        : <Btn
                                            status="deactive"
                                            text="Ապաակտիվացված"
                                        />
                                }
                            </div>
                        </div>

                        <More id={id} status={status} />
                    </div>
                </div>
            )
        })
    )
}