import React, { useEffect, useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import { getStructureInfo } from "../../../store/slices/structureSlice"
import { Loader } from "../../../components/loader/Loader"
import { Search } from "../../components/inputs/Search"
import { Card } from "./components/card/Card"
import "./Structure.scss"

const Structure = () => {
  const dispatch = useDispatch()

  const [search, setSearch] = useState("")

  const { data, added, removed } = useSelector((state) => state.structure)

  useEffect(() => {
    dispatch(getStructureInfo())
  }, [dispatch, added, removed])

  const center = data?.slice(0, 9) // 7 dnel
  const right = data?.slice(9, 12)

  return (
    <article className="structure">
      <div className="structure__sticky">
        <h3>Form Structure</h3>
        <Search
          value={search}
          placeholder="Փնտրել ըստ դաշտի"
          onChange={(e) => setSearch(e.target.value.toLowerCase())}
        />
      </div>

      {!data
        ? <Loader />
        : <div className="structure__main">
          <div className="structure__center">
            {center?.map(({ title, name, fields, added }) => {
              return (
                <Card
                  key={name}
                  title={title}
                  name={name}
                  fields={fields}
                  added={added}
                  search={title.toLowerCase().includes(search) ? "block" : 'none'}
                />
              )
            })}
          </div>

          <div className="structure__right">
            {right?.map(({ title, name, fields, added }) => {
              return (
                <Card
                  key={name}
                  title={title}
                  name={name}
                  fields={fields}
                  added={added}
                  search={title.toLowerCase().includes(search) ? "block" : 'none'}
                />
              )
            })}
          </div>
        </div>
      }
    </article>
  );
};

export default Structure


