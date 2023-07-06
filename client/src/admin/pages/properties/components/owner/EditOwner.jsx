import React, { useState } from 'react'
import { ownerAdd, remove } from '../../../../svgs/svgs'
import './Styles.scss'
import '../inputs/Styles.scss'

export const EditOwner = ({ data, onChange }) => {
    const [showOwner2, setShowOwner2] = useState(data && data.some(item => item.key === 'owner2' && item.value));
    const [showOwner3, setShowOwner3] = useState(data && data.some(item => item.key === 'owner3' && item.value));
    const owner2Data = data.find(item => item.key === 'owner2');
    const ownerTel2Data = data.find(item => item.key === 'ownerTel2');
    const owner3Data = data.find(item => item.key === 'owner3');
    const ownerTel3Data = data.find(item => item.key === 'ownerTel3');

    const handleAddOwner2 = () => {
        setShowOwner2(true);
    };

    const handleRemoveOwner2 = () => {
        setShowOwner2(false);
    };

    const handleAddOwner3 = () => {
        setShowOwner3(true);
    };

    const handleRemoveOwner3 = () => {
        setShowOwner3(false);
    };

    return (
        <div className='editOwner'>
            <div className="editOwner__card">
                {showOwner2 && (
                    <>
                        {!showOwner3 &&!ownerTel2Data?.value && !owner2Data?.value &&
                            <button className="addOwner__labelsActive-remove" onClick={handleRemoveOwner2}>
                                {remove.icon}
                                Հեռացնել
                            </button>}
                        <label className='cardText'>
                            {owner2Data?.title}
                            <input
                                id={owner2Data?.key}
                                type="text"
                                placeholder={owner2Data?.placeholder ? owner2Data.placeholder : 'Ex.'}
                                className='cardText-full'
                                minLength="3"
                                style={{ width: owner2Data?.style }}
                                onChange={onChange}
                                defaultValue={owner2Data?.value}
                            />
                        </label>
                        <label className='cardText'>
                            {ownerTel2Data?.title}
                            <input
                                id={ownerTel2Data?.key}
                                type="text"
                                placeholder={ownerTel2Data?.placeholder ? ownerTel2Data.placeholder : 'Ex.'}
                                className='cardText-full'
                                minLength="3"
                                style={{ width: ownerTel2Data?.style }}
                                onChange={onChange}
                                defaultValue={ownerTel2Data?.value}
                            />
                        </label>
                    </>
                )}
                {showOwner3 && (
                    <>
                        {<button className="addOwner__labelsActive-remove" onClick={handleRemoveOwner3}>
                            {remove.icon}
                            Հեռացնել
                        </button>}
                        <label className='cardText'>
                            {owner3Data?.title}
                            <input
                                id={owner3Data?.key}
                                type="text"
                                placeholder={owner3Data?.placeholder ? owner3Data.placeholder : 'Ex.'}
                                className='cardText-full'
                                minLength="3"
                                style={{ width: owner3Data?.style }}
                                onChange={onChange}
                                defaultValue={owner3Data?.value}
                            />
                        </label>
                        <label className='cardText'>
                            {ownerTel3Data?.title}
                            <input
                                id={ownerTel3Data?.key}
                                type="text"
                                placeholder={ownerTel3Data?.placeholder ? ownerTel3Data.placeholder : 'Ex.'}
                                className='cardText-full'
                                minLength="3"
                                style={{ width: ownerTel3Data?.style }}
                                onChange={onChange}
                                defaultValue={ownerTel3Data?.value}
                            />
                        </label>
                    </>
                )}
            </div>
            {!showOwner2 && (
                <button className="addOwner__addBtn" onClick={handleAddOwner2}>
                    {ownerAdd.icon}
                    Ավելացնել սեփականատեր
                </button>
            )}
            {!showOwner3 && showOwner2 && (
                <button className="addOwner__addBtn" onClick={handleAddOwner3}>
                    {ownerAdd.icon}
                    Ավելացնել սեփականատեր
                </button>
            )}
        </div>
    );
};
