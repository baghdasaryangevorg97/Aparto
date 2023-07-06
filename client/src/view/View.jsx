import React, { lazy, Suspense } from "react"
// import { Loader } from "../components/loader/Loader"
import { BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom"
import LayoutMain from "../components/layout/LayoutMain"
import LayoutDash from "../admin/components/layout/LayoutDash"
import { useSelector } from "react-redux"
// const Home = lazy(() => import('../pages/home/Home'))
// const Rent = lazy(() => import('../pages/rent/Rent'))
// const SubRent = lazy(() => import('../pages/rent/subRent/SubRent'))
// const Sale = lazy(() => import('../pages/sale/Sale'))
// const SubSale = lazy(() => import('../pages/sale/subSale/SubSale'))
// const Services = lazy(() => import('../pages/services/Services'))
// const Contact = lazy(() => import('../pages/contact/Contact'))
const NotFound = lazy(() => import('../pages/404/NotFound'))
const Login = lazy(() => import('../admin/pages/login/Login'))
const Profile = lazy(() => import('../admin/pages/profile/Profile'))
const Properties = lazy(() => import('../admin/pages/properties/Properties'))
const SingleProperty = lazy(() => import('../admin/pages/properties/pages/SingleProperty'))
const AddProperties = lazy(() => import('../admin/pages/properties/pages/AddProperties'))
const EditProperties = lazy(() => import('../admin/pages/properties/pages/EditProperties'))
const Structure = lazy(() => import('../admin/pages/structure/Structure'))
const Users = lazy(() => import('../admin/pages/users/Users'))
const AddUsers = lazy(() => import('../admin/pages/users/pages/AddUsers'))
const EditUsers = lazy(() => import('../admin/pages/users/pages/EditUsers'))
const Configs = lazy(() => import('../admin/pages/configs/Configs'))
const Crm = lazy(() => import('../admin/pages/crm/Crm'))

const View = () => {
    const { isLoggedIn, token } = useSelector((state) => state.auth)
    const { role } = useSelector((state => state.userGlobal.userGlobal))

    return (
        <Router>
            <Suspense fallback={<p></p>}>
                <Routes>
                    <Route path="/" element={<LayoutMain />}>
                        {/* <Route index element={<Home />} />
                        <Route path="for-rent" element={<Rent />} />
                        <Route path="for-rent/:id" element={<SubRent />} />
                        <Route path="for-sale" element={<Sale />} />
                        <Route path="for-sale/:id" element={<SubSale />} />
                        <Route path="our-services" element={<Services />} />
                        <Route path="contact-us" element={<Contact />} /> */}
                        <Route path="*" element={<NotFound />} />
                    </Route>

                    <Route path="/login">
                        <Route index element={isLoggedIn && token ? <Navigate to="/dashboard/properties" /> : <Login />} />
                    </Route>

                    <Route
                        path="/dashboard"
                        element={isLoggedIn && token ? <LayoutDash /> : <Navigate to="/login" />}
                    >
                        <Route index path="properties" element={<Properties />} />
                        <Route path="properties/:id" element={<SingleProperty />} />
                        <Route path="properties/add" element={<AddProperties />} />
                        <Route path="properties/edit/:id" element={<EditProperties />} />
                        <Route path="profile" element={<Profile />} />
                        <Route path="users" element={<Users />} />
                        <Route path="users/add" element={role === "admin" ? <AddUsers /> : <Navigate to="/dashboard/users" />} />
                        <Route path="users/edit/:id" element={role === "admin" ? <EditUsers /> : <Navigate to="/dashboard/users" />} />
                        {role === "admin"
                            ? <>
                                <Route path="form-structure" element={<Structure />} />
                                <Route path="web-configs" element={<Configs />} />
                                <Route path="crm" element={<Crm />} />
                            </>
                            : null}
                        <Route path="*" element={<NotFound />} />
                    </Route>
                </Routes>
            </Suspense>
        </Router>
    )
}

export default View