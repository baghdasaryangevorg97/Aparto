import React, { useEffect, useRef, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { setUploadPhoto, setUploadPhotoReserve, setUploadPhotoReserveTwo } from '../../../../../store/slices/propertySlice'
import { hideImg, removeWhite, showImg, uploadImgs } from '../../../../svgs/svgs'
import { API_BASE_URL } from '../../../../../apis/config'
import { error } from '../../../../../components/swal/swal'
import './ImgsUpload.scss'

export const ImgsUpload = ({ style, value }) => {
    const names = value?.map((item) => item.name)

    const [images, setImages] = useState(value ? names : [])
    const [previewImages, setPreviewImages] = useState(value ? value : [])
    const [visibleImages, setVisibleImages] = useState(value ? value.map(image => image.visible === "true") : [])
    const [newUploads, setNewUploads] = useState(0)

    const handleImageUpload = (e) => {
        const files = Array.from(e?.target?.files)
        const uploadedImages = files.map((file) => URL.createObjectURL(file))

        const totalUploads = newUploads + files.length

        if (!value && totalUploads > 40) {
            error('Ավելացնել մինչև 40 նկար։')
            return
        } else if (value && totalUploads > 20) {
            error('Ավելացնել մինչև 20 նկար։')
            return
        } else if (value?.length === 60) {
            error('Ավելացված Է մաքսիմալ 60 հատ նկար։')
            return
        }

        setNewUploads((prevUploads) => prevUploads + files.length)
        setImages((prevImages) => [...prevImages, ...files])
        setPreviewImages((prevPreviews) => [...prevPreviews, ...uploadedImages])
        setVisibleImages((prevVisible) => [...prevVisible, ...Array(files.length).fill(true)])
    }

    const handleImageDelete = (index) => {
        setNewUploads((prevUploads) => prevUploads - 1)

        setImages((prevImages) => {
            const updatedImages = [...prevImages]
            updatedImages.splice(index, 1)
            return updatedImages
        });

        setPreviewImages((prevPreviews) => {
            const updatedPreviews = [...prevPreviews]
            updatedPreviews.splice(index, 1)
            return updatedPreviews
        });

        setVisibleImages((prevVisible) => {
            const updatedVisible = [...prevVisible]
            updatedVisible.splice(index, 1)
            return updatedVisible
        });
    }

    const handleToggleVisibility = (index) => {
        setVisibleImages((prevVisible) => {
            const updatedVisible = [...prevVisible]
            updatedVisible[index] = !updatedVisible[index]
            return updatedVisible
        })
    }

    const dragItem = useRef(null)
    const dragOverItem = useRef(null)

    const handleSort = () => {
        if (!visibleImages[dragItem.current]) {
            return;
        }

        const draggedImage = images[dragItem.current];
        const draggedPreview = previewImages[dragItem.current];
        const draggedVisible = visibleImages[dragItem.current];

        const updatedImages = [...images];
        const updatedPreviews = [...previewImages];
        const updatedVisible = [...visibleImages];

        updatedImages.splice(dragItem.current, 1);
        updatedPreviews.splice(dragItem.current, 1);
        updatedVisible.splice(dragItem.current, 1);

        if (dragOverItem.current === null) {
            updatedImages.push(draggedImage);
            updatedPreviews.push(draggedPreview);
            updatedVisible.push(draggedVisible);
        } else {
            const insertIndex = updatedVisible[dragOverItem.current] ? dragOverItem.current : dragOverItem.current + 1;

            updatedImages.splice(insertIndex, 0, draggedImage);
            updatedPreviews.splice(insertIndex, 0, draggedPreview);
            updatedVisible.splice(insertIndex, 0, draggedVisible);
        }

        setImages(updatedImages);
        setPreviewImages(updatedPreviews);
        setVisibleImages(updatedVisible);
    }

    const dispatch = useDispatch()

    // const updateUploadPhoto = () => {
    //     const sortedFormData = new FormData()
    //     const reserveFormData = new FormData()

    //     if (images.length > 20) {
    //         const remainingImages = images.slice(20)

    //         remainingImages.forEach((image, index) => {
    //             reserveFormData.append(
    //                 visibleImages[index + 20]
    //                     ? `visible-${index + 20}`
    //                     : `hidden-${index + 20}`,
    //                 image
    //             )
    //         })
    //     }

    //     images.slice(0, 20).forEach((image, index) => {
    //         sortedFormData.append(
    //             visibleImages[index] ? `visible-${index}` : `hidden-${index}`,
    //             image
    //         )
    //     })

    //     dispatch(setUploadPhoto(sortedFormData))
    //     dispatch(setUploadPhotoReserve(reserveFormData))
    // }

    const updateUploadPhoto = () => {
        const sortedFormData = new FormData();
        const reserveFormData = new FormData();
        const reserveTwoFormData = new FormData();

        if (images.length > 40) {
            const remainingImages = images.slice(40);
            console.log(remainingImages)//

            remainingImages.forEach((image, index) => {
                reserveTwoFormData.append(
                    visibleImages[index + 40]
                        ? `visible-${index + 40}`
                        : `hidden-${index + 40}`,
                    image
                );
            });
        }

        if (images.length > 20 && images.length <= 40) {
            const remainingImages = images.slice(20, 40);

            remainingImages.forEach((image, index) => {
                reserveFormData.append(
                    visibleImages[index + 20]
                        ? `visible-${index + 20}`
                        : `hidden-${index + 20}`,
                    image
                );
            });
        }

        images.slice(0, 20).forEach((image, index) => {
            sortedFormData.append(
                visibleImages[index] ? `visible-${index}` : `hidden-${index}`,
                image
            );
        });

        // console.log(sortedFormData);
        // console.log(sortedFormData);
        // console.log(reserveTwoFormData);

        dispatch(setUploadPhoto(sortedFormData));
        dispatch(setUploadPhotoReserve(reserveFormData));
        dispatch(setUploadPhotoReserveTwo(reserveTwoFormData));
    };


    useEffect(() => {
        updateUploadPhoto()
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [images, visibleImages])

    return (
        <div style={{ width: style }} className='imgsUpload'>
            <div className='imgsUpload__card'>
                <label className='imgsUpload__upload'>
                    {uploadImgs.icon}
                    <input
                        type="file"
                        multiple
                        // maxLength="20"
                        accept='image/png , image/jpeg , image/jpg , image.webp'
                        onChange={handleImageUpload} />
                </label>
                {previewImages.map((preview, index) => (
                    <div
                        key={index}
                        className='imgsUpload__card-main'
                        draggable={visibleImages[index]}
                        onDragStart={(e) => {
                            if (!visibleImages[index]) {
                                e.preventDefault();
                                return;
                            }
                            dragItem.current = index;
                        }}
                        onDragEnter={() => {
                            if (!visibleImages[index]) {
                                return;
                            }
                            dragOverItem.current = index;
                        }}
                        onDragEnd={handleSort}

                    >
                        <img
                            // src={preview}
                            // add i jamanak preview,editi jamanak myusy
                            src={!preview.name ? preview : API_BASE_URL + `/images/` + preview.name}
                            loading='lazy'
                            alt={`Preview ${index}`}
                            className='imgsUpload__card-img'
                        />
                        {!visibleImages[index] ? <p>Թաքցված</p> : null}
                        <div className='imgsUpload__card-btns'>
                            <button
                                type="button"
                                onClick={() => handleToggleVisibility(index)}
                                className='imgsUpload__card-btns-hideShow'
                            >
                                {visibleImages[index] ? hideImg.icon : showImg.icon}
                                {visibleImages[index] ? 'Թաքցնել' : 'Բացել'}
                            </button>
                            <button
                                type="button"
                                onClick={() => handleImageDelete(index)}
                                className='imgsUpload__card-btns-delete'
                            >
                                {removeWhite.icon}
                            </button>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
};

// const { uploadPhoto } = useSelector((state) => state.property)
// useEffect(() => {
//     console.log(uploadPhoto)// esi et sortedFormDataJson na nuyn
// }, [uploadPhoto])

// const updateUploadPhoto = () => {
//     const sortedFormData = new FormData()
//     images.forEach((image, index) => {
//         const key = visibleImages[index] ? `visible-${index}` : `hidden-${index}`
//         // const value = JSON.stringify(image)
//         sortedFormData.append(key, image)
//     });
//     // console.log(images)
//     const sortedFormDataJson = JSON.stringify(Object.fromEntries(sortedFormData))
//     // console.log("JSON", sortedFormDataJson)
//     // let parsed = JSON.parse(sortedFormDataJson)
//     // console.log("PARSE", parsed);
//     dispatch(setUploadPhoto(sortedFormDataJson))
// }

// mi masov verevy avelacrac visible,hidden
    // const updateUploadPhoto = () => {
    //     const sortedFormData = new FormData();
    //     images.forEach((image, index) => {
    //         sortedFormData.append(`image${index}`, image);
    //         sortedFormData.append(index, visibleImages[index] ? 'visible' : 'hidden');
    //     });

    //     dispatch(setUploadPhoto(sortedFormData));
    // };

    // aranzin erku mas (visible,hidden)
    // const updateUploadPhoto = () => {
    //     const sortedFormData = new FormData();
    //     images.forEach((image, index) => {
    //         if (visibleImages[index]) {
    //             sortedFormData.append(`visibleImages[${index}]`, image);
    //         } else {
    //             sortedFormData.append(`hiddenImages[${index}]`, image);
    //         }
    //     });

    //     dispatch(setUploadPhoto(sortedFormData));
    // };
