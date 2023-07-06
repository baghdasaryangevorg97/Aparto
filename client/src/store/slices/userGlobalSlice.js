import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import baseApi from "../../apis/baseApi";
import { getAxiosConfig } from "../../apis/config";

const initialState = {
  loading: false,
  userGlobal: [],
  error: "",
};

export const getUserGlobal = createAsyncThunk("userGlobal", async () => {
  try {
    const { data } = await baseApi.post(
      "/api/getGlobalUser",
      null,
      getAxiosConfig()
    );
    return data;
  } catch (err) {
    console.log(`Get Global User Error: ${err.message}`);
  }
});

const userGlobalSlice = createSlice({
  name: "userGlobal",
  initialState,
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(getUserGlobal.pending, (state) => {
        state.loading = true;
      })
      .addCase(getUserGlobal.fulfilled, (state, action) => {
        state.loading = false;
        state.userGlobal = action.payload;
      })
      .addCase(getUserGlobal.rejected, (state, action) => {
        state.loading = false;
        state.error = action.error.message;
      });
  },
});

export default userGlobalSlice.reducer;
