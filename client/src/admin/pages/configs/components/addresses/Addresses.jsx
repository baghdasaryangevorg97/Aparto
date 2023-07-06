import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { getConfigsAddresses, removeConfigsAddress } from '../../../../../store/slices/configsSlice'
import { Loader } from '../../../../../components/loader/Loader'
import Table from '../../../../components/table/Table'
import { Search } from '../../../../components/inputs/Search'
import { BtnAdd } from '../../../../components/buttons/BtnAdd'
import { Modal } from '../modal/Modal'
import { DeleteModal } from '../modal/DeleteModal'
import { remove } from '../../../../svgs/svgs'
import { success } from '../../../../../components/swal/swal'
import './Addresses.scss'

export const Addresses = () => {
  const dispatch = useDispatch()

  const [search, setSearch] = useState("")
  const [open, setOpen] = useState(false)
  const [modal, setModal] = useState(false)
  const [rowData, setRowData] = useState()

  const { address, addedAddress, removedAddress } = useSelector((state) => state.configs)

  const [filteredData, setFilteredData] = useState(address)

  useEffect(() => {
    dispatch(getConfigsAddresses())
  }, [dispatch, addedAddress, removedAddress])

  useEffect(() => {
    if (address) {
      const filtered = address.filter(row => {
        const addressAM = row.am.toLowerCase()
        const addressEN = row.en.toLowerCase()
        const addressRU = row.ru.toLowerCase()
        const searchValue = search.toLowerCase()

        return (
          addressAM.includes(searchValue) || addressEN.includes(searchValue) || addressRU.includes(searchValue)
        )
      })
      setFilteredData(filtered)
    }
  }, [address, search])

  const openDeleteModal = (e) => {
    setRowData(e)
    setModal(true)
  }

  const postRemovedAddress = (e) => {
    let removedAddress = { id: e }

    dispatch(removeConfigsAddress({ removedAddress }))
    setModal(false)
    success('Հասցեն հեռացված Է։')
  }


  const adressColumns = [
    {
      name: "Հասցե",
      sortable: true,
      selector: row => row.am,
      cell: (row) => <p className="columFontSize">{row.am}</p>,
    },
    {
      name: "",
      cell: (row) => <p className="columFontSize">{row.en}</p>,
    },
    {
      name: "",
      cell: (row) => <p className="columFontSize">{row.ru}</p>,
    },
    {
      name: "",
      cell: (row) => (
        <button
          onClick={() => openDeleteModal(row)}
          className='columnDelete'
        >{remove.icon}
        </button>
      ),
    },
  ];

  return (
    <section className='addresses'>
      <div className='addresses__top'>
        <Search
          value={search}
          placeholder="Փնտրել ըստ հասցեի"
          onChange={(e) => setSearch(e.target.value.toLowerCase())}
        />
        <BtnAdd
          onClick={() => setOpen(true)}
          text="Հասցե"
        />
        <Modal
          open={open}
          setOpen={setOpen}
        />
        <DeleteModal
          modal={modal}
          setModal={setModal}
          rowData={rowData}
          onClick={() => postRemovedAddress(rowData.id)}
        />
      </div>

      <div className='addresses__bottom'>
        {!filteredData
          ? <Loader />
          : <Table
            Data={filteredData}
            Columns={adressColumns}
          // type='addresses'
          />
        }
      </div>
    </section>
  )
}
