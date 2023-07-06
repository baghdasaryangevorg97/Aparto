import { combineReducers, configureStore } from "@reduxjs/toolkit";
import authSlice from "./slices/authSlice";
import propertySlice from "./slices/propertySlice";
import userGlobalSlice from "./slices/userGlobalSlice";
import structureSlice from "./slices/structureSlice";
import usersSlice from "./slices/usersSlice";
import configsSlice from "./slices/configsSlice";
import storage from "redux-persist/lib/storage";
import { persistReducer, persistStore } from "redux-persist";
import thunk from "redux-thunk";

const persistConfig = {
  key: "root",
  storage,
  whitelist: ["auth", "userGlobal", "users"],
  // whitelist: ["userGlobal", "users"],
  // storageSession,
};

const rootReducer = combineReducers({
  auth: authSlice,
  property: propertySlice,
  userGlobal: userGlobalSlice,
  structure: structureSlice,
  users: usersSlice,
  configs: configsSlice,
});

const persistedReducer = persistReducer(persistConfig, rootReducer);

const store = configureStore({
  reducer: persistedReducer,
  middleware: [thunk],
});

export const persistor = persistStore(store);
export default store;
